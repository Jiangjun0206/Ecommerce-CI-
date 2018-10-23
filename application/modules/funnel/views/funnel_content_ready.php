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
                                                            <div class="list" data-ui-list="b-r b-3x b-primary"  data-ui-list-target-class="show" id="funnel_ready">

                                                                <?php
                                                                $i = 0;
                                                                
                                                                if($funnels) { 
                                                                foreach($funnels as $funnel){
                                                                    ?>


                                                                    <div class="list-item ">
                                                                        <div class="list-body">
                                                                           <div class="pull-right dropdown">
                                                                                <a href="#" data-toggle="dropdown" class="text-muted"><i class="fa fa-fw fa-ellipsis-v"></i></a>
                                                                                <div class="dropdown-menu pull-right text-color" role="menu">
                                                                                    <?php echo anchor('funnel/edit_funnel?id='.$funnel->id, '<i class="fa fa-edit"></i>Edit Funnel name', 'class="dropdown-item"') ?>
                                                                                    <?php echo anchor('funnel/delete_page/'.$funnel->id, '<i class="fa fa-trash"></i>Delete Funnel', 'class="dropdown-item" onclick="if(!confirm(\'Are you sure you want to delete this menu? All related submenus will also be deleted.\')){ return false; }"') ?>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" value="<?php echo $user_id;?>" id="funnel_user_id" />
                                                                            <div class="item-title"  id="<?php echo $funnel->id?>">
                                                                                <a href="#" class="_500" id="user_d">
                                                                                        <?php
                                                                                    echo ucwords($funnel->funnel_name); ?></a>
                                                                            </div>
                                                                         

                                                                        </div>
                                                                    </div>

                                                                <?php }}?>
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


