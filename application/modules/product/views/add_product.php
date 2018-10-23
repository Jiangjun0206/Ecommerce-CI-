  <?php echo $menu?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <style type="text/css">

  .form-control, .thumbnail {
    border-radius: 2px;
}
.btn-danger {
    background-color: #B73333;
}

/* File Upload */
.fake-shadow {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload #logo-id {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 33px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.img-preview {
    max-width: 100%;
}


  	.mt-lg {
  		margin-top: 50px;
  	}
  	.mb-lg {

  		margin-bottom: 50px;

  	}

  	h1 {
	margin: 0px 0px 0px 0px;
	font-size: 28px;
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
                   <!-- <div class="navbar-item pull-left h5" id="pageTitle">Product Page</div> -->
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                  <li class="nav-item dropdown">
                    <a class="nav-link clear" data-toggle="dropdown">
                      <span class="avatar w-32">
                        <img src="<?php echo base_url()?>/images/a1.jpg" class="w-full rounded" alt="...">
                      </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale pull-right">
                         <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">Sign out</a>
                    </div>
                  </li>
                </ul><br>
                    <br>
                 <div class="col-md-11 offset-md-1"><h2>Add a New Item</h2>
                    <hr></div>

                  
                  <div class="row" >
      
                    

                               
                    <form action="product/insert_product" method="post" enctype="multipart/form-data">
                             

                      <div class="row">
                        <div class="col-md-1">
                          <div class="form-group">
                          </div>
                        </div>
                         <div class="col-md-3">
                            <div class="form-group">
                                  <div class="form-group">
                                          <div class="main-img-preview">
                                            <img class="thumbnail img-preview" src="<?php echo base_url(); ?>/assets/img/thumbnail.png" title="Preview Logo">
                                          </div>
                                          <div class="input-group">
                                            <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                                            <div class="input-group-btn">
                                              <div class=" fileUpload btn btn-danger fake-shadow">
                                                <span><i class="glyphicon glyphicon-upload"></i> Select</span>
                                                <input id="logo-id" name="product_image" type="file" class="attachment_upload">
                                              </div>
                                            </div>
                                          </div>
                                          <p class="help-block">* Upload your Product Thumbnail.</p>
                                        </div>
                                          <script>
                                              $(document).ready(function() {
                                                var brand = document.getElementById('logo-id');
                                                brand.className = 'attachment_upload';
                                                brand.onchange = function() {
                                                    document.getElementById('fakeUploadLogo').value = this.value.substring(12);
                                                };

                                                // Source: http://stackoverflow.com/a/4459419/6396981
                                                function readURL(input) {
                                                    if (input.files && input.files[0]) {
                                                        var reader = new FileReader();
                                                        
                                                        reader.onload = function(e) {
                                                            $('.img-preview').attr('src', e.target.result);
                                                        };
                                                        reader.readAsDataURL(input.files[0]);
                                                    }
                                                }
                                                $("#logo-id").change(function() {
                                                    readURL(this);
                                                });
                                            });

                                              </script>
                            </div>
                         </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="moving_from">Name</label>
                            <input id="moving_from" name="name" type="text" placeholder="Input Item title" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="moving_from">Real Price</label>
                            <input id="moving_from" name="real_price" type="number" step="1" placeholder="Input Price" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="Number de Containers">Price X2 </label>
                            <input id="Number of Containers" name="price_x" type="text" placeholder="Input Price X2" class="form-control" required>
                          
                          </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="moving_to">Tag</label>
                            <input id="moving_to" name="tag" type="text" placeholder="Input Item Tag" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="moving_to">Deal Price</label>
                            <input id="moving_to" name="deal_price" type="number" step="1" placeholder="Input Price" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Sizes</label>
                              <input id="company" name="size" type="text" placeholder="Input Sizes" class="form-control" required>
                              <label class="control-label">*Separate by a comma</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                          <div class="form-group">
                            <label class="control-label" for="moving_to">Category</label>
                            <input id="moving_to" name="category" type="text" placeholder="Input Item Category" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label" for="contact_person">Discout</label>
                            <input id="contact_person" name="discount" type="text" placeholder="Input Discount" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Color</label>
                              <input id="company" name="color" type="text" placeholder="Color" class="form-control" required>
                            <label class="control-label">*Separate by a comma</label>       
                            </div>
                        </div>
                      </div>
                      
                      
                              
                      <div class="row top-buffer">
                         <div class="col-md-1">
                          <div class="form-group">

                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="form-group">
                            <label class="control-label" for="phone">Description</label>
                            <textarea name="description" class="form-control" style="height:120px"></textarea>
                            
                          </div>
                        </div>
   
                    </div>
                    	<div class="row top-buffer">
                        <div class="col-lg-1">
                        </div>
                        <div class="col-lg-8 col-lg-offset-6">
                          <div class="form-group">
                            <input type="submit" value="Insert New Product" id="submit" name="submit" class="btn btn-primary col-lg-3">
                          </div>
                        </div>
                      </div>
                    </form>
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