<!-- ############ LAYOUT START-->

<!-- aside -->
<?php echo $menu

?>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
        <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle">General Website Settings</div>

        </div>
    </div>
    <div class="app-footer white bg p-a b-t">
        <!--<div class="pull-right text-sm text-muted">Version 1.0.1</div>-->
        <span class="text-sm text-muted">&copy; Copyright.</span>
    </div>
    <div class="app-body">

        <!-- ############ PAGE START-->
        <div class="row-col">
            <div class="col-sm-3 col-lg-2 b-r">
                <div class="p-y">
                    <div class="nav-active-border left b-primary">

                    <?php $this->load->view('menu/settings') ?>

                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-lg-10 light bg">
                <div class="tab-content pos-rlt">

            <?php $this->load->view('forms/settings_form') ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- .modal -->
        <div id="modal" class="modal fade animate black-overlay" data-backdrop="false">
            <div class="row-col h-v">
                <div class="row-cell v-m">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content flip-y">
                            <div class="modal-body text-center">
                                <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
                                <p>Are you sure to delete your account?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn white p-x-md" data-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger p-x-md" data-dismiss="modal">Yes</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- / .modal -->

        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->



<!-- ############ LAYOUT END-->