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
                                                            <div class="list" data-ui-list="b-r b-3x b-primary" data-ui-list-target="#detail" data-ui-list-target-class="show" id="user">

                                                                <?php
                                                                if(isset($msg))
                                                                    echo $msg;
                                                                foreach($users as $user){
                                                                    ?>


                                                                    <div class="list-item ">
                                                                        <div class="list-left">
										      			        <span class="w-40 avatar circle blue-grey">
										      			            <?php echo strtoupper ($this->aauth->get_user_name_initials($user->id)); ?> </span>
                                                                        </div>
                                                                        <div class="list-body">
                                                                            <div class="pull-right dropdown">
                                                                                <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
                                                                                <div class="dropdown-menu pull-right text-color" role="menu">
                                                                                    <?php echo anchor('user/user_permissions?uid='.$user->id, '<i class="fa fa-unlock-alt"></i>Manage Permissions', 'class="dropdown-item"') ?>

                                                                                    <?php
                                                                                    if($this->aauth->is_banned($user->id)) {
                                                                                        echo anchor('user/unban_user?uid=' . $user->id, '<i class="fa fa-ban"></i>Unban User', 'class="dropdown-item"');

                                                                                    }else{
                                                                                        echo anchor('user/ban_user?uid=' . $user->id, '<i class="fa fa-ban"></i>Ban User', 'class="dropdown-item"');

                                                                                    }
                                                                                    if($this->page_model->has_pages($user->id)){
                                                                                    ?>
                                                                                    <a class="dropdown-item" href="<?=site_url('page/admin/'.$user->id)?>">
                                                                                        <i class="fa fa-file-text-o"></i>
                                                                                        Show User Pages
                                                                                    </a>
                                                                                    <?php } ?>
                                                                                    <!-- <div class="dropdown-divider"></div>
                                                                                     <a class="dropdown-item">
                                                                                         <i class="fa fa-ellipsis-h"></i>
                                                                                         More action
                                                                                     </a>-->
                                                                                </div>
                                                                            </div>
                                                                            <div class="item-title"  id="<?php echo $user->id?>">
                                                                                <a href="#" class="_500" id="user_d">
                                                                                    <?php
                                                                                    if($this->aauth->is_banned($user->id)) {
                                                                                        ?>
                                                                                        <span class="nav-label">
                                                                                        <b class="label warn rounded">Banned</b>
                                                                                    </span>
                                                                                        <?php
                                                                                    }
                                                                                    echo ucwords($user->first_name." ".$user->last_name); ?></a>
                                                                            </div>
                                                                            <small class="block text-muted text-ellipsis">
                                                                                <?php echo $user->email?>
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


