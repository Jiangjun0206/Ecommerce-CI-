

    <!-- ############ LAYOUT START-->

    <!-- aside -->
    <?php
        echo $main_menu
    ?>
    <!-- / -->



    <!-- content -->
    <div id="content" class="app-content box-shadow-z2 pjax-container" role="main">
        <div class="app-header hidden-lg-up black lt b-b">
            <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                    <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Menu</div>
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

                            <ul class="nav navbar-nav">
                                <li class="nav-item">
                                    <span class="navbar-item text-md">Menu</span>
                                </li>
                                <li class="nav-item">
                                <?php echo anchor('utilities/add_menu', ' <span class=""><i class="fa fa-fw fa-plus"></i><span class="hidden-sm-down">Add Menu</span></span>','class="nav-link text-muted"') ?>
                                </li>
                            </ul>
                            <!-- / link and dropdown -->
                        </div>
                    </div>
                    <div class="row-row">
                        <div class="row-col">
                            <?=isset($subnav) ? $subnav : "";

                            $this->load->view('menu_content');
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
</div>

