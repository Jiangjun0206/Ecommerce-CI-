 <?php echo $menu?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                <div class="navbar-item pull-left h5" id="pageTitle">Sales</div>
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
        <div class="navbar" data-pjax>
            <div class="row" >
        
                <div class="col-md-12">
                    <div class="col-md-1"></div>
                    <div class="col-md-11"><h1>Manage Sale </h1><hr></div>    
                    <div class="row" >
                        <div class="col-md-7"></div>
                        <div class="col-md-5">
                        <div style="float:left">
                            <input type="text" class="form-control" placeholder="Search.." name="search2">
                        </div>
                        <div class="btn-group from-group" role="group" aria-label="Basic example"> 
                            <button type="button" class="btn btn-default" onclick='window.location.reload();'><i class="fa fa-refresh"></i> </button>
                            <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>sale/generate_pdf'">pdf</button>
                            <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>sale/exportCSV'">csv</button>
                            <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>sale/generate_xlsx_report'">xls</button>
                        </div>
                    </div>
                    </div><br>
                </div>
                        
                        <div class="row top-buffer">
                        <div class="col-md-1">
                            <div class="form-group">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <table class="table table-responsive">
                                <thead>
                                    <th>No</th>
                                    <th>Sale Code</th>
                                    <th>Buyer</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Delivery status</th>
                                    <th>Payment Status</th>
                                    <th>Option</th>
                                </thead>
                                <tbody>

                               <?php 
                                $i = 0;
                               foreach ($sale as $sl) {
                                  $i++;    
                                   ?>
                                  <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $sl->sale_code; ?></td>
                                    <td><?php echo $sl->username; ?></td>

                                    <td>

                                      <?php
                                          $date = date_create();

                                          date_timestamp_set($date, $sl->sale_datetime);
                                          echo date_format($date, ' m-d-Y');
                                          ?>
                                     </td>
                                    <td>$<?php echo $sl->grand_total; ?></td>
                                    <!-- <td><?php echo $sl->delivery_status; ?></td> -->
                                    <td><span class="bg-danger">Admin : pending</span></td>
                                     <!-- <td><?php echo $sl->payment_status; ?></td> -->
                                      <td><span class="bg-danger">Admin : due</span></td>
                                     <td>
                                      <a class="btn btn-danger btn-sm" href="<?php echo base_url('sale/delete_sale/'.$sl->sale_id);?>"><i class="fa fa-trush"></i>Delete</a>
                                    </td>
                                  </tr>
                                 <?php  } ?>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                            <br>
                             <p><?php echo $links; ?></p>
                            </div>
                        </div>
                        </div>
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