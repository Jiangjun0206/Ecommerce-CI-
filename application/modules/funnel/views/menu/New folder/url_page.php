<!-- aside -->
<?php
echo $main_menu;
$CI =& get_instance();
$CI->load->library('menu');
?>
<!-- / -->

<!-- content -->
<div id="content" class="app-content box-shadow-z2 bg pjax-container" role="main">
    <div class="app-header white bg b-b">
        <div class="navbar" data-pjax>
            <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
                <i class="ion-navicon"></i>
            </a>
            <div class="navbar-item pull-left h5" id="pageTitle">Add Menu</div>
            <!-- nabar right -->
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item dropdown pos-stc-xs">
                    <a class="nav-link" data-toggle="dropdown">
                        <i class="ion-android-search w-24"></i>
                    </a>
                    <div class="dropdown-menu text-color w-md animated fadeInUp pull-right">
                        <!-- search form -->
                        <form class="navbar-form form-inline navbar-item m-a-0 p-x v-m" role="search">
                            <div class="form-group l-h m-a-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search projects...">
                            <span class="input-group-btn">
                              <button type="submit" class="btn white b-a no-shadow"><i class="fa fa-search"></i></button>
                            </span>
                                </div>
                            </div>
                        </form>
                        <!-- / search form -->
                    </div>
                </li>

            </ul>
            <!-- / navbar right -->
        </div>
    </div>
    <div class="app-footer white bg p-a b-t">
        <span class="text-sm text-muted">&copy; Copyright.</span>
    </div>
    <div class="app-body">

        <!-- ############ PAGE START-->
        <div class="padding">

            <div class="box">
                <div class="box-body">
                    <form data-ui-jp="parsley" id="form" method="post" action="<?php echo site_url('utilities/update_url') ?>">
                        <div>

                            <div>
                                    <?php
                                    if($level == "sub"){
                                        ?>
                                        <div class="form-group">
                                            <label>Parent Menu</label>
                                            <select name="parent" class="form-control select2 select2-hidden-accessible" data-ui-jp="select2" data-ui-options="{theme: 'bootstrap'}" tabindex="-1" aria-hidden="true">
                                                <option value="main">Select Parent Menu</option>
                                                <?php foreach($menus as $menu) { ?>
                                                    <option
                                                        value="<?php echo 'main_'.$menu->id ?>"><b><?php echo $menu->name ?></b></option>
                                                    <?php
                                                    if($main2sub <= 0) {
                                                        if ($CI->menu->has_submenu($menu->id)) {
                                                            $children = $CI->menu->get_sub_menu($menu->id);
                                                            foreach ($children as $child) { ?>
                                                                <option
                                                                    value="<?php echo 'sub_' . $child->id ?>"><?php echo '&rsaquo;  ' . $child->name ?></option>
                                                            <?php }
                                                        }
                                                    }
                                                }?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="level" value="<?php echo $level?>">
                                        <?php
                                    }
                                    if($type == "external"){
                                        ?>
                                    <div class="form-group">
                                        <label>External Url</label>
                                        <?php if($level == 'main'){

                                            $url = $CI->menu->get_main_menu_url($id);
                                        ?>
                                        <input type="text" class="form-control" name="url" <?php if($url != '#'){?> value = "<?php echo $url?>" <?php }?> required>
                                        <?php }else{
                                        $url = $CI->menu->get_sub_menu_url($id);
                                        ?>
                                            <input type="text" class="form-control" name="url" <?php if(!$url != '#'){?> value = "<?php echo $url?>" <?php }?> required>
                                        <?php } ?>
                                    </div>
                                    <?php }else {
                                        if ($level == 'main') {
                                            $url = $CI->menu->get_main_menu_url($id);
                                        } else {
                                            $url = $CI->menu->get_sub_menu_url($id);
                                        }
                                        $page_id = "";
                                        if ($url != '#')
                                            $page_id = explode('/', $url)[2];

                                        ?>
                                    <div class="form-group">
                                        <label>Pages</label>
                                        <select name="page" class="form-control">
                                            <?php foreach($pages as $page){?>
                                            <option value="<?php echo $page->id ?>" <?php if($page_id == $page->id){?> selected = "selected" <?php }?>><?php echo $page->title ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php }?>
                                    <input type="hidden" name="id" value="<?php echo $id?>">
                                    <input type="hidden" name="type" value="<?php echo $type?>">
                                    <input type="hidden" name="level" value="<?php echo $level?>">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block" type="submit">
                                                Finish
                                            </button>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->



<!-- ############ LAYOUT END-->