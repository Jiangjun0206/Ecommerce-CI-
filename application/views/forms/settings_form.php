<?php
$CI =& get_instance();
$CI->load->library('settings');
$i = 1;
$sgs = array();
foreach($subgroups as $subgroup) {
    array_push($sgs,$subgroup->subgroup);
}

foreach($sgs as $sg){
$gen_settings = $this->settings->get_settings($group,$sg);

if(strlen($sg)>0){
?>
<div class="tab-pane" id="tab-<?php echo $i ?>">
    <div class="p-a-md b-b _600"><?php echo ucfirst($sg) ?> Settings</div>
    <form role="form" class="p-a-md col-md-6" method="post" action="<?php echo site_url($this->uri->segment(1).'/save_settings') ?>">
        <?php

        foreach ($gen_settings as $gen_setting) {


            if($gen_setting->element == 'select'){



                echo $CI->settings->get_input($gen_setting->element, $gen_setting->name, $gen_setting->key, $gen_setting->value,$gen_setting->select_table,$gen_setting->select_column,$gen_setting->select_id);


            }else{
                echo $CI->settings->get_input($gen_setting->element, $gen_setting->name, $gen_setting->key, $gen_setting->value);

            }


        }

        }else {


        ?>

        <div class="tab-pane active" id="tab-<?php echo $i ?>">
            <div class="p-a-md b-b _600">General Settings</div>
            <form role="form" class="p-a-md col-md-6" method="post" action="<?php echo site_url($this->uri->segment(1).'/save_settings') ?>">
                <?php

                foreach ($gen_settings as $gen_setting) {


                    if($gen_setting->element == 'select'){


                        echo $CI->settings->get_input($gen_setting->element, $gen_setting->name, $gen_setting->key, $gen_setting->value,$gen_setting->select_table,$gen_setting->select_column,'id');


                    }else{
                        echo $CI->settings->get_input($gen_setting->element, $gen_setting->name, $gen_setting->key, $gen_setting->value);

                    }

                }
                }
                $i++;?>
                <button type="submit" class="btn btn-info m-t">Update</button>
            </form>
        </div>
        <?php
        }
        ?>


