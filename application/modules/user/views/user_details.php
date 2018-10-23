<div class="row-col white bg">
    <!-- flex content -->
    <div class="row-row">
        <div class="row-body scrollable hover">
            <div class="row-inner">
                <!-- content -->
                <div class="p-a-lg text-center">
<!--                    <img src="<?php /*echo base_url(); */?>assets/themes/admin/images/a3.jpg" class="w circle animated rollIn" alt=".">
-->                    <div class="animated fadeInUp">
                        <div>
                            <span class="text-md m-t block"><?php echo $user->first_name." ".$user->last_name ?></span>
                            <small class="text-muted">User Group: <?php echo $user_group->name?></small>
                        </div>
                        <div class="block clearfix m-t">
                            <a href="" class="btn btn-icon btn-social rounded indigo">
                                <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="" class="btn btn-icon btn-social rounded light-blue">
                                <i class="fa fa-twitter"></i>
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="" class="btn btn-icon btn-social rounded red">
                                <i class="fa fa-google-plus"></i>
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-a-md animated fadeInUp">
                    <ul class="nav">
                       <!-- <li class="nav-item m-b-xs">
                            <a class="nav-link text-muted block">
								                	<span class="pull-right text-sm">
								                		<i class="fa fa-fw fa-map-marker"></i>
								                	</span>
                                <span>Paris</span>
                            </a>
                        </li>
                        <li class="nav-item m-b-xs">
                            <a class="nav-link text-muted block">
								                	<span class="pull-right text-sm">
								                		<i class="fa fa-fw fa-phone"></i>
								                	</span>
                                <span>123-456-789</span>
                            </a>
                        </li>
                        <li class="nav-item m-b-xs">
                            <a class="nav-link text-muted block">
								                	<span class="pull-right text-sm">
								                		<i class="fa fa-fw fa-birthday-cake"></i>
								                	</span>
                                <span>July 03</span>
                            </a>
                        </li>-->
                        <li class="nav-item m-b-xs">
                            <a class="nav-link text-muted block">
								                	<span class="pull-right text-sm">
								                		<i class="fa fa-fw fa-envelope"></i>
								                	</span>
                                <span><?php echo $user->email ?></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- / -->
            </div>
        </div>
    </div>
    <!-- / -->

    <!-- footer -->
    <div class="p-a b-t clearfix">
        <div class="pull-right">
            <a href="#" class="btn btn-xs white rounded" id="DeleteUser" rel="<?php echo $user->id?>">
                <i class="fa fa-trash m-r-xs"></i>
                Delete
            </a>
        </div>
            <a class="btn btn-xs primary rounded" data-toggle="modal" data-target="#modal-edit" title="Reply">
				            <span class="">
				            	<i class="fa fa-pencil m-r-xs"></i>
				            	Edit
				            </span>
            </a>
    </div>
    <!-- / -->
</div>

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header _600">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                Edit User
            </div>
            <div class="modal-body">

                <?php echo form_open('user/edit_user'); ?>
                    <div class="form-group row">
                        <label class="col-lg-2 form-control-label">First Name:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="fname" value="<?php echo $user->first_name?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 form-control-label">Last Name:</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="lname" value="<?php echo $user->last_name?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 form-control-label">Email:</label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control" name="email" value="<?php echo $user->email?>" required>
                            <input type="hidden" class="form-control" name="id" value="<?php echo $user->id?>">
                        </div>
                    </div>
                <div class="form-group row">
                    <label for="single" class="col-lg-2 form-control-label">User Group</label>
                    <div class="col-lg-8">
                        <select id="single" class="form-control select2" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" name="group">
                            <?php foreach($groups as $group){?>
                                <option value="<?php echo $group->id?>"
                                    <?php
                                    if($group_id == $group->id){
                                    ?> selected = "selected" <?php } ?> > <?php echo $group->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                    <div class="form-group row">
                        <div class="col-lg-8 offset-lg-2">
                            <button type="submit" class="btn primary btn-sm p-x-md"  ng-disabled="adduserform.$invalid">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>