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
                                                            <div class="list" data-ui-list="b-r b-3x b-primary" data-ui-list-target="#detail" data-ui-list-target-class="show" id="menu">

                                                                <?php
                                                                $i = 0;
                                                                foreach($menus as $menu){
                                                                    ?>


                                                                    <div class="list-item ">
                                                                        <div class="list-body">
                                                                            <div class="pull-right dropdown">
                                                                                <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
                                                                                <div class="dropdown-menu pull-right text-color" role="menu">
                                                                                    <?php
                                                                                    if($menu->publish == 1)
                                                                                        echo anchor('utilities/unpublish_menu/'.$menu->id, '<i class="fa fa-minus-circle"></i>Unpublish Menu', 'class="dropdown-item"');
                                                                                    else
                                                                                        echo anchor('utilities/publish_menu/'.$menu->id, '<i class="fa fa-minus-circle"></i>Publish Menu', 'class="dropdown-item"');
                                                                                        ?>
                                                                                    <?php echo anchor('utilities/edit_menu?mid='.$menu->id.'&ml=main', '<i class="fa fa-edit"></i>Edit Menu', 'class="dropdown-item"') ?>
                                                                                    <?php echo anchor('utilities/menuReorder?mid='.$menu->id.'&ml=main', '<i class="fa fa-sort"></i>Reorder Menu', 'class="dropdown-item"') ?>
                                                                                    <?php echo anchor('utilities/delete_menu/'.$menu->id.'/main', '<i class="fa fa-trash"></i>Delete Menu', 'class="dropdown-item" onclick="if(!confirm(\'Are you sure you want to delete this menu? All related submenus will also be deleted.\')){ return false; }"') ?>
                                                                                </div>
                                                                            </div>
                                                                            <?php if($menu->publish == 0){?>
                                                                            <span class="nav-label">
                                                                                <b class="label warn rounded">Unpublished</b>
                                                                            </span>
                                                                            <?php }?>
                                                                            <div class="item-title"  id="<?php echo $menu->id?>">
                                                                                <a href="#" class="_500" id="user_d">
                                                                                        <?php
                                                                                    echo ucwords($menu->name); ?></a>
                                                                            </div>
                                                                            <small class="block text-muted text-ellipsis">
                                                                                <?php echo $menu->url?>
                                                                            </small>

                                                                        </div>
                                                                    </div>

                                                                <?php }?>
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

                        </div>


