<!-- ############ LAYOUT START-->

<!-- aside -->
<?php echo $menu

?>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z2 pjax-container" role="main">

    <div class="app-header hidden-lg-up black lt b-b">
        <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle">Contact</div>

        </div>
    </div>

    <div class="app-body">

        <!-- ############ PAGE START-->

        <div class="app-body-inner">
            <div class="row-col">
                <div class="white bg b-b">
                    <div class="navbar no-radius box-shadow-z1">
                        <a data-toggle="modal" data-target="#subnav" data-ui-modal class="navbar-item pull-left hidden-lg-up">
					<span class="btn btn-sm btn-icon info">
			      		<i class="fa fa-th"></i>
			        </span>
                        </a>

                        <!-- nabar right -->
                       <!-- <ul class="nav navbar-nav pull-right m-l">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-muted" href="#" data-toggle="dropdown">
                                    <i class="fa fa-ellipsis-h"></i>
                                </a>
                                <div class="dropdown-menu pull-right text-color" role="menu">
                                    <a class="dropdown-item">
                                        <i class="fa fa-tag"></i>
                                        Tag item
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="fa fa-pencil"></i>
                                        Edit item
                                    </a>
                                    <a class="dropdown-item">
                                        <i class="fa fa-trash"></i>
                                        Delete item
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">
                                        <i class="fa fa-ellipsis-h"></i>
                                        More action
                                    </a>
                                </div>
                            </li>
                        </ul>-->
                        <!-- / navbar right -->
                        <!-- link and dropdown -->
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <span class="navbar-item text-md"><?php echo $group?> Group Permissions</span>
                            </li>

                        </ul>
                        <!-- / link and dropdown -->
                    </div>
                </div>
                <div class="row-row">
                    <div class="row-col">


                        <?php echo $subnav?>



                        <div class="col-xs " >
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
                                                            <form action="<?php echo site_url('user/change_group_permissions') ?>" method="POST">
                                                                <input name="controller_id" type="hidden" value="<?php
                                                                $controller_id = $this->input->get('cont');
                                                                if($controller_id > 0){
                                                                    $controller_id = $this->input->get('cont');
                                                                }else{
                                                                    $controller_id = 1;
                                                                }
                                                                echo  $controller_id?>">
                                                                <div class="list col-xs box" data-ui-list="b-r b-3x b-primary"  id="group">

                                                                    <?php
                                                                    foreach($methods as $method){
                                                                        ?>

                                                                        <div class="list-item">
                                                                            <div class="list-left">
										      			        <span class="w-40 avatar circle blue-grey">
										      			            <i class="material-icons md-24" style="position: relative; width: auto; height: auto; background: none; border: none;">https</i>
										      			        </span>
                                                                            </div>
                                                                            <div class="list-body">
                                                                                <div class="pull-right dropdown">
                                                                                    <div class="form-group row">
                                                                                        <div class="col-sm-10">

                                                                                            <label class="ui-switch data-ui-switch-md info m-t-xs">
                                                                                                <?php if ($controller->group_has_access($method->id,$group_id)){?>
                                                                                                    <input name="perms[]" type="checkbox" value="<?php echo $method->id ?>" checked>
                                                                                                    <?php
                                                                                                }else{?>
                                                                                                    <input name="perms[]" type="checkbox" value="<?php echo $method->id ?>" unchecked>
                                                                                                <?php }?>



                                                                                                <i></i>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="item-title"  id="<?php echo $method->id?>">
                                                                                    <a href="#" class="_500" id="user_d"><?php echo $method->name ?></a>
                                                                                </div>
                                                                                <small class="block text-muted text-ellipsis">
                                                                                    <?php echo $method->description?>
                                                                                </small>
                                                                            </div>
                                                                        </div>





                                                                    <?php }?>
                                                                    <input type="hidden" name="group_id" value="<?php echo $group_id?>">
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
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>

                                </div>
                                <!-- / -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->


<!-- ############ LAYOUT END-->