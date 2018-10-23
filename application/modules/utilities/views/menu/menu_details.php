<?php
$CI =& get_instance();
$CI->load->library('menu');
?>

<div class="row-col white bg">
    <!-- flex content -->
    <div class="row-row">
        <div class="row-body scrollable hover">
            <div class="row-inner">
                <!-- content -->

                <?php

                if(is_array($menus)){?>
                    <div class="alert alert-info"><i class="fa fa-navicon"></i> Submenu</div>
                <div class="text-left">
                            <ul class="list-group m-b">
                                <?php foreach($menus as $menu){?>
                                <li href="#" class="list-group-item b-l-primary">
                                    <div class="pull-right dropdown">
                                        <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu pull-right text-color" role="menu">
                                            <?php
                                            if($menu->publish == 1)
                                                echo anchor('utilities/unpublish_sub_menu/'.$menu->id, '<i class="fa fa-minus-circle"></i>Unpublish Menu', 'class="dropdown-item"');
                                            else
                                                echo anchor('utilities/publish_sub_menu/'.$menu->id, '<i class="fa fa-minus-circle"></i>Publish Menu', 'class="dropdown-item"');
                                            ?>
                                            <?php echo anchor('utilities/edit_menu?mid='.$menu->id.'&ml=sub', '<i class="fa fa-edit"></i>Edit Menu', 'class="dropdown-item"') ?>
                                            <?php echo anchor('utilities/delete_menu/'.$menu->id.'/sub', '<i class="fa fa-trash"></i>Delete Menu', 'class="dropdown-item" onclick="if(!confirm(\'Are you sure you want to delete this menu? All related submenus will also be deleted.\')){ return false; }"') ?>
                                        </div>
                                    </div>
                                    <?php if($menu->publish == 0){?>
                                        <span class="nav-label">
                                            <b class="label warn rounded">Unpublished</b>
                                        </span>
                                    <?php }?>
                                    <b><?php echo $menu->name?></b>
                                </li>
                                <?php
                                if($CI->menu->has_children($menu->id)) {
                                    $children = $CI->menu->get_sub_nav($menu->id);
                                    foreach ($children as $child) { ?>
                                        <li href="#" class="list-group-item b-l-warning">
                                            <div class="pull-right dropdown">
                                                <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu pull-right text-color" role="menu">
                                                    <?php
                                                    if($child->publish == 1)
                                                        echo anchor('utilities/unpublish_sub_menu/'.$child->id, '<i class="fa fa-minus-circle"></i>Unpublish Menu', 'class="dropdown-item"');
                                                    else
                                                        echo anchor('utilities/publish_sub_menu/'.$child->id, '<i class="fa fa-minus-circle"></i>Publish Menu', 'class="dropdown-item"');
                                                    ?>
                                                    <?php echo anchor('utilities/edit_menu?mid='.$child->id.'&ml=sub', '<i class="fa fa-edit"></i>Edit Menu', 'class="dropdown-item"') ?>
                                                    <?php echo anchor('utilities/delete_menu/'.$child->id.'/sub', '<i class="fa fa-trash"></i>Delete Menu', 'class="dropdown-item" onclick="if(!confirm(\'Are you sure you want to delete this menu? All related submenus will also be deleted.\')){ return false; }"') ?>
                                                    </div>
                                                </div>
                                            <?php if($child->publish == 0){?>
                                                <span class="nav-label">
                                                    <b class="label warn rounded">Unpublished</b>
                                                </span>
                                            <?php }?>
                                            &emsp; <?php echo $child->name ?>
                                        </li>

                                    <?php }
                                }

                                }?>

                        </ul>

                </div>
                <?php }else{?>
                <div class="alert alert-info"><i class="fa fa-warning"></i> The are no submenus for this menu item.</div>
                <?php }?>
            </div>
            <div class="p-a-md animated fadeInUp">

            </div>
                <!-- / -->
        </div>
    </div>
</div>
</div>

