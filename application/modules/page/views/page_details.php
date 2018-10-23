<div class="row-col white bg">
    <!-- flex content -->
    <div class="row-row">
        <div class="row-body scrollable hover">
            <div class="row-inner">
                <!-- content -->
                <div class="p-a-lg">
                    <!--<img src="<?php /*echo base_url(); */?>assets/themes/admin/images/a3.jpg" class="w circle animated rollIn" alt=".">-->
                    <div class="animated fadeInUp">
                        <?php echo $content ?>

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
            <a href="<?php echo site_url('page/delete_page/'.$id.'/'.$user_id.'/'.$funnel_id ) ?>" class="btn btn-xs white rounded" onclick="if(!confirm('Are you sure you want to delete this page?')){ return false; }">
                <i class="fa fa-trash m-r-xs"></i>
                Delete
            </a>
        </div>
        <a href="<?php echo site_url('page/edit_page/'.$id.'/'.$user_id.'/'.$funnel_id.'/'.$type) ?>" class="btn btn-xs primary rounded">
				            <span class="">
				            	<i class="fa fa-pencil m-r-xs"></i>
				            	Edit
				            </span>
        </a>
    </div>
    <!-- / -->
</div>