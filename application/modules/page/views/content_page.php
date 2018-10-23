<!-- aside -->
<?php
echo $main_menu;
$CI =& get_instance();
$CI->load->library('menu');
?>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
        <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle">Add Page</div>
            <!-- nabar right -->
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link" data-toggle="dropdown">
                        <i class="ion-android-search w-24"></i>
                    </a>
                    <div class="dropdown-menu text-color w-md animated fadeInUp pull-right">
                        <!-- search form -->
                        <form class="navbar-form form-inline navbar-item m-a-0 p-x v-m" role="search">
                            <div class="form-group l-h m-a-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search projects...">
                            <span class="input-group-btn">
                              <button type="submit" class="btn white b-a no-shadow"><i class="fa fa-search"></i></button>
                            </span>
                                </div>
                            </div>
                        </form>
                        <!-- / search form -->
                    </div>
                </li>
                <!--
                <li class="nav-item dropdown">
                  <a class="nav-link clear" data-toggle="dropdown">
                    <span class="avatar w-32">
                      <img src="images/a3.jpg" class="w-full rounded" alt="...">
                    </span>
                  </a>
                  <div class="dropdown-menu w dropdown-menu-scale pull-right">
                    <a class="dropdown-item" href="profile.html">
                      <span>Profile</span>
                    </a>
                    <a class="dropdown-item" href="setting.html">
                      <span>Settings</span>
                    </a>
                    <a class="dropdown-item" href="app.inbox.html">
                      <span>Inbox</span>
                    </a>
                    <a class="dropdown-item" href="app.message.html">
                      <span>Message</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="docs.html">
  Need help?
                    </a>
                    <a class="dropdown-item" href="signin.html">Sign out</a>
                  </div>
                </li>-->
            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer white bg p-a b-t">
        <span class="text-sm text-muted">&copy; Copyright.</span>
    </div>
    <div class="app-body">

        <!-- ############ PAGE START-->
        <div class="padding">

            <div class="box">
                <div class="box-body">
                    <form data-ui-jp="parsley" id="form" method="post" action="<?php echo site_url('page/update_content') ?>">
                        <div>

                            <?php if($type == 'content'){?>
                            <div class="form-group">
                                <label>Page Content</label>
                                <textarea class="input-block-level" id="summernote" name="content" rows="18">
                                    <?php echo $content?>
                                </textarea>
                            </div>
                            <?php }else{?>

                                <div class="form-group">
                                    <label>Plugins</label>
                                    <select name="plugin" class="form-control select2 select2-hidden-accessible" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" tabindex="-1" aria-hidden="true">
                                        <option value="">Select Plugin</option>
                                        <?php foreach($plugins as $plugin){?>
                                            <option value="<?php echo $plugin->id ?>" <?php if($plugin_id == $plugin->id){?>selected = "selected"<?php }?>><?php echo $plugin->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                            <?php }?>


                                <input type="hidden" name="id" value="<?php echo $id?>">
                                <input type="hidden" name="type" value="<?php echo $type?>">
                                <input type="hidden" name="edit" value="<?php echo $edit?>">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block" type="submit">
                                            Finish
                                        </button>
                                    </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->



<!-- ############ LAYOUT END-->