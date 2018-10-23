
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
                                                            <div class="list" data-ui-list="b-r b-3x b-primary" data-ui-list-target="#detail" data-ui-list-target-class="show" id="group">

                                                                <?php
                                                                foreach($groups as $group){
                                                                    ?>


                                                                    <div class="list-item">
                                                                        <div class="list-left">
										      			        <span class="w-40 avatar circle blue-grey">
										      			            <i class="fa fa-group" style="position: inherit; width: inherit; height: 0px; border: none; background: none;"></i>
										      			        </span>
                                                                        </div>
                                                                        <div class="list-body">
                                                                            <div class="pull-right dropdown">
                                                                                <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
                                                                                <div class="dropdown-menu pull-right text-color" role="menu">
                                                                                    <?php echo anchor('user/group_permissions?gid='.$group->id, '<i class="fa fa-unlock-alt"></i>Manage Permissions', 'class="dropdown-item"') ?>
                                                                                    <?php //echo anchor('user/ban_group?gid='.$group->id, '<i class="fa fa-ban"></i>Ban Group', 'class="dropdown-item"') ?>

                                                                                   <!-- <a class="dropdown-item">
                                                                                        <i class="fa fa-trash"></i>
                                                                                        Delete item
                                                                                    </a>
                                                                                    <div class="dropdown-divider"></div>
                                                                                    <a class="dropdown-item">
                                                                                        <i class="fa fa-ellipsis-h"></i>
                                                                                        More action
                                                                                    </a>-->
                                                                                </div>
                                                                            </div>
                                                                            <div class="item-title"  id="<?php echo $group->id?>">
                                                                                <a href="#" class="_500" id="user_d"><?php echo $group->name ?></a>
                                                                            </div>
                                                                            <small class="block text-muted text-ellipsis">
                                                                                <?php echo $group->definition?>
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
                                    </div>
                                </div>
                                <!-- / -->
                            </div>
                        </div>
                        <div class="col-xs hidden-lg-up" id="detail">

                        </div>


