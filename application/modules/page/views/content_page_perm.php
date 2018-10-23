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
            <div class="navbar-item pull-left h5" id="pageTitle">Manage Page Permissions</div>
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
                    <form data-ui-jp="parsley" id="form" method="post" action="<?php echo site_url('page/update_perm_content') ?>">
                        <div class="form-group">
                            <?php if($type == 'user'){ ?>
                                <label>Select Users</label>
                                <select multiple="multiple" name="users[]" class="form-control select2 select2-multiple">
                                    <?php foreach($users as $user){?>
                                    <option value="<?php echo $user->id?>" <?php if(in_array($user->id,$user_perms)){?> selected <?php }?>><?php echo $user->first_name.' '.$user->last_name?></option>
                                    <?php } ?>
                                </select>

                            <?php }else{?>
                                <label>Select User Groups</label>
                                <select multiple="multiple" name="groups[]" class="form-control select2 select2-multiple">
                                    <?php foreach($groups as $group){?>
                                        <option value="<?php echo $group->id?>" <?php if(in_array($group->id,$group_perms)){?> selected <?php }?>><?php echo $group->name?></option>
                                    <?php } ?>
                                </select>

                            <?php }?>
                            </div>


                            <input type="hidden" name="id" value="<?php echo $id?>">
                            <input type="hidden" name="type" value="<?php echo $type?>">
                            <div class="form-group">
                                <div class="text-center">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-primary center-block" type="submit">
                                        Finish
                                    </button>
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