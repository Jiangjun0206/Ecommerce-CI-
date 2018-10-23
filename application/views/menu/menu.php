<!-- Header -->
<!-- Top Bar -->
<div id="top-bar">
    <div class="container">
        <div class="module left">
            <!--<ul class="list-inline">
                <li><i class="i-before ti-email text-primary"></i>hello@example.com</li>
                <li><i class="i-before ti-mobile text-primary"></i>+48 22 212-32-21</li>
            </ul>-->
        </div>
        <div class="module right">
            <?php if($this->aauth->is_loggedin()){?>
                <a href="<?php echo site_url("user/front_logout/")?>"> <span class="text-muted mr-20">Logout</span> </a>
            <?php }else{?>
                <a href="<?php echo site_url("page/admin/")?>"> <span class="text-muted mr-20">Log in</span> </a>
                <a href="<?php echo site_url("user/register/")?>"> <span class="text-muted mr-20">Register</span> </a>
            <?php }?>
            <!--<a href="#" class="icon icon-xs icon-facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="icon icon-xs icon-twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="icon icon-xs icon-google-plus"><i class="fa fa-google-plus"></i></a>-->
        </div>
    </div>
</div>
<header id="header" class="fullwidth light">


    <!-- Navigation Bar -->
    <div id="nav-bar">

        <!-- Logo -->
        <a class="logo-wrapper" href="<?php echo site_url()?>">
            <h4><b><?php echo $this->settings->get('website_name') ?></b></h4>
        </a>

        <nav class="module-group right">

            <!-- Primary Menu -->
            <div class="module menu left">
                <ul id="nav-primary" class="nav nav-primary">
                    <?php echo $menu;?>
                </ul>
            </div>

        </nav>

        <!-- Menu Toggle -->
        <div class="menu-toggle">
            <a href="#" data-toggle="mobile-menu" class="mobile-trigger"><span><span></span></span></a>
        </div>

    </div>

    <!-- Notification Bar -->
    <div id="notification-bar"></div>

    <!-- Search Bar -->
    <div id="search-bar">
        <form id="search-form">
            <input class="search-bar-input" type="text" placeholder="Search...">
            <button class="search-bar-submit"><i class="ti-search"></i></button>
        </form>
        <a href="#" class="search-bar-close" data-toggle="search-bar"><i class="ti-close"></i></a>
    </div>

</header>
<!-- Header / End -->

