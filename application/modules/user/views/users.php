

    <!-- ############ LAYOUT START-->

    <!-- aside -->
    <?php
    if($set_menu > 0)
        echo $menu;
    ?>
    <!-- / -->



    <!-- content -->
    <div id="content" class="app-content box-shadow-z2 pjax-container" role="main">
        <div class="app-header hidden-lg-up black lt b-b">
            <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                    <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Users</div>
                <!-- nabar right -->

                <!-- / navbar right -->
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
                            <a data-toggle="modal" data-target="#list" data-ui-modal class="navbar-item pull-left hidden-md-up">
			    	<span class="btn btn-sm btn-icon white">
			      		<i class="fa fa-list"></i>
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
                                            Tag itemgg
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
                                    <span class="navbar-item text-md">Users</span>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-muted" data-toggle="modal" data-target="#modal-new" title="Reply">
				            <span class="">
				            	<i class="fa fa-fw fa-plus"></i>
				            	<span class="hidden-sm-down">Add User</span>
				            </span>
                                    </a>
                                </li>
                            </ul>
                            <!-- / link and dropdown -->
                            <!-- Search Form -->
                            <form class="search-form pull-right form-group" action="<?php echo base_url(); ?>user/user_list" method="POST" style="padding: 8px 10px 0px 0px;margin-bottom: 0px;">
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="search" name="search" value="<?php if(isset($_SESSION['search'])) { echo $_SESSION['search']; } ?>">
                                </div>
                                <div class="col-sm-4">
                                    <input type="submit" class="form-control btn btn-info" id="btn_search" value="Search">
                                </div>
                            </form>
                            <!-- / Search Form -->
                        </div>
                    </div>
                    <div class="row-row">
                        <div class="row-col">
                            <?php echo $subnav;

                            $this->load->view('user_content');
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-new"  ng-app="GymApp">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header _600">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Add User
                        </div>
                        <div class="modal-body">
                            <form ng-controller="UserController" ng-submit="submitForm" role="form" method="post" name="adduserform">
                                <div class="form-group row">
                                    <label class="col-lg-2 form-control-label">First Name:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" ng-model="fname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 form-control-label">Last Name:</label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" ng-model="lname" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 form-control-label">Email:</label>
                                    <div class="col-lg-8">
                                        <input type="email" class="form-control" ng-model="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <button type="submit" class="btn primary btn-sm p-x-md"  ng-click="adduser()" ng-disabled="adduserform.$invalid">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ############ PAGE END-->

        </div>
    </div>
    <!-- / -->


    <!-- ############ LAYOUT END-->
</div>

