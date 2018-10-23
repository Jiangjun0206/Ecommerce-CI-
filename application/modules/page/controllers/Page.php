<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Pages
 * @property Page_model $page_model
 * @property Menu $menu
 * @property Functions $functions
 * @property Files $files
 * @property Aauth $aauth
 * @author Admin
 */
class Page extends Public_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->library('functions');
        $this->load->library('aauth');
        $this->load->library('menu');
        $this->load->library('plugin');
        $this->load->library('files');
        $this->load->library('pagination');
        $this->load->library('functions');
        $this->load->model('page_model');
        $this->fname = $this->aauth->get_user_first_name();
        $this->lname = $this->aauth->get_user_last_name();
        $this->initials = $this->aauth->get_user_name_initials();
    }



    public function index() {
        $this->functions->check_session();
        $this->aauth->get_user_groups();
        $css = array('default/css/home/css/content_front.css','default/css/themes/theme-classic.css');
        $home_menu = $this->menu->get_first_main_menu();
        
        
        $home_id = explode("/",$home_menu[0]->url)[2];
        
        $data = array(
            'menu' => $this->menu->generate_menu(1),
            'page' => $this->page_model->get_page($home_id),
            'css' => $css,
        );
        $this->functions->show_frontend_view('front_end/content','Home',$data);
    }
    
    public function funnel_page($funnel_id, $type)
    {
        $this->functions->check_session();
        $this->functions->access();
        $res = $this->funnel_model->get_all_funnel_By_Id($funnel_id);
        
        $user_id = $this->session->userdata('id');
        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );
        
         $data = array(
            'main_menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
			'funnel_name'=>$res[0]->funnel_name,
			'pages' => $this->page_model->get_pages_funnel_by_id(false,false,$user_id,$res[0]->id, $type),
            'default_id' => $this->page_model->get_default_id($user_id),

        );
        $data['user_id'] = $user_id;
        $data['funnel_id'] = $res[0]->id;

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Pages', TRUE);
        $data['type'] = $type;
        
        $this->template->write_view('content', 'page_funnel_list', $data , TRUE);
        $this->template->render();
    }
    public function admin($user_id=FALSE)
    {
        $this->functions->check_session();
        $this->functions->access();

        $offset = $this->input->get("per_page");

        if(!$user_id)
            $user_id = $this->session->userdata('id');

        if ($offset <= 0)
            $offset = 0;

        $menu_data = array(
            'fname' => $this->fname,
            'initials' => $this->initials,
            'lname' => $this->lname
        );

        $data = array(
            'main_menu' => $this->load->view('menu/admin_main', $menu_data, TRUE),
            'home_id' => $this->page_model->get_home_id($user_id),
            'default_id' => $this->page_model->get_default_id($user_id),
            //'subnav' => $this->load->view('menu/subnav', $subnav_data, TRUE),

        );


        if($user_id){
            $data['pages'] = $this->page_model->get_pages(false,false,$user_id);
            $data['user_id'] = $user_id;
            $data['user_name'] = $this->aauth->get_user_first_name($user_id).' '.$this->aauth->get_user_last_name($user_id);
        }else{
            $data['pages'] = $this->page_model->get_pages();
            $data['user_id'] = $user_id;
        }

        $config['base_url']    = base_url().'page/admin';
        $config['total_rows']  = 3;
        $config['per_page']    = 3;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $this->template->set_template('login_signup');
        $this->template->write('title', 'Pages', TRUE);
        $this->template->write_view('content', 'page_list', $data , TRUE);
        $this->template->render();
    }



    public function page_details($id,$user_id=FALSE, $funnel_id){
        $this->functions->check_session();
        $this->functions->access();
        $data['title'] = $this->page_model->get_page_title($id);
        $data['content'] = $this->page_model->get_page_content($id);
        $data['activate_countdown'] = $this->page_model->get_page_title($id);
        $data['type'] = $this->page_model->get_page_type($id);
        $data['id'] = $id;
        if($user_id)
            $data['user_id'] = $user_id;
        else
            $data['user_id'] = $this->session->userdata('id');
		$data['funnel_id'] = $funnel_id;
        $this->load->view('page_details', $data);

    }

    public function set_homepage($page_id){
        $this->functions->check_session();
        $this->page_model->reset_home();
        $this->page_model->set_home($page_id);

        redirect('page/admin');
    }

    public function set_default_page($page_id,$user_id=FALSE){
        $this->functions->check_session();
        if(!$user_id){
            $user_id = $this->session->userdata('id');
        }
        $this->page_model->reset_default($user_id);
        $this->page_model->set_default($page_id);

        redirect('page/admin/'.$user_id);
    }

    public function delete_page($id,$user_id=FALSE,$funnel_id, $type){
        $this->functions->check_session();
        $this->functions->access();
        $homepage = $this->page_model->is_homepage($id);
        $this->page_model->delete_page($id);

        if($this->page_model->has_pages() && $homepage == TRUE){
            $new_home_id =$this->page_model->get_first_row();
            $this->page_model->set_home($new_home_id);
        }

        $main_pages_menu = $this->menu->main_has_page($id);
        $sub_pages_menu = $this->menu->sub_has_page($id);

        if(count($main_pages_menu) > 0){
            foreach($main_pages_menu as $key => $value){
                $this->menu->unpublish_menu($value);
            }
        }

        if(count($sub_pages_menu) > 0){
            foreach($sub_pages_menu as $key => $value){
                $this->menu->unpublish_sub_menu($value);
            }
        }
		
		redirect('page/funnel_page/'.$funnel_id.'/'.$type);
        

    }



    public function add_page($funnel_id){
        $this->functions->check_session();
        $user_id = $this->session->userdata('id');
        $this->functions->access();
        
        $type = 0;
		if(!isset($_GET['snippet']))
        {
			$type = $_GET['type'];
        }
	
        
		$js = array('scripts/load-image.all.min.js','scripts/contentbuilder.js?v=123');
		$data['admin_jsinc'] = $js;

        $css = array('default/css/home/css/content.css','default/css/home/css/contentbuilder.css','admin/scripts/ajax.js');
        
		if(!isset($_GET['snippet']))
        {
            $customjs = '';
        	$customjs .= "<script type='text/javascript'>
        	            var site_url = '".site_url()."';
                        var base_url = '".base_url()."';        
                        jQuery(document).ready(function ($) {





                        	
            ";


            if($_GET['type'] == 2){

            $customjs .= "
                                $('#contentarea').contentbuilder({
                                    snippetFile:'". base_url() ."assets/components/assets/minimalist-basic/snippets_club.php',
                                    snippetOpen: true,
                                    toolbar: 'left',
                                    snippetCategories: [
                                    [0, 'Club Products'],
                                    [1, 'Funnel 1 - Bamboo Sunglasses'],
                                    [2, 'Funnel 2 - Anti-theft backpack'],
                                    [3, 'Funnel 3 - Map Watch'],
                                    [4, 'Funnel 4 - Rechargeable Twitching Lure'],
                                    ],
                                    iconselect: '". base_url() ."assets/components/assets/ionicons/selecticon.php'
                                });








                        ";
            }else{

            $customjs .= "
                                $('#contentarea').contentbuilder({
                                    snippetFile:'". base_url() ."assets/components/assets/minimalist-basic/snippets.php',
                                    snippetOpen: true,
                                    toolbar: 'left',
                                    iconselect: '". base_url() ."assets/components/assets/ionicons/selecticon.php'
                                });
                        ";
            }



            $customjs .= "            

                                    $('.show-countdown-check').click(function() {
                                        $('.show-countdown').toggle(this.checked);
                                        $('#countdown_day').prop('selectedIndex',0);
                                        $('#countdown_month').prop('selectedIndex',0);
                                        $('#countdown_year').prop('selectedIndex',0);
                                        $('#countdown_hour').prop('selectedIndex',0);
                                        $('#countdown_minute').prop('selectedIndex',0);


                                    });

                                    $('input#title').val($('input#title').val().substring(0, $('input#title').val().indexOf('----')));


                                        var divCheckingInterval = setInterval(function(){
                                            if(document.querySelector('#chours')){
                                                console.log('Found!');
                                                $('#visible-countdown').show();
                                                clearInterval(divCheckingInterval);
                                            }
                                        }, 500);



                            });


                                        var divCheckingInterval2 = setInterval(function(){
                                            if(document.querySelector('.help-tip')){
                                                clearInterval(divCheckingInterval2);
                                            }else{
				                                $('.big-button').after('<div class=help-tip  contenteditable=false style=float:right;top:-95px;right:-60px;><p>If your text does not fit across the top line of this button it will be cropped. In order to create a second line hold SHIFT at the end of the top line and then press RETURN to create a second line where the text will continue to be centered.</p></div>');
				                                $('.upgrade-order').after('<div class=help-tip  contenteditable=false style=float:right;top:-65px;right:-36px;><p>To ensure this button works correctly click “Edit Link” then choose “External Link” then paste in the link to your PayPal button.<br/><br/>This button includes an upgrade. So ensure that the PayPal button is correct to include the price of the additional product as well as the price of the first page product.</p></div>');
				                                $('.ship-button').after('<div class=help-tip  contenteditable=false style=float:right;top:-65px;right:-36px;><p>To ensure this button works correctly, click “Edit Link”, choose “Funnel Link” then select the correct page from the drop down menu for both the link (to buy one) and secondary link (to buy two). You will need to have created these two separate pages first within your funnel before they can be selected.</p></div>');
				                                $('.no-thanks').after('<div class=help-tip  contenteditable=false><p>To ensure this button works correctly click “Edit Link” then choose “External Link” then paste in the link to your PayPal button. <br/><br/>This link is saying no to the upgrade, so the PayPal button should include the cost of the front page product only.</p></div>');
				                                $('.policy-s span:last-child').after('<div class=help-tip contenteditable=false><p>To ensure the links below work correctly click “Edit Link”, choose “Funnel Link” then select your Policies page from the drop down menu. This page will only be visible in the menu once you have created it.</p></div>');
                                            }
                                        }, 500);




                             $(document).on('click', '#save_page', function() {
                                        $(this).attr('value','Saving Page....');
                                        clearInterval(divCheckingInterval2);
                                        $('div.help-tip').remove();
                                        //return false;
                                               var count = 0;
                                           $('#contentarea img[src*=\'base64\']').each(function(){
                                                count = count+1;
                                                $(this).attr('id',count);
                                                $(this).attr('rel','changed');
                                                $.ajax({
                                                    type: \"POST\",
                                                    url: '". site_url('page/upload_image') ."',
                                                    data: { img_data:this.src, img_id:count, name:name },
                                                    cache: false,
                                                    contentType: \"application/x-www-form-urlencoded\",
                                                    success: function (result) {
                                                        var parsed_data = JSON.parse(result);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').attr('src',parsed_data.path);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('rel');
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('id');
                                                    }

                                                });
                                                //alert();
                                            });
                                        setTimeout(save_page, 2000);
                                        function save_page() {
                                            var page = $('#contentarea').data('contentbuilder').html();
                                            var title = $(\"#title\").val() + '----' + + $(\"#countdown_year\").val() + '-' + $(\"#countdown_month\").val() + '-' +  $(\"#countdown_day\").val() + '-' +  $(\"#countdown_hour\").val() + '-' +  $(\"#countdown_minute\").val();

                                            $.ajax({
                                                type: \"POST\",
                                                url: '" . site_url('page/save_page') . "',
                                                data: \"page=\" + encodeURIComponent(page) + \"&title=\" + title + \"&user_id=\"+ ". $user_id." + \"&funnel_id=\"+ ". $funnel_id." + \"&type=\" + ".$type.",
                                                //data: \"page=\" + encodeURIComponent(page) + \"&title=\" + title+ \"&activate_countdown=\"+ activate_countdown +\"&countdown_day=\"+countdown_day+\"&countdown_month=\"+countdown_month+\"&countdown_year=\"+countdown_year+\"&user_id = \" + ". $user_id.",

                                                success: function(result) {
                                                	
                                                	
                                                	
                                                    var parsed_data = JSON.parse(result);
                                                    if(parsed_data.result == \"success\")
                                                    {
            	                                        $(this).attr('disabled','disabled');
														if(parsed_data.type == 0)
														{
	    	                                                window.location.href = '" . site_url('page/funnel_page/'.$funnel_id.'/0') . "';

														}
														else
														{
	    	                                                window.location.href = '" . site_url('page/funnel_page/'.$funnel_id.'/'.$type) . "';
														}
    												}
    												else
    												{
				                                        $(this).attr('disabled','false');

    													alert('Already Existing..............');
													}
                                                //redirect
                                                //alert(parsed_data);
                                                //window.location.href = '" . site_url()."page/update_page/'+parsed_data.id;
                                                }
                                            });
                                        }

                        });
                     </script>";
        }
		else
		{
			 $customjs = "<script type='text/javascript'>
			            var site_url = '".site_url()."';
                        var base_url = '".base_url()."';
              
                        jQuery(document).ready(function ($) { 
                                $('#contentarea').contentbuilder({
                                    snippetFile:'". base_url() ."assets/components/assets/minimalist-basic/snippets.php',
                                    snippetOpen: true,
                                    toolbar: 'left',
                                    iconselect: '". base_url() ."assets/components/assets/ionicons/selecticon.php'
                                });
                                    $('.show-countdown-check').click(function() {
                                        $('.show-countdown').toggle(this.checked);
                                        $('#countdown_day').prop('selectedIndex',0);
                                        $('#countdown_month').prop('selectedIndex',0);
                                        $('#countdown_year').prop('selectedIndex',0);
                                        $('#countdown_hour').prop('selectedIndex',0);
                                        $('#countdown_minute').prop('selectedIndex',0);


                                    });

                                    $('input#title').val($('input#title').val().substring(0, $('input#title').val().indexOf('----')));
									$('#divTool').css('display', 'none');


                                        var divCheckingInterval = setInterval(function(){
                                            if(document.querySelector('#chours')){
                                                console.log('Found!');
                                                $('#visible-countdown').show();
                                                clearInterval(divCheckingInterval);
                                            }
                                        }, 500);

                                $('.big-button').after('<div class=help-tip  contenteditable=false style=float:right;top:-95px;right:-60px;><p>If your text does not fit across the top line of this button it will be cropped. In order to create a second line hold SHIFT at the end of the top line and then press RETURN to create a second line where the text will continue to be centered.</p></div>');
                                $('.upgrade-order').after('<div class=help-tip  contenteditable=false style=float:right;top:-65px;right:-36px;><p>To ensure this button works correctly click “Edit Link” then choose “External Link” then paste in the link to your PayPal button.<br/><br/>This button includes an upgrade. So ensure that the PayPal button is correct to include the price of the additional product as well as the price of the first page product.</p></div>');
                                $('.ship-button').after('<div class=help-tip  contenteditable=false style=float:right;top:-65px;right:-36px;><p>To ensure this button works correctly, click “Edit Link”, choose “Funnel Link” then select the correct page from the drop down menu for both the link (to buy one) and secondary link (to buy two). You will need to have created these two separate pages first within your funnel before they can be selected.</p></div>');
                                $('.no-thanks').after('<div class=help-tip  contenteditable=false><p>To ensure this button works correctly click “Edit Link” then choose “External Link” then paste in the link to your PayPal button. <br/><br/>This link is saying no to the upgrade, so the PayPal button should include the cost of the front page product only.</p></div>');
                                $('.policy-s span:last-child').after('<div class=help-tip contenteditable=false><p>To ensure the links below work correctly click “Edit Link”, choose “Funnel Link” then select your Policies page from the drop down menu. This page will only be visible in the menu once you have created it.</p></div>');

                            });

                             $(document).on('click', '#save_page', function() {
                                        $(this).attr('value','Saving Page....');
                                        	$('div.help-tip').remove();
                                               var count = 0;
                                           $('#contentarea img[src*=\'base64\']').each(function(){
                                                count = count+1;
                                                $(this).attr('id',count);
                                                $(this).attr('rel','changed');
                                                $.ajax({
                                                    type: \"POST\",
                                                    url: '". site_url('page/upload_image') ."',
                                                    data: { img_data:this.src, img_id:count, name:name },
                                                    cache: false,
                                                    contentType: \"application/x-www-form-urlencoded\",
                                                    success: function (result) {
                                                        var parsed_data = JSON.parse(result);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').attr('src',parsed_data.path);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('rel');
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('id');
                                                    }

                                                });
                                                //alert();
                                            });
                                        setTimeout(save_page, 2000);
                                        function save_page() {
                                            var page = $('#contentarea').data('contentbuilder').html();
                                            var title = $(\"#title\").val() + '----' + + $(\"#countdown_year\").val() + '-' + $(\"#countdown_month\").val() + '-' +  $(\"#countdown_day\").val() + '-' +  $(\"#countdown_hour\").val() + '-' +  $(\"#countdown_minute\").val();

                                            $.ajax({
                                                type: \"POST\",
                                                url: '" . site_url('page/save_page') . "',
                                                data: \"page=\" + encodeURIComponent(page) + \"&title=\" + title + \"&user_id=\"+ ". $user_id." + \"&funnel_id=\"+ ". $funnel_id." + \"&type=\" + ".$type.",
                                                //data: \"page=\" + encodeURIComponent(page) + \"&title=\" + title+ \"&activate_countdown=\"+ activate_countdown +\"&countdown_day=\"+countdown_day+\"&countdown_month=\"+countdown_month+\"&countdown_year=\"+countdown_year+\"&user_id = \" + ". $user_id.",

                                                success: function(result) {
                                                	
                                                	
                                                	
                                                    var parsed_data = JSON.parse(result);
                                                    if(parsed_data.result == \"success\")
                                                    {
            	                                        $(this).attr('disabled','disabled');
														if(parsed_data.type == 0)
														{
	    	                                                window.location.href = '" . site_url('page/funnel_page/'.$funnel_id.'/0') . "';

														}
														else
														{
	    	                                                window.location.href = '" . site_url('page/funnel_page/'.$funnel_id.'/'.$type) . "';
														}
    												}
    												else
    												{
				                                        $(this).attr('disabled','false');

    													alert('Already Existing..............');
													}
                                                //redirect
                                                //alert(parsed_data);
                                                //window.location.href = '" . site_url()."page/update_page/'+parsed_data.id;
                                                }
                                            });
                                        }

                        });
                     </script>";
		}
       
                     
        
        
        
        $data['css'] = $css;
        $data['custom_js'] = $customjs;

        $this->functions->show_frontend_view('update_page', 'Home admin',$data);

    }
    public function edit_page($page_id,$user_id,$funnel_id, $type){
        $this->functions->check_session();
        $this->functions->access();
        $js =array('scripts/load-image.all.min.js','scripts/contentbuilder.js?v=123');
        $css = array('default/css/home/css/content.css','default/css/home/css/contentbuilder.css','admin/scripts/ajax.js');
        
        $customjs = '';
        
        if($type == 0)
        {
        	$customjs = "<script type='text/javascript'>
        	            var site_url = '".site_url()."';
                        var base_url = '".base_url()."';
                        jQuery(document).ready(function ($) {

                                $('#contentarea').contentbuilder({
                                    snippetFile:'". base_url() ."assets/components/assets/minimalist-basic/snippets.php?v=".rand(1,99999)."',
                                    snippetOpen: true,
                                    toolbar: 'left',
                                    iconselect: '". base_url() ."assets/components/assets/ionicons/selecticon.php'
                                });

                                    $('.show-countdown-check').click(function() {
                                        $('.show-countdown').toggle(this.checked);
                                        $('#countdown_day').prop('selectedIndex',0);
                                        $('#countdown_month').prop('selectedIndex',0);
                                        $('#countdown_year').prop('selectedIndex',0);
                                        $('#countdown_hour').prop('selectedIndex',0);
                                        $('#countdown_minute').prop('selectedIndex',0);
                                    });

                                    $('input#title').val($('input#title').val().substring(0, $('input#title').val().indexOf('----')));

									$('#divTool').css('display', 'none');




                                        var divCheckingInterval = setInterval(function(){
                                            if(document.querySelector('#chours')){
                                                console.log('Found!');
                                                $('#visible-countdown').show();
                                                clearInterval(divCheckingInterval);
                                            }
                                        }, 500);



                            });



                             $(document).on('click', '#save_page', function() {


                                        $(this).attr('disabled','disabled');
                                        $(this).attr('value','Saving Page....');

                                               var count = 0;
                                           $('#contentarea img[src*=\'base64\']').each(function(){
                                                count = count+1;
                                                $(this).attr('id',count);
                                                $(this).attr('rel','changed');
                                                $.ajax({
                                                    type: \"POST\",
                                                    url: '". site_url('page/upload_image') ."',
                                                    data: { img_data:this.src, img_id:count, name:name },
                                                    cache: false,
                                                    contentType: \"application/x-www-form-urlencoded\",
                                                    success: function (result) {
                                                        var parsed_data = JSON.parse(result);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').attr('src',parsed_data.path);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('rel');
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('id');
                                                    }

                                                });
                                                //alert();
                                            });
                                        setTimeout(save_page, 2000);
                                        function save_page() {
                                            var page = $('#contentarea').data('contentbuilder').html();
                                            var title = $(\"#title\").val() + '----' + + $(\"#countdown_year\").val() + '-' + $(\"#countdown_month\").val() + '-' +  $(\"#countdown_day\").val() + '-' +  $(\"#countdown_hour\").val() + '-' +  $(\"#countdown_minute\").val();
                                            $.ajax({
                                                type: \"POST\",
                                                url: '" . site_url('page/update_page/'.$page_id) . "',
                                                data: \"page=\" + encodeURIComponent(page) + \"&title=\" + encodeURIComponent(title) + \"&user_id=\"+ ". $user_id.",
                                                //data: \"page=\" + encodeURIComponent(page) + \"&title=\" + title+ \"&activate_countdown=\"+ activate_countdown +\"&countdown_day=\"+countdown_day+\"&countdown_month=\"+countdown_month+\"&countdown_year=\"+countdown_year+\"&user_id = \" + ". $user_id.",
                                                success: function(result) {
                                                var parsed_data = JSON.parse(result);
                                                //redirect
                                                if(parsed_data.result == \"success\")
                                                    {
                                                        //window.location.href = '" . site_url()."page/update_page/'+parsed_data.id;
                                                        window.location.href = '" . site_url('page/funnel_page/'.$funnel_id.'/'.$type) . "';
                                                    } else {
                                                        alert('The Page Title is already in the system or is blank. Please, try another Page Title');
                                                        window.location.href = '" . site_url('page/edit_page/'.$page_id.'/'.$user_id.'/'.$funnel_id.'/'.$type) . "';
                                                    }
                                                }
                                            });
                                        }

                        });
                     </script>";
        }
        else
        {
        	$customjs .= "<script type='text/javascript'>
        	            var site_url = '".site_url()."';
                        var base_url = '".base_url()."';
                        jQuery(document).ready(function ($) {

                        ";




            if($type == 2){
            $customjs .= "            


                                $('#contentarea').contentbuilder({
                                    snippetFile:'". base_url() ."assets/components/assets/minimalist-basic/snippets_club.php?v=".rand(1,99999)."',
                                    snippetOpen: true,
                                    toolbar: 'left',
                                    iconselect: '". base_url() ."assets/components/assets/ionicons/selecticon.php'
                                });

            ";
            }else{
            $customjs .= "            


                                $('#contentarea').contentbuilder({
                                    snippetFile:'". base_url() ."assets/components/assets/minimalist-basic/snippets.php?v=".rand(1,99999)."',
                                    snippetOpen: true,
                                    toolbar: 'left',
                                    iconselect: '". base_url() ."assets/components/assets/ionicons/selecticon.php'
                                });

            ";                
            }


            $customjs .= "



                                    $('.show-countdown-check').click(function() {
                                        $('.show-countdown').toggle(this.checked);
                                        $('#countdown_day').prop('selectedIndex',0);
                                        $('#countdown_month').prop('selectedIndex',0);
                                        $('#countdown_year').prop('selectedIndex',0);
                                        $('#countdown_hour').prop('selectedIndex',0);
                                        $('#countdown_minute').prop('selectedIndex',0);
                                    });

                                    $('input#title').val($('input#title').val().substring(0, $('input#title').val().indexOf('----')));



                                        var divCheckingInterval = setInterval(function(){
                                            if(document.querySelector('#chours')){
                                                console.log('Found!');
                                                $('#visible-countdown').show();
                                                clearInterval(divCheckingInterval);
                                            }
                                        }, 500);


                            });



                             $(document).on('click', '#save_page', function() {
                                        $(this).attr('disabled','disabled');
                                        $(this).attr('value','Saving Page....');

                                               var count = 0;
                                           $('#contentarea img[src*=\'base64\']').each(function(){
                                                count = count+1;
                                                $(this).attr('id',count);
                                                $(this).attr('rel','changed');
                                                $.ajax({
                                                    type: \"POST\",
                                                    url: '". site_url('page/upload_image') ."',
                                                    data: { img_data:this.src, img_id:count, name:name },
                                                    cache: false,
                                                    contentType: \"application/x-www-form-urlencoded\",
                                                    success: function (result) {
                                                        var parsed_data = JSON.parse(result);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').attr('src',parsed_data.path);
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('rel');
                                                            $('#contentarea img[id='+parsed_data.img_id+']').removeAttr('id');
                                                    }

                                                });
                                                //alert();
                                            });
                                        setTimeout(save_page, 2000);
                                        function save_page() {
                                            var page = $('#contentarea').data('contentbuilder').html();
                                            var title = $(\"#title\").val() + '----' + + $(\"#countdown_year\").val() + '-' + $(\"#countdown_month\").val() + '-' +  $(\"#countdown_day\").val() + '-' +  $(\"#countdown_hour\").val() + '-' +  $(\"#countdown_minute\").val();
                                            $.ajax({
                                                type: \"POST\",
                                                url: '" . site_url('page/update_page/'.$page_id) . "',
                                                data: \"page=\" + encodeURIComponent(page) + \"&title=\" + encodeURIComponent(title) + \"&user_id=\"+ ". $user_id.",
                                                //data: \"page=\" + encodeURIComponent(page) + \"&title=\" + title+ \"&activate_countdown=\"+ activate_countdown +\"&countdown_day=\"+countdown_day+\"&countdown_month=\"+countdown_month+\"&countdown_year=\"+countdown_year+\"&user_id = \" + ". $user_id.",
                                                success: function(result) {
                                                var parsed_data = JSON.parse(result);
                                                //redirect
                                                if(parsed_data.result == \"success\")
                                                    {
                                                        //window.location.href = '" . site_url()."page/update_page/'+parsed_data.id;
                                                        window.location.href = '" . site_url('page/funnel_page/'.$funnel_id.'/'.$type) . "';
                                                    } else {
                                                        alert('The Page Title is already in the system or is blank. Please, try another Page Title');
                                                        window.location.href = '" . site_url('page/edit_page/'.$page_id.'/'.$user_id.'/'.$funnel_id.'/'.$type) . "';
                                                    }
                                                }
                                            });
                                        }

                        });
                     </script>";
        }
        
        $data['admin_jsinc'] = $js;
        $data['css'] = $css;
        $data['custom_js'] = $customjs;
        $data['page'] = $this->page_model->get_page($page_id);

        $this->functions->show_frontend_view('update_page','Update',$data);

    }

    public function upload_image(){
        $this->functions->check_session();
        $this->functions->access();
        $this->load->library('files');
        $path = "./assets/media/";
        $file_name = $this->files->generateRandomString();
        $pics['filename'] = $this->files->save_base64_image($_POST['img_data'], $file_name, $path);
        $pics['path'] = base_url() . 'assets/media/' . $this->files->save_base64_image($_POST['img_data'], $file_name, $path);
        $pics['img_id'] = $_POST['img_id'];
        echo json_encode($pics);
    }

    public function save_page(){
        $this->functions->check_session();
        $this->functions->access();
        $title = (strlen(explode('----', $_REQUEST['title'])[0]) > 0) ? $_REQUEST['title'] : "No Title";
        $content = $_REQUEST['page'];
        $data['content'] = $content;
        $data['title'] = $title;
        $user_id = $_REQUEST['user_id'];
        $type = $_REQUEST['type'];
        $funnel_id = $_REQUEST['funnel_id'];
        if(!$this->page_model->has_pages()){
            $data['home'] = 1;
        }
		if(!$this->page_model->IsExistingTitle($title))
		{
			
	        $deets['result'] = 'success';
	        $deets['type'] = $type;
	        $deets['id'] = $this->page_model->add_page($data,$user_id, $funnel_id, $type);

		}
		else
		{
			$deets['result'] = 'fail';
			$deets['type'] = $type;
	        $deets['id'] = 0;

		}
        echo json_encode($deets);
    }

    public function update_page($page_id,$user_id=FALSE){
        $this->functions->check_session();
        $this->functions->access();
        $title = (strlen(explode('----', $_REQUEST['title'])[0]) > 0) ? $_REQUEST['title'] : "No Title";
        $content = $_REQUEST['page'];
        if(!$this->page_model->IsExistingTitle_InEdit($title,$page_id)) {
            $data['content'] = $content;
            $data['title'] = $title;
            $this->page_model->edit_page($page_id,$data);
            $deets['result'] = 'success';
        } else {
	        $deets['result'] = 'fail';
        }
        echo json_encode($deets);
    }


    //////////////////////////////////////////
    /// PERMISSIONS ////////////////////////////
    /////////////////////////////////////////

    public function page_perm($id){
        $this->functions->check_session();
        $this->functions->access();

        $data['id'] = $id;

        $this->functions->show_view('page_perm','Page Permissions',$data);

    }

    public function save_page_perm(){
        $this->functions->check_session();
        $this->functions->access();
        $postdata = $this->input->post();

        $data['id'] = $postdata['id'];
        $data['type'] = $postdata['type'];


        redirect('page/content_page_perm/'.$postdata['id'].'/'.$postdata['type']);
    }

    public  function content_page_perm($id,$type)
    {
        $this->functions->check_session();
        $this->functions->access();
        $user_perms = array();
        $group_perms = array();
        $perms = $this->page_model->get_perms($id, 'user');
        if (is_array($perms)) {
            foreach ($perms as $perm)
                $user_perms[] = $perm->user_id;
        }
        $gperms = $this->page_model->get_perms($id, 'group');
        if (is_array($gperms)) {
            foreach ($gperms as $gperm)
                $group_perms[] = $gperm->group_id;
        }

        $data = array(
            'id' => $id,
            'type' => $type
        );
        if( $type == 'user'){
            $data['users'] = $this->aauth->list_users();
            $data['user_perms'] = $user_perms;
        }else{
            $data['group_perms'] = $group_perms;
            $data['groups'] = $this->aauth->list_groups();
        }

        $this->functions->show_view('content_page_perm','Manage Page Permissions',$data);

    }

    public function update_perm_content(){
        $this->functions->check_session();
        $this->functions->access();
        $postdata = $this->input->post();

        if($postdata['type'] == 'user'){
            if($this->page_model->check_perms($postdata['id'],'user')){
                $this->page_model->delete_page_perm($postdata['id'],'user');
            }
            if(isset($postdata['users'])) {
                foreach ($postdata['users'] as $user) {
                    $data['page_id'] = $postdata['id'];
                    $data['user_id'] = $user;
                    $this->page_model->add_page_perm($data, 'user');
                }
            }
        }else{
            if($this->page_model->check_perms($postdata['id'],'group')){
                $this->page_model->delete_page_perm($postdata['id'],'group');
            }
            if(isset($postdata['groups'])) {
                foreach ($postdata['groups'] as $group) {
                    $data['page_id'] = $postdata['id'];
                    $data['group_id'] = $group;
                    $this->page_model->add_page_perm($data, 'group');
                }
            }

        }

        redirect('page/page_perm_list/'.$postdata['id']);

    }

    public function page_perm_list($page_id){
        $this->functions->check_session();
        $this->functions->access();

        $data['users'] = $this->page_model->get_perms($page_id,'user');
        $data['groups'] = $this->page_model->get_perms($page_id,'group');
        $data['page_id'] = $page_id;


        $this->functions->show_view('page_perm_list','Manage Page Permissions',$data);

    }

    //////////////////////////////////////////
    /// FRONT END ////////////////////////////
    /////////////////////////////////////////

    public function front_login(){
        $this->functions->check_session();

            $data = array(
                'menu' => $this->menu->generate_menu(1),
                'logged_in' => $this->aauth->is_loggedin()
            );

                $this->functions->show_frontend_view('front_end/login','Login',$data);

    }

    public function content($page_id){
        $this->functions->check_session();
        $css = array('default/css/home/css/content_front.css','default/css/themes/theme-classic.css');
        $data = array(
            'menu' => $this->menu->generate_menu(1),
            'logged_in' => $this->aauth->is_loggedin(),
            'page' => $this->page_model->get_page($page_id),
            'css' => $css,
            'home_page_id' => $this->menu->get_home_page(),
        );



        if($this->page_model->check_perms($page_id,'user') || $this->page_model->check_perms($page_id,'group')){
            //check if logged in
            if($this->aauth->is_loggedin()){
                //if logged in check if user has permission
                if($this->page_model->check_user_perms($page_id,$this->session->userdata('id'))){
                    $this->functions->show_frontend_view('front_end/content','Page Content',$data);
                }elseif($this->page_model->check_group_perms($page_id,$this->session->userdata('id'))){
                    $this->functions->show_frontend_view('front_end/content','Page Content',$data);
                }
                //if not show login
            }else
                $this->functions->show_frontend_view('front_end/login','Login',$data);
        }else{
            $this->functions->show_frontend_view('front_end/content','Page Content',$data);
        }

    }

    public function footer(){
        $this->functions->check_session();
        return $this->load->view('footer/default_footer', '',true);
    }
    public function visit($page_id, $funnel_id, $type){
        $this->functions->check_session();
    	
    	$css = FCPATH.'assets/downloads/assets/css';
        $title = strtolower(str_replace(' ', '_', $this->page_model->get_page_title($page_id)));
		$title_firstname = preg_split('/\-/',$title);

        if($title_firstname[0] == '') $title_firstname[0] = time();

        $location = FCPATH.$title_firstname[0];
        $file_name = 'index';
        $ext = 'html';

        $header_data['title'] = $title;
        $footer_data['is_disable_fbanner'] = $this->page_model->get_is_disable_fbanner($page_id);
        $header = $this->load->view('front_end/download_header',$header_data,TRUE);
        $footer = $this->load->view('front_end/download_footer',$footer_data,TRUE);
        $content = $this->page_model->get_page_content($page_id);
        $data = $header.$content.$footer;

        //die($location);

        if($this->files->folder_exist($location)) {
            $this->files->delete_directory($location);
            sleep(1);
        }

        mkdir($location);
        $this->files->move_directory($css,$location.'/css');
        $this->files->create_file($file_name,$ext,$data,$location);
        sleep(1);
        echo base_url().strtolower($title_firstname[0]).'/';
        
        //echo '<script>window.open("'.base_url().strtolower($title_firstname[0]).'"); window.focus();</script>';
        
        // if($type == 0)
        // {
        // 	echo '<script>window.location.href="/page/page/funnel_page/'.$funnel_id.'/0#"</script>';
        // }
        // else
        // {
        // 	echo '<script>window.location.href="/page/page/funnel_page/'.$funnel_id.'/1#"</script>';
        // }
        
        // echo '<script>window.location.href="/page/page/funnel_page/'.$funnel_id.'/'.$type.'#"</script>';        
                

    }
    public function download($page_id){
        $this->functions->check_session();

        $css = FCPATH.'assets/downloads/assets/css';
        $title = str_replace(' ', '_', $this->page_model->get_page_title($page_id));
        $location = FCPATH.'assets/downloads/site/'.$title;
        $file_name = 'index';
        $ext = 'html';

        $header_data['title'] = $title;
        $footer_data['is_disable_fbanner'] = $this->page_model->get_is_disable_fbanner($page_id);
        $header = $this->load->view('front_end/download_header',$header_data,TRUE);
        $footer = $this->load->view('front_end/download_footer',$footer_data,TRUE);
        $content = $this->page_model->get_page_content($page_id);
        $data = $header.$content.$footer;

        //die($location);

        if($this->files->folder_exist($location)) {
            $this->files->delete_directory($location);
            sleep(1);
        }

        mkdir($location);
        $this->files->move_directory($css,$location.'/css');
        $this->files->create_file($file_name,$ext,$data,$location);
        $this->files->createZip($location,$location.'.zip');
		
        redirect("page/download_headers/".$title);


	
    }

    public function download_headers($title){
        $this->functions->check_session();
        $attachment_location = FCPATH.'assets/downloads/site/'.$title.'.zip';
        if (file_exists($attachment_location)) {

            header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
            header("Cache-Control: public"); // needed for internet explorer
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: Binary");
            header("Content-Length:".filesize($attachment_location));
            header("Content-Disposition: attachment; filename=".$title.".zip");
            readfile($attachment_location);
        } else {
            die("Error: File not found.");
        }

        //redirect("page/delete_downloads/".$title);
        $this->files->delete_directory(FCPATH.'assets/downloads/site/'.$title."/");
    }

    public function delete_downloads($title){
        $this->files->delete_directory(FCPATH.'assets/downloads/site/'.$title."/");
    }
    
    public function loading()
    {
        $this->functions->check_session();
        echo '<!DOCTYPE html><html><head><title>Loading...</title></head>';
          echo '<body style="background:url('.base_url('assets/img/loading.gif').') no-repeat center center; margin-top:50%;">';
          echo 'Page Loading...';
        echo '</body></html>';
    }
    
    public function go_link($page_id, $funnel_id, $type){
        
        $css = FCPATH.'assets/downloads/assets/css';
        $title = strtolower(str_replace(' ', '_', $this->page_model->get_page_title($page_id)));
        $title_firstname = preg_split('/\-/',$title);

        if($title_firstname[0] == '') $title_firstname[0] = time();

        $location = FCPATH.$title_firstname[0];
        $file_name = 'index';
        $ext = 'html';

        $header_data['title'] = $title;
        $footer_data['is_disable_fbanner'] = $this->page_model->get_is_disable_fbanner($page_id);
        $header = $this->load->view('front_end/download_header',$header_data,TRUE);
        $footer = $this->load->view('front_end/download_footer',$footer_data,TRUE);
        $content = $this->page_model->get_page_content($page_id);
        $data = $header.$content.$footer;

        //die($location);

        if($this->files->folder_exist($location)) {
            $this->files->delete_directory($location);
            sleep(1);
        }

        mkdir($location);
        $this->files->move_directory($css,$location.'/css');
        $this->files->create_file($file_name,$ext,$data,$location);

        if($this->files->folder_exist($location)) {
            echo '<script>window.location.href = "'.base_url().strtolower($title_firstname[0]).'";</script>';
        } else {
            sleep(3);
            echo '<script>window.location.href = "'.base_url().strtolower($title_firstname[0]).'";</script>';
        }

    }
    
    public function duplicate_page($page_id,$user_id,$funnel_id, $type){
        $this->functions->check_session();
        $this->functions->access();
        $data['title'] =  "copy - ".$this->page_model->get_page_title($page_id);
        $data['content'] = $this->page_model->get_page_content($page_id);
        if(!$this->page_model->has_pages()){
            $data['homepageme'] = 1;
        }
        if(!$this->page_model->IsExistingTitle($title, $funnel_id))
        {
            
            $this->page_model->add_page($data,$user_id, $funnel_id, $type);
        }
        redirect("page/funnel_page/".$funnel_id."/".$type);

    }

    public function rename_page() {
        $this->functions->check_session();
        $this->functions->access();
        $page_id = $_POST['page_id'];
        if ($_POST['title_tail'] == '') {
            $title = $_POST['rename'];
        } else {
            $title = $_POST['rename'].'----'.$_POST['title_tail'];
        }
        $funnel_id = $_POST['funnel_id'];
        $funnel_type = $_POST['funnel_type'];
        if(!$this->page_model->IsExistingTitle($title, $funnel_id)) {
            $res = $this->page_model->rename_page($page_id, $title);
        } else {
            $this->session->set_flashdata('error', 'Sorry, The same title has been existed... Try, again.');
        }
        redirect("page/funnel_page/".$funnel_id."/".$funnel_type);
    }

}