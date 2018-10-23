<!-- aside -->
<?php
echo $main_menu
?>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
        <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle">Page Permissions</div>
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
                    <form data-ui-jp="parsley" id="form" method="post" action="<?php echo site_url('page/save_page_perm') ?>">
                        <div>

                            <div>
                                <div class="form-group">
                                    <label>Page Permission Type</label>
                                    <select name="type" class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" tabindex="-1" aria-hidden="true">
                                        <option value="">Select Permission Type</option>
                                        <option value="user">User Based Permission</option>
                                        <option value="group">Group Based Permission</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id?>">
                                <div class="form-group">
                                    <div class="text-center">
                                        <button class="btn btn-primary center-block" type="submit">
                                            Next Step...
                                        </button>
                                    </div>
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