  <?php echo $menu?>
  <style type="text/css">

}
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
    #content{
      margin-left:14.5rem;
    }

    @media screen and (max-width:992px){
      #content{
        margin-left:0;
      }
    }
   
  </style>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main" >
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Currency</div>
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
              <br>
              <br>

              
            <h5 class="text-center">Currency Settings</h5>
          <hr>
            <div class="text-center">   <h4>Home Default Currency</h4>  
     
            <div class="row">
                    <div class="col-md-12 text-center">
                    </div>        
                    <div class="col-md-12" style="padding:0">    
                        <div class="col-md-2"></div>
                        <div class="col-md-2" style="padding-top:10px">
                          <h6>Home Default Currency</h6>  
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="home_currency" id="home_currency">
                            <option value="">Us. Dollar</option>
                          </select> 
                        </div>
                        <div class="col-md-1">
                              <button class="btn btn-success"><i class=" fa fa-upload"></i> Save</button>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>     
            </div>  
    
            
            <hr>
            <div class="text-center">   <h4>System Default Currency</h4>  
     
            <div class="row">
                    <div class="col-md-12 text-center">
                    </div>        
                    <div class="col-md-12" style="padding:0">    
                        <div class="col-md-2"></div>
                        <div class="col-md-2" style="padding-top:70px">
                          <h6>System Default Currency</h6>  
                        </div>
                        <div class="col-md-5">
                            <p>**Changing System Default Currency require changing all Product Price & 
                            Vendor Package Price Values</p>
                            <select class="form-control" name="system_currency" id="home_currency">
                            <option value="">Us. Dollar</option>
                          </select> 
                        </div>
                        <div class="col-md-1"  style="padding-top:58px">
                              <button class="btn btn-success"><i class=" fa fa-upload"></i> Save</button>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>     
            </div>  
       
            
            <hr>
            <div class="text-center">   <h4>Set Currency Formats</h4>  
     
            <div class="row">
                    <div class="col-md-12 text-center">
                    </div>        
                    <div class="col-md-12" style="padding:0">    
                        <div class="col-md-2"></div>
                        <div class="col-md-2" style="padding-top:10px">
                          <h6>Currency Format</h6>  
                   
                          <br>
                           <h6 style="padding-top:15px">Symbol Format</h6>  
                          <br>
                     

                            <h6 style="padding-top:15px">No Of Decimals</h6>  
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="home_currency" id="home_currency">
                            <option value="">US Format - 1,234,567,89</option></select><br>
                            <select class="form-control" name="home_currency" id="home_currency">
                            <option value="">{{Symbol}} {{Amount}}</option>
                            <option value="">{{Amount}} {{Symbol}}</option>
                            </select><br>
                            <select class="form-control" name="home_currency" id="home_currency">
                            <option value="">123 45</option></select>
                        </div>
                        <div class="col-md-1" style="padding-top:120px">
                              <button class="btn btn-success"><i class=" fa fa-upload"></i> Save</button>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>  
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