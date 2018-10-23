<!-- ############ LAYOUT START-->

<!-- aside -->
<?php echo $menu

?>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
        <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle"><?=ucwords($user->first_name.' '.$user->last_name)?> Settings</div>

        </div>
    </div>
    <div class="app-footer white bg p-a b-t">
        <!--<div class="pull-right text-sm text-muted">Version 1.0.1</div>-->
        <span class="text-sm text-muted">&copy; Copyright.</span>
    </div>
    <div class="app-body">

        <!-- ############ PAGE START-->
        <div class="row-col">
            <div class="col-sm-3 col-lg-2 b-r">
                <div class="p-y">
                    <div class="nav-active-border left b-primary">

                    <?php //$this->load->view('menu/settings') ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-lg-10 light bg">
                <div class="tab-content pos-rlt">
                    <form data-ui-jp="parsley" id="form" method="post" action="<?php echo site_url('user/save_profile') ?>">
                        <?php if(isset($msg)){
                            echo $msg;
                        }?>
                        <div class="padding">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" name="fname" value="<?php echo $user->first_name?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" name="lname" value="<?php echo $user->last_name?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="padding">
                            <div class="box">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Current Password</label>
                                        <input type="password" class="form-control" name="cpassword" required>
                                    </div>

                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input type="password" class="form-control" name="npassword" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $user->id?>">
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-primary center-block" type="submit">
                                    Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                    <form data-ui-jp="parsley" id="fbanner_form" method="post" action="<?php echo site_url('user/save_fbanner_state') ?>">
                        <div class="padding">
                            <input type="checkbox" name="fbanner" onclick="submit();" <?php if ($_SESSION['is_disable_fbanner'] == 1) { echo "checked"; } ?> id="fbanner" style="margin:0px 10px 0 10px;position:relative;top:2px;" /> Disable footer banner
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

