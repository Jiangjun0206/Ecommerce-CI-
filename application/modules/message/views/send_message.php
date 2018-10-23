  <?php echo $menu?>
     
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>
 
  <style type="text/css"> -->
  	.mt-lg {
  		margin-top: 50px;
  	}
  	.mb-lg {

  		margin-bottom: 50px;
      
  	}
  .note-editable{
    height:150px;
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
                <div class="navbar-item pull-left h5" id="pageTitle">Message</div>
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                        <img src="<?php echo base_url();?>images/a1.jpg" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                         <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">Sign out</a>
                    </div>
                  </li>
                </ul><br><br>
               <br>
             
                    <div class="col-md-11 offset-md-1"><h4>Send Newsletter</h4>
                    <hr></div>
         
      
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 form-group">
                  <label class="form-label">E-mails(subscribers)</label>
                  <input type="text" class="form-control" placeholder="E-mails(subscribers)" name="subscribers">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 form-group">
                  <label class="form-label">From: Email Address</label>
                  <input type="text" class="form-control" placeholder="From: Email Address" name="sender">
                  </div>
                </div>
    

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 form-group">
                  <label class="form-label">Newsletter Subject</label>
                  <input type="text" class="form-control" placeholder="Newsletter Subject" name="subject">
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10 form-group">
                  <label class="form-label">Newsletter Content</label>
                  <textarea name="description" id="summernote" class="form-control" cols="30" rows="50" style="height:100px" ></textarea>
                  </div>
                </div>
                <div class="row" >
                <div class="col-md-11 text-right">
                  <button class="btn btn-primary">Send</button>
                </div>
                <div class="col-md-1"></div>
                  
                </div>
                <script>
                  $('#summernote').summernote({
                    placeholder: 'Input Messages Description',
                    tabsize: 2,
                    height: 200
                  });
                </script>

          </div>
    </div>
    <div class="app-footer white bg p-a b-t " >
      <div class="pull-right text-sm text-muted">Version 1.0.1</div>
      <span class="text-sm text-muted "><a href="https://jvz3.com/c/1017817/304293" style="color: #070707">&copy;</a> Copyright.</span>
    </div>
    <div class="app-body">
    </div>
  </div>








<!-- ############ LAYOUT END-->