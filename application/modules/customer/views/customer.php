 <?php echo $menu?>
  <style type="text/css">
  form.example input[type=text] {
    padding: 10px;
    font-size: 12px;
    border: 1px solid grey;
    float: left;
    width: 80%;
    background: #f1f1f1;
    border-radius:5px 0px 0px 5px;
}
.pro_head{
    background-color:white!impotant;
}
form.example button {
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 15px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
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
  </style>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Customers</div>
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                       <img src="<?php echo base_url(); ?>/images/a1.jpg" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                         <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">Sign out</a>
                    </div>
                  </li>
                </ul>

                 <br>
      <br>
      
      <div class="row" >
      
        <div class="col-md-12">
            <div class=row>
                <div class="col-md-1"></div>
                <div class="col-md-11">

                <h1>Manage Users</h1>
                   
                </div>
            </div>
           <hr>
           
            <div class="row" >
            <div class="col-md-7">
                <div class="form-group">
                </div>
            </div>
                <div class="col-md-5">
                    <div style="float:left">
                        <input type="text" class="form-control" placeholder="Search.." name="search2">
                    </div>
                    <div class="btn-group from-group" role="group" aria-label="Basic example">
                        
                        <button type="button" class="btn btn-default"><i class="fa fa-refresh"></i></button>
                        <button type="button" class="btn btn-default">pdf</button>
                        <button type="button" class="btn btn-default">csv</button>
                        <button type="button" class="btn btn-default">xls</button>
                    </div>
              
                </div>
            </div>
            <br>
           
        
            </div>
            
            <div class="row top-buffer">
            <div class="col-md-1">
                <div class="form-group">
                
                </div>
            </div>
            <div class="col-md-11">
               
                <table class="table table-striped table-responsive">
                    <thead>
                      
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Country</th>
                        <th>Email</th>
                        <th>Total Purchase</th>
                        <th>Other</th>
                        <th>Payed</th>
                        <th>Option</th>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
                </div>
            </div>
            
            </div>
                    
          </div>
    </div>
      <br>
      <br>
     
            
    
            

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