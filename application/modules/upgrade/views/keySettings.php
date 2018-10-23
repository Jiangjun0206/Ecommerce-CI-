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
            <div class="navbar-item pull-left h5" id="pageTitle">Upgrade By Key</div>

        </div>
    </div>
    <div class="app-footer white bg p-a b-t">
        <!--<div class="pull-right text-sm text-muted">Version 1.0.1</div>-->
        <span class="text-sm text-muted">&copy; Copyright.</span>
    </div>
    <div class="app-body">

        <!-- ############ PAGE START-->
        <div class="row-col">
            <div class="col-sm-9 col-lg-10 light bg">
                <div class="tab-content pos-rlt">

            <?php $this->load->view('forms/key_form') ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->



<!-- ############ LAYOUT END-->