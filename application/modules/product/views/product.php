  <?php echo $menu?>
  <style>
.table > thead > tr > th ,td {
       padding: 5px 24px!important;
  }
  </style>
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>

  <!-- content -->
  <div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
          <div class="navbar" data-pjax>
                <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                  <i class="ion-navicon"></i>
                </a>
                <div class="navbar-item pull-left h5" id="pageTitle">Product Lists</div>
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
                <!-- product code -->
                 <div class="navbar" data-pjax>
              
                  <div class="row" >
      
                    <div class="col-md-12">
                      <div class="col-md-1"></div>
                      <div class="col-md-11">

                       <h5><i class="icon ion-ios-cart-outline"></i>&nbsp;Items&nbsp;&nbsp;<span  class="badge">
                       <?php echo $count; ?>
                       </span> </h5>
                       <span>Manage your store inventory: product information, Product categories, product options, attributes, images, tax, shipping and more.</span>
                        <hr>
                      </div>
                            
                      <div class="row" >
                        <div class="col-md-9">
                          
                        </div>
                         <div class="col-md-3">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-default" onclick='window.location.reload();'><i class="fa fa-refresh"></i></button>
                                <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>product/generate_pdf'">pdf</button>
                                <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>product/generate_xlsx_report'">xls</button>
                                <button type="button" class="btn btn-default" onclick="location.href='<?php echo base_url()?>product/exportCSV'">csv</button>
                            </div>
                         </div>
                      </div>
                      <br>
                      <div class="row" style="padding-top:15px; border-radius:0.8em; ">
                        <div class="col-md-1" style="background-color:white">

                              
                        </div>
                        <div class="col-md-2" style="">
                          <div class="form-group">
                                <button type="button" class="btn btn-danger delete_product"><i class="fa fa-trash"></i> Delete Selected</button>
                              
                        </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                          </div>
                        </div>
                        <div class="col-md-3" >
                       <div class="input-group" >
                          <input type="text" class="form-control" placeholder="Type Keywords" name="search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                          </div>
                        </div>
                        
                           
             
                   
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                             <a href="<?php echo base_url();?>product/add_product" class="btn btn-success"><i class="fa fa-plus-circle"></i>  Insert New item</a>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row top-buffer">
                       <div class="col-md-1">
                          <div class="form-group">
                           
                          </div>
                        </div>
                        <div class="col-md-11">
                                <table class="table table-responsive">
                                    <thead>
                                        <th><input type="checkbox" class="form-control check" id="check_head"></th>
                                        <th><span><i class="fa fa-file-picture-o"></i></span></th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Real Price</th>
                                        <th>Deal Price</th>
                                        <th>Discount</th>
                                        <th>Price X2</th>
                                        <th>Sizes</th>
                                        <th>Color</th>
                                        <th>Action</th>
                                    </thead>

                                    <tbody>
                                    <?php foreach ($product as $pro) {
                                      # code...
                                   ?>
                                      <tr>
                                      <td><input name="checkbox[]" value="<?php echo $pro->product_id; ?>" type="checkbox" class="form-control check" ></td>
                                      <td><img width="30px" height="30px" src="<?php echo base_url();?>/uploads/product_image/<?php echo $pro->image;?>" alt=""></td>
                                      <td><?php echo $pro->name; ?></td>
                                      <td><?php echo $pro->category; ?></td>
                                      <td><?php echo $pro->real_price; ?></td>
                                      <td><?php echo $pro->deal_price; ?></td>
                                      <td><?php echo $pro->discount; ?></td>
                                      <td><?php echo $pro->price_x; ?></td>
                                      <td><?php echo $pro->size; ?></td>
                                      <td><?php echo $pro->color; ?></td>
                                      <td><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_product"><i class="fa fa-wrench "></i> Edit Details</button></td>
                                  
                                      </tr>
                                      <?php  } ?>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                        </div>
                      
                      </div>
                              
                     
                      <div class="row top-buffer">
                        <div class="col-lg-1">

                        </div>
                        <div class="col-lg-8 col-lg-offset-6">
                          <div class="form-group">
                             <button type="button" class="btn btn-success">Update Items</button>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
          </div>
    </div>
    <script>
      $(document).ready(function() {

      //   $("#check_head").click(function() {
      //     if(!$("#check_head").is(":checked") == true){
      //       $(".check").each(function() {
      //       $(this).removeAttr("checked");
      //       });
      //     }else{ 
      //       $(".check").each(function() {
      //       $(this).attr("checked", true);
      //       });
      // }
 
      // });
      	$("#check_head").click(function(){
            var chk = $(this).is(":checked");//.attr('checked');
            if(chk) $(".check").prop('checked', true);
            else  $(".check").prop('checked', false);
        });
      });

      $('.delete_product').on('click', function(e) {
 
            var allVals = [];  
            $(".check:checked").each(function() {  
                allVals.push($(this).attr('value'));
            });  
 
            if(allVals.length <=0)  
            {  
                alert("Please select row.");  
            }  else {  
 
                var check = confirm("Are you sure you want to delete this row?");  
                if(check == true){  
 
                    var join_selected_values = allVals.join(","); 
 
                    $.ajax({
                        url: 'product/delete_product',
                        type: 'POST',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          $(".check:checked").each(function() {  
                              $(this).parents("tr").remove();
                          });
                          alert("Item Deleted successfully.");
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
 
                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }  
            }  
        });

    </script>
   
    <div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div class="app-footer white bg p-a b-t-0">
      <div class="pull-right text-sm text-muted">Version 1.0.1</div>
      <span class="text-sm text-muted"><a href="https://jvz3.com/c/1017817/304293" style="color: #070707">&copy;</a> Copyright.</span>
    </div>
    <div class="app-body">
    </div>
  </div>








<!-- ############ LAYOUT END-->