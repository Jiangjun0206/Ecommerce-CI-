 <?php echo $menu?>
 <style type="text/css">
     th,td{
        text-align: center!important;
        padding-left:50px!important;
        padding-right:30px!important;
     }
 </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Discount Coupon</div>
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
                </ul><br><br>     
                <div class="row">
                    <div class="col-md-12">
                        <div class=row>
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                            <h1>Manage Cooupo</h1>   
                            </div>
                        </div><hr>
                        <div class="row">
                        <div class="col-md-3 offset-md-9">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_coupon"><i class="fa fa-plus-circle"></i>&nbsp;<span>Create Coupon</span></button>
                        </div>
                        </div>   
                        <br>
                        <div class="row" >
                        <div class="col-md-7">
                            <div class="form-group">
                            </div>
                        </div>
                            <div class="col-md-5">
                                <div style="float:left">
                                    <input type="text" class="form-control" placeholder="Search.." name="search_text" id="search_text">
                                </div>
                                <div class="btn-group from-group" role="group" aria-label="Basic example">
                                    
                                   <button type="button" class="btn btn-default" onclick='window.location.reload();'><i class="fa fa-refresh"></i> </button>
                                    <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>discount/generate_pdf'">pdf</button>
                                    <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>discount/exportCSV'">csv</button>
                                    <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>discount/generate_xlsx_report'">xls</button>
                                </div>
                            </div>
                        </div><br>
                        </div>
                        <div class="row top-buffer">
                            <div class="col-md-1"></div>
                            <div class="col-md-10" id="result">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>       
        </div>
    </div>
    <script>
        $(document).ready(function(){

         load_data();

         function load_data(query)
         {
          $.ajax({
           url:"<?php echo base_url(); ?>discount/fetch",
           method:"POST",
           data:{query:query},
           success:function(data){
            $('#result').html(data);
           }
          })
         }

         $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
           load_data(search);
          }
          else
          {
           load_data();
          }
         });
        });
        </script>
        <!-- add coupon modal -->
    <div class="modal fade" id="add_coupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <label>Add Coupon</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-right">
                        <label for="recipient-name" class="col-form-label">Coupon Title</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="recipient-name" name="coupon_title" placeholder="Title">
                </div>
                </div>  
                <br>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-right">
                        <label for="recipient-name" class="col-form-label">Valid Till</label>
                    </div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" id="valid_till" name="valid_till" >
                    </div>
                </div>  
                <br>
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-right">
                        <label for="recipient-name" class="col-form-label">Coupon Discount On</label>
                    </div>
                    <div class="col-md-6">
                        <select name="coupon_discount" class="form-control" id="coupon_discount">
                            <option value="">Choose one</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                </div>  
                <br>
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-right">
                        <label for="recipient-name" class="col-form-label">Coupon Code</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="recipient-name" name="coupon_code" placeholder="Code">
                    </div>
                </div> 
                <br>
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-right">
                        <label for="recipient-name" class="col-form-label">Discount Type</label>
                    </div>
                    <div class="col-md-6">
                        <select name="discount_type" class="form-control" id="discount_type">
                            <option value="">Percent</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div> 

                    </div>  
                    <br>
                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-right">
                        <label for="recipient-name" class="col-form-label">Discount Value</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="discount_value" name="discount_value" placeholder="Discount Value">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="color:white;background-color:#d63fef;border-color:#d63fef" data-dismiss="modal">Save</button>
                <button type="button" class="btn" style="color:white;background-color:black;border-color:black">Cancel</button>
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