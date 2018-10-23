<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo $this->settings->get('website_name') ?></title>
    <meta name="description" content="Responsive, Bootstrap, BS4" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/themes/admin/images/logo.png">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="<?php echo base_url(); ?>assets/themes/admin/images/logo.png">

    <!-- style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/animate.css/animate.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/glyphicons/glyphicons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/material-design-icons/material-design-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/ionicons/css/ionicons.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

    <!-- build:css css/styles/app.min.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/styles/app.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/styles/style.css" type="text/css" />
    <!-- endbuild -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/css/styles/font.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/libs/parsleyjs/dist/parsley.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/libs/summernote/dist/summernote.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/libs/select2/dist/css/select2.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/libs/select2-bootstrap-theme/dist/select2-bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/libs/select2-bootstrap-theme/dist/select2-bootstrap.4.css" type="text/css" />



    <script>
        var asset_url = "<?php echo base_url();?>assets/";
        var admin_asset_url = "<?php echo base_url();?>assets/themes/admin/";
        var base_url = "<?php echo base_url();?>";
    </script>    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/admin/libs/fileuploader/jquery.fileuploader.css" type="text/css" />

    <!-- AngularJs -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular-route.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
    {_styles}
    {_scripts}


</head>
<body>

<div class="app" id="app">

    {content}

</div>

<!-- build:js scripts/app.min.js -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/tether/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/PACE/pace.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/jquery-pjax/jquery.pjax.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/jscroll/jquery.jscroll.min.js"></script>
<?php
if(isset($jsinc) && !empty($jsinc)){
    for ($i = 0; $i < count($jsinc); $i++) {
    ?>
        <script src="<?php echo base_url(); ?>assets/js/<?php echo $jsinc[$i]?>"></script>
    <?php }
}
?>

<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/config.lazyload.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/parsleyjs/dist/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/summernote/dist/summernote.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/select2/dist/js/select2.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/libs/fileuploader/jquery.fileuploader.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-load.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-jp.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-include.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-device.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-form.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-modal.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-nav.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-list.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-screenfull.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-scroll-to.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-toggle-class.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ui-taburl.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/app.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/admin/scripts/ajax.js"></script>
<script type="text/javascript">
    var error = '<?php if(isset($_SESSION['error'])) { echo $_SESSION['error']; } ?>';
    $(function(){
        if (error) {
            alert(error);
        }
    });
</script>

<!-- endbuild -->
</body>
</html>
