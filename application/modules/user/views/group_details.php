<div class="row-col white bg">
    <!-- flex content -->
    <div class="row-row">
        <div class="row-body scrollable hover">
            <div class="row-inner">
                <!-- content -->
                <div class="p-a-lg text-center">
                    <!--<img src="<?php /*echo base_url(); */?>assets/themes/admin/images/a3.jpg" class="w circle animated rollIn" alt=".">-->
                    <div class="animated fadeInUp">
                        <div>
                            <span class="text-md m-t block"><?php echo $group->name ?></span>
                            <small class="text-muted"><?php echo $group->definition ?></small>
                        </div>
                    </div>
                </div>

                <!-- / -->
            </div>
        </div>
    </div>
    <!-- / -->

    <!-- footer -->
    <div class="p-a b-t clearfix">
        <div class="pull-right">
            <a href="#" class="btn btn-xs white rounded" id="DeleteGroup" rel="<?php echo $group->id?>">
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
                <?php echo form_open('user/edit_group'); ?>
                <div class="form-group row">
                    <label class="col-lg-2 form-control-label">Group Name:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="gname" value="<?php echo $group->name?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-2 form-control-label">Description:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="definition" value="<?php echo $group->definition?>" required>
                        <input type="hidden" class="form-control" name="id" value="<?php echo $group->id?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-8 offset-lg-2">
                        <button type="submit" class="btn primary btn-sm p-x-md">Save</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>