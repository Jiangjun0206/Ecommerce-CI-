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
                <div class="navbar-item pull-left h5" id="pageTitle">Add Menu</div>
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
          <form data-ui-jp="parsley" id="form" method="post" action="<?php echo site_url('utilities/save_menu') ?>">
              <div>

                  <div>
                      <div class="form-group">
                          <label>Menu Name</label>
                          <input type="text" class="form-control" name="menu_name" required>
                      </div>
                      <div class="form-group">
                          <label>Menu Level</label>
                          <select name="level" class="form-control" required="">
                              <option value="">Select Menu Level</option>
                              <option value="main">Main Menu</option>
                                <option value="sub">Sub-Menu</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Menu Type</label>
                          <select name="type" class="form-control" required="">
                              <option value="">Select Menu Type</option>
                              <option value="page">Internal Page</option>
                              <option value="external">External Link</option>
                          </select>
                      </div>
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