<div class="col-xs modal fade aside aside-sm  b-r" id="list">
    <div class="row-col">
        <div class="row-row">
            <div class="row-col">

                <div class="col-xs">
                    <div class="row-col white bg">
                        <!-- flex content -->
                        <div class="row-row">
                            <div class="row-body scrollable hover">
                                <div class="row-inner">
                                    <!-- left content -->
                                    <div class="list" data-ui-list="b-r b-3x b-primary" data-ui-list-target="#detail" data-ui-list-target-class="show" id="page">

                                        <?php
                                        if(!empty($pages)) {
                                            foreach ($pages as $page) {
                                                ?>


                                                <div class="list-item ">
                                                    <div class="list-body">
                                                        <div class="pull-right dropdown" style="padding-right: 20px;">
                                                            <a href="#" data-toggle="dropdown" class="text-muted"><i
                                                                    class="fa fa-fw fa-bars" style="border-radius:50%;border:solid 1px #000;padding:5px;width:25px;height:25px;margin-right:10px;"></i> Page Options </a>

                                                            <div class="dropdown-menu pull-right text-color" style="right:auto;min-width: 150px;"
                                                                 role="menu">
                                                                <?php //echo anchor('page/visit/' . $page->id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-download"></i>Visit Page', 'class="dropdown-item"') ?>
                                                                
                                        <a class="dropdown-item" onclick="visit_site(<?php echo $page->id; ?>,<?php echo $funnel_id; ?>,<?php echo $type; ?>);"><i class="fa fa-download"></i>Visit Page</a>
                                        
                                        <a data-toggle="modal" onclick="rename_page('<?php echo ucwords($page->title); ?>', <?php echo $page->id; ?>,<?php echo $funnel_id; ?>,<?php echo $type; ?>);" data-target=".bd-example-modal-lg" class="dropdown-item"><i class="fa fa-pencil"></i>Rename Page</a>
                                       
                                                                <?php
                                                                if(isset($user_id)) {
                                                                    echo anchor('page/edit_page/' . $page->id.'/'.$user_id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-edit"></i>Edit Page', 'class="dropdown-item"');
                                                                    echo anchor('page/duplicate_page/' . $page->id.'/'.$user_id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-copy"></i>Duplicate Page', 'class="dropdown-item"');
                                                                    echo anchor('page/delete_page/' . $page->id.'/'.$user_id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-trash"></i>Delete Page', 'class="dropdown-item" onclick="if(!confirm(\'Are you sure you want to delete this page?\')){ return false; }"');
                                                                    if(!$this->aauth->is_admin($user_id)) {
                                                                        echo $default_id == $page->id ? "" : anchor('page/set_default_page/' . $page->id . '/' . $user_id, '<i class="fa fa-refresh"></i>Set Default Page', 'class="dropdown-item"');
                                                                    }
                                                                }else{
                                                                    echo anchor('page/edit_page/' . $page->id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-edit"></i>Edit Page', 'class="dropdown-item"');
                                                                    echo anchor('page/duplicate_page/' . $page->id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-copy"></i>Duplicate Page', 'class="dropdown-item"');
                                                                    echo anchor('page/delete_page/' . $page->id.'/'.$funnel_id.'/'.$type, '<i class="fa fa-trash"></i>Delete Page', 'class="dropdown-item" onclick="if(!confirm(\'Are you sure you want to delete this page?\')){ return false; }"');
                                                                    if(!$this->aauth->is_admin($user_id)) {
                                                                        echo $default_id == $page->id ? "" : anchor('page/set_default_page/' . $page->id, '<i class="fa fa-refresh"></i>Set Default Page', 'class="dropdown-item"');
                                                                    }
                                                                }
                                                                ?>
                                                                <?php echo anchor('page/download/' . $page->id, '<i class="fa fa-download"></i>Download Page', 'class="dropdown-item"') ?>

                                                            </div>
                                                        </div>
                                                        <?php if($default_id == $page->id){?>
                                                            <span class="nav-label">
                                                                                <b class="label warn rounded">Default Page</b>
                                                                            </span>
                                                        <?php }?>
                                                        <div class="item-title" id="<?php echo $page->id ?>" rel="<?php echo $user_id ?>">
                                                            <a href="#" class="_500" id="user_d">
                                                                <?php
                                                                //echo $home_id == $page->id?'<span class="nav-label"><b class="label warn rounded">Home page</b></span>':"";
                                                                echo strpos($page->title, "----") ? ucwords(substr($page->title, 0, strpos($page->title, "----"))) : ucwords($page->title);  ?></a>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php }
                                        }else{
                                            echo "<span class='text-center'>".$this->functions->show_msg("There are no Pages.","info")."</span>";
                                        }?>

                                    </div>
                                    <!-- / -->
                                </div>
                            </div>
                        </div>
                        <!-- / -->
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="white bg p-a b-t clearfix">
            <div class="btn-group pull-right">
                <?php echo $this->pagination->create_links(); ?>
                <!--<a href="#" class="btn btn-xs white circle"><i class="fa fa-fw fa-angle-left"></i></a>
                <a href="#" class="btn btn-xs white circle"><i class="fa fa-fw fa-angle-right"></i></a>-->
            </div>
        </div>
        <!-- / -->
    </div>
</div>
<div class="col-xs hidden-lg-up" id="detail">
<input type="hidden" value="<?php echo $funnel_id;?>" id="funnel_id"/>
</div>

<!-- RENAME MODAL -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form action="<?php echo base_url(); ?>page/rename_page" method="POST">
    <div class="modal-content">
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Page Title:</label>
            <input type="text" class="form-control" name="rename" id="rename">
            <input type="text" hidden class="form-control" name="title_tail" id="title_tail">
            <input type="text" hidden class="form-control" name="page_id" id="page_id">
            <input type="text" hidden class="form-control" name="funnel_id" id="form_funnel_id">
            <input type="text" hidden class="form-control" name="funnel_type" id="funnel_type">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
 
  function visit_site(page_id, funnel_id, type){
  
    var w = window.open( site_url+'page/loading' );
    $.ajax({
        url: site_url+'page/visit/'+page_id+'/'+funnel_id+'/'+type,
        data: {
            some_var : "Something",
            another_var : "Something else"
        },
        // remember, this request is just returning the URL we need.
        success: function( data )
        {
            if(data){
                w.location = data;      
            }
          reload();
        }
    });
  }
  
  function rename_page(page_title, page_id, funnel_id, funnel_type){
    if (page_title.indexOf('----')) {
      var title = page_title.split('----')[0];
      var title_tail = page_title.split('----')[1];
    } else {
      var title = page_title;
      var title_tail = '';
    }
    $('#rename').val(title);
    $('#title_tail').val(title_tail);
    $('#page_id').val(page_id);
    $('#form_funnel_id').val(funnel_id);
    $('#funnel_type').val(funnel_type);
  }
</script>
