  <?php echo $menu?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Terms and Conditions</div>
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                        <img src="../images/a1.jpg" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                         <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">Sign out</a>
                    </div>
                  </li>
                </ul>
                <br>
                <br>
                <div class="col-md-12">
              
                  <!-- <div class="col-md-1"></div> -->
                  <div class="col-md-12">
                     <textarea name="term" id="summernote" class="form-control" cols="30" rows="50" style="height:100px" ></textarea>
                  </div>
                </div>
                <div class="row" >
                  <div class="col-md-11 text-right">
                    <button class="btn btn-primary">Save  </button>
                  </div>
                  <div class="col-md-1"></div>
                  
                </div>
                <script>
                  $('#summernote').summernote({
                    placeholder: 'Terms and Conditions',
                    tabsize: 2,
                    height: 480
                  });
                </script>
              </div>

         
      

    </div>
    <div class="app-footer white bg p-a b-t">
      <div class="pull-right text-sm text-muted">Version 1.0.1</div>
      <span class="text-sm text-muted"><a href="https://jvz3.com/c/1017817/304293" style="color: #070707">&copy;</a> Copyright.</span>
    </div>
    <div class="app-body">
    </div>
  </div>








<!-- ############ LAYOUT END-->