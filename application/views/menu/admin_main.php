<?php
?>
<style>

#aside {
    width:235px;
    margin-right:10px;
}
.pos-rlt{
    left:15px;
}
.pull-left{
    margin-left:30px;
}
.submenu{
    right:25px;
}
#content{
    /* margin-left: 15.5rem; */
}
.app-body-inner{
    /* margin-left: 15px; */
    padding-left:20px;
}
.row-inner{
    padding-left:25px;
}
.arrow {
    float: right;
    /* line-height: 1.42857; */
  
    bottom:30px;
}
#mainnav-menu{
    width:230px;
}
.glyphicon.arrow:before {
    content: "\e080";
}
.active > a > .glyphicon.arrow:before {
    content: "\e114";
}
.fa.arrow:before {
    content: "\f105";
}
.active > a > .fa.arrow:before {
    content: "\f107";
}
</style> 
<div id="aside" class="app-aside fade nav-dropdown black">
    <!-- fluid app aside -->
    <div class="navside dk" data-layout="column">
        <div class="navbar no-radius">
            <!-- brand -->
            <a href="<?php echo site_url('dashboard') ?>" class="navbar-brand">
                <span class="hidden-folded inline"><?php echo $this->settings->get('website_name') ?></span>
            </a>
            <!-- / brand -->
        </div>
        <div data-flex class="hide-scroll">
            <nav class="scroll nav-stacked nav-stacked-rounded nav-color">

                <ul class="nav list-group" data-ui-nav id="mainnav-menu">
                    <li class="nav-header hidden-folded">
                        <span class="text-xs">Main</span>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('dashboard') ?>" class="b-danger">
                  <span class="nav-icon text-white no-fade">
                    <i class="ion-filing"></i>
                  </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    
                    <?php
                    if($this->aauth->is_user_allowed('user/user_list')){
                        ?>
                    
                    <li>
                        <a class="b-default" href="<?php echo site_url('user/user_list') ?>">
                  <span class="nav-icon">
                    <i class="ion-person"></i>
                  </span>
                            <span class="nav-text">Users</span>
                        </a>
                    </li>
                    <?php }
                    if($this->aauth->is_user_allowed('utilities/menu_list')){
                        ?>
                    <li>
                        <a class="b-default" href="<?php echo site_url('utilities/menu_list') ?>">
                  <span class="nav-icon">
                    <i class="ion-navicon-round"></i>
                  </span>
                            <span class="nav-text">Menu</span>
                        </a>
                    </li>
                    <?php }
                    if($this->aauth->is_user_allowed('page/admin')){
                        ?>
                    <li>
                        <a class="b-default" href="<?php echo site_url('funnel/funnel_list') ?>">
                  <span class="nav-icon">
                    <i class="ion-ios-copy-outline"></i>
                  </span>
                            <span class="nav-text">Create a funnel</span>
                        </a>
                    </li>
					<?php }
                    if($this->aauth->is_user_allowed('page/admin')){
                        if (($_SESSION['id'] != '2' && $_SESSION['funnel_ready'] == '1') ||  $_SESSION['id'] == '2') {
                        ?>
                    <li>
                        <a class="b-default" href="<?php echo site_url('funnel/funnel_list_ready') ?>">
                  <span class="nav-icon">
                    <i class="ion-ios-copy-outline"></i>
                  </span>
                            <span class="nav-text">Funnels&nbsp;<i style="color:#ffffff;">Done for you</i></span>
                        </a>
                    </li>

					<?php }}
                    if($this->aauth->is_user_allowed('page/admin')){
                        if (($_SESSION['id'] != '2' && $_SESSION['funnel_club'] == '1') ||  $_SESSION['id'] == '2') {
                        ?>
                   
                    <li>
                        <a class="b-default" href="<?php echo site_url('funnel/funnel_club') ?>">
                  <span class="nav-icon">
                    <i class="ion-ios-copy-outline"></i>
                  </span>
                            <span class="nav-text">Funnel Club</span>
                        </a>
                    </li>


					<?php }}
                    if($this->aauth->is_user_allowed('page/admin') && ($_SESSION['id'] != '2')){
                        ?>
                   
                    <li>
                        <a class="b-default" href="<?php echo site_url('upgrade/key_setting') ?>">
                  <span class="nav-icon">
                    <i class="ion-ios-copy-outline"></i>
                  </span>
                            <span class="nav-text">Upgrade</span>
                        </a>
                    </li> 

                    <?php }
                    
                    if($this->aauth->is_user_allowed('page/admin')&&($_SESSION['id'] !='2')){
                        ?>
                    <!-- product module begin -->
                    <li>
                        <a data-toggle="collapse" href="#products">
                            <span class="nav-icon">
                                <i class="icon ion-ios-cart-outline"></i>                          
                            </span>
                            <span class="nav-text">Products</span>
                           <i class="fa arrow" style=""></i>
                        </a>

                        <ul class="collapse" id="products">
                            <li class="submenu">
                                <a href="<?php echo base_url('product'); ?>" class="auto">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Products Lists</span>
                                </a>
                            </li>                     
                            <li class="submenu">
                                <a href="<?php echo base_url('product/add_product'); ?>" class="auto">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Add Product</span>
                                </a>
                            </li>
                        </ul> 
                    </li>
                    <?php }

                    if($this->aauth->is_user_allowed('page/admin')&&($_SESSION['id'] !='2')){
                        ?>
                        <!-- sales module begin -->
                    <li>
                        <a href="<?php echo base_url('sale'); ?>" class="auto">
                            <span class="nav-icon">
                                <i class="fa fa-dollar"></i>
                            </span>
                            <span class="nav-text">Sales</span>
                        
                        </a>
                    </li>
                    <?php }

                    if($this->aauth->is_user_allowed('page/admin')&&($_SESSION['id'] !='2')){
                        ?>
                        <!-- Discount Coupon mudule begin -->
                    <li>
                        <a href="<?php echo base_url('discount'); ?>" class="auto">
                            <span class="nav-icon">
                                <i class="icon ion-ios-pricetags-outline"></i>
                            </span>
                            <span class="nav-text">Discount Coupon</span>
                            
                        </a>
                    </li>
                    <?php }

                    if($this->aauth->is_user_allowed('page/admin')&&($_SESSION['id'] !='2')){
                        ?>
                    <li>
                        <!-- customers module begin -->
                        <a href="<?php echo base_url('customer'); ?>" class="auto">
                            <span class="nav-icon">
                                <i class="icon ion-ios-person-outline"></i>
                            </span>
                            <span class="nav-text">Customers</span>
                        </a>
                    </li>
                    <?php }

                    if($this->aauth->is_user_allowed('page/admin')&&($_SESSION['id'] !='2')){
                        ?>
                        <!-- message module begin -->
                    <li>
                        <a data-toggle="collapse" href="#messages">
                            <span class="nav-icon">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                            <span class="nav-text">Messaging</span>
                            <i class="fa arrow" style=""></i>
                        </a>
                        <ul class="collapse" id="messages">
                            <li class="submenu">
                                <a href="<?php echo base_url('message/send_message'); ?>">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Send Message</span>
                                </a>
                            </li>                     
                            <li class="submenu">
                                <a href="<?php echo base_url('message/message_templates'); ?>">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Messages Templates</span>
                                
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }

                    if($this->aauth->is_user_allowed('page/admin')&&($_SESSION['id'] !='2')){
                        ?>
                    <li>
                        <a data-toggle="collapse" href="#business_settings">
                            <span class="nav-icon">
                                <i class="icon ion-ios-briefcase-outline"></i>
                            </span>
                            <span class="nav-text">Business Settings</span>
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="collapse" id="business_settings">
                            <li class="submenu">
                                <a href="<?php echo base_url('business/payment_settings'); ?>" class="auto">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Payment Settings</span>
                                </a>
                            </li>
                            <li class="submenu">
                                <a href="<?php echo base_url('business/currency'); ?>" class="auto">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Currency</span>
                                </a>
                            </li>
                            <li class="submenu">
                                <a href="<?php echo base_url('business/term_conditions'); ?>" class="auto">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Terms & Conditions</span>
                                </a>
                            </li>                     
                            <li class="submenu">
                                <a href="<?php echo base_url('business/privacy'); ?>" class="auto">
                                <i class="fa fa-list"></i>&nbsp;
                                <span class="font-bold">Privacy Policy</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php }



                    if($this->aauth->is_user_allowed('dashboard/gen_settings')){
                        ?>
                    <li>
                        <a class="b-default" href="<?php echo site_url('dashboard/gen_settings') ?>">
                              <span class="nav-icon">
                                <i class="ion-settings"></i>
                              </span>
                            <span class="nav-text">Settings</span>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </nav>
        </div>
        <div data-flex-no-shrink>
            <div class="nav-fold dropup">
                <a data-toggle="dropdown">
                    <div class="pull-left">
                        <div class="inline"><span class="avatar w-40 grey"><?php echo $initials?></span></div>
                        <img src="<?php echo base_url();?>images/a1.jpg" alt="..." class="w-40 img-circle hide">
                    </div>
                    <div class="clear hidden-folded p-x">
                        <span class="block _500 text-muted"><?php echo $fname." ".$lname?> </span>
                        <div class="progress-xxs m-y-sm lt progress">
                            <div class="progress-bar info" style="width: 15%;">
                            </div>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu w dropdown-menu-scale ">
                    <a class="dropdown-item" href="<?php echo site_url('user/profile') ?>">Profile</a>
                    <a class="dropdown-item" href="<?php echo site_url('user/logout') ?>">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / -->

<script type="text/javascript">
    var site_url = '<?php echo site_url(); ?>';
</script>