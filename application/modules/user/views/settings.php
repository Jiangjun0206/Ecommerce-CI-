<!-- ############ LAYOUT START-->

<!-- aside -->
<?php
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
            <div class="navbar-item pull-left h5" id="pageTitle">User Settings</div>
            <!-- nabar right -->

            <!-- / navbar right -->
        </div>
    </div>

    <div class="app-body">

        <!-- ############ PAGE START-->

        <div class="app-body-inner">
            <div class="row-col">
                <div class="white bg b-b">
                    <!--<div class="navbar no-radius box-shadow-z1">
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
                        <!--<ul class="nav navbar-nav pull-right m-l">
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
                        <!-- link and dropdown
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <span class="navbar-item text-md">User Settings</span>
                            </li>

                        </ul>
                         link and dropdown
                    </div>-->
                </div>
                <div class="row-row">
                    <div class="row-col">


                        <?php echo $subnav;
                        $this->load->view('forms/settings_form');
                        ?>




                    </div>
                </div>
            </div>
        </div>



        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->


<!-- ############ LAYOUT END-->