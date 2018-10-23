  <?php echo $menu?>
      <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Manage Messages Templates</div>
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
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-2">
                  <p>Passwrod Reset Email</p>
              </div>
              <div class="col-md-8">
                <h5>Users Account Opening</h5>
                <hr>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                  <span>Subject</span><br><br><br>
                  <span>Email Body</span>
                </div>
                <div class="col-md-9">
                  <input type="text" placeholder="Account Opening" class="form-control"> <BR>
                  <textarea  name="description" id="summernote" class="form-control" cols="30" rows="50" style="height:100px" ></textarea><br>
                 <script>
                    $('#summernote').summernote({
                      placeholder: 'Input Messages',
                      tabsize: 2,
                      height: 300
                    });
                  </script>
                 <p style="color:red">**N.B: Do Not Change The Variables Like {{----}}</p>

                </div>
              </div>
              <div class="col-md-1"></div>
            </div>
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