<!DOCTYPE html>
<html lang="en" data-cookies-popup="true">
<head>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Title -->
    <title><?php echo $this->settings->get('website_name') ?></title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/themes/default/img/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/themes/default/img/favicon_60x60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/themes/default/img/favicon_76x76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url(); ?>assets/themes/default/img/favicon_120x120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url(); ?>assets/themes/default/img/favicon_152x152.png">

    <!-- Google Web Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/default/css/styles.css" />
    <?php
    if(isset($css) && !empty($css)){
        for ($i = 0; $i < count($css); $i++) {
            ?>
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/themes/<?php echo $css[$i]?>"></link>
        <?php }
    }
    ?>

    <!-- CSS Base -->
    <!--<link id="theme" rel="stylesheet" href="<?php /*echo base_url(); */?>assets/themes/default/css/themes/theme-classic.css" />-->

    {_styles}
    {_scripts}

</head>