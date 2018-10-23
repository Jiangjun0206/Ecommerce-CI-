  <?php echo $menu?>
  <style type="text/css">
  	.mt-lg {
  		margin-top: 50px;
  	}
  	.mb-lg {

  		margin-bottom: 50px;

  	}

  	h1 {
	margin: 0px 0px 0px 0px;
	font-size: 18px;
  	}

  	h5 {

  		margin-top: 30px;

  	}

  	.p-lg {
	padding: 0px 50px 0px 50px;
	font-size: 18px;
	font-family: "Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
  	}
  </style>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Manage Payment Methods & Shipment</div>
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                        <img src="<?php echo base_url();?>images/a0.jpg" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                         <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">Sign out</a>
                    </div>
                  </li>
                </ul>
          </div>
          <br>
          <br>
        <h3 class="text-center">Payment Methods Settings</h3>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
            <h5>PayPal Settings</h5><hr>
            <span>Paypal Email</span><input type="text" class="form-control">
            <span>Paypal Account Type</span>
                <select class="form-control" name="" id="">
                  <option value="">Sandbox</option>
                  <option value="">Original</option>
                </select>
            </div>
  
             
            <div class="col-md-5">
                 <h5>Stripe Settings</h5><hr>
            <span>Stripe Secret Key</span><input type="text" class="form-control">
            <span>Stripe Publish Key</span>
                <select class="form-control" name="" id="">
                  <option value="">Sandbox</option>
                  <option value="">Original</option>
                </select>
            </div>
            <div class="col-md-1"></div>
          </div>
        </div>
        <div class="row">
          <br>
          <br>
        </div>
          <br>
          <br>
            <br>


    </div>
    <div class="app-footer white bg p-a b-t">
      <div class="pull-right text-sm text-muted">Version 1.0.1</div>
      <span class="text-sm text-muted"><a href="https://jvz3.com/c/1017817/304293" style="color: #070707">&copy;</a> Copyright.</span>
    </div>
    <div class="app-body">
    </div>
  </div>








<!-- ############ LAYOUT END-->