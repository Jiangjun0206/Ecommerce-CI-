<!-- aside -->
<?php
$CI =& get_instance();
$CI->load->library('aauth');
echo $main_menu;
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
            <div class="alert alert-info"><i class="fa fa-warning"></i> If no users and user groups are assigned to access this page then the page is public hence anyone can access.
            </div>

            <div class="col-sm-6">
                <div class="box">
                    <div class="box-header">
                        <h2>User Permissions</h2>
                        <small>
                            Shows the users who are permitted to view this page in the front end.
                        </small>
                    </div>
                    <table class="table table-striped b-t">

                        <?php
                        if(is_array($users)){?>
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($users as $user){?>
                            <tr>
                                <td><?php echo $this->aauth->get_user_first_name($user->user_id)?></td>
                                <td><?php echo $this->aauth->get_user_last_name($user->user_id)?></td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan="2" class="text-right"> <a class="btn btn-xs primary rounded" href="<?php echo site_url('page/content_page_perm/'.$page_id.'/user')?>">
                                        <i class="fa fa-pencil m-r-xs"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>

                        <?php }else{?>
                        <tr>
                            <td colspan="2">The are no users assigned to exclusively access this page. </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-right"> <a class="btn btn-xs primary rounded" href="<?php echo site_url('page/content_page_perm/'.$page_id.'/user')?>">
                                    <i class="fa fa-plus m-r-xs"></i>
                                    Add
                                </a>
                            </td>
                        </tr>
                        <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="box">
                    <div class="box-header">
                        <h2>User Group Permissions</h2>
                        <small>
                            Shows the user groups that are allowed to access this page in the front end.
                        </small>
                    </div>
                    <table class="table table-striped b-t">

                        <?php
                        if(is_array($groups)){?>
                        <thead>
                        <tr>
                            <th>User Group Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach($groups as $group){?>
                                <tr>
                                    <td><?php echo $this->aauth->get_group_name($group->group_id)?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="text-right"> <a class="btn btn-xs primary rounded" href="<?php echo site_url('page/content_page_perm/'.$page_id.'/group')?>">
                                        <i class="fa fa-pencil m-r-xs"></i>
                                        Edit
                                    </a>
                                </td>
                            </tr>

                        <?php }else{?>
                            <tr>
                                <td>The are no user groups assigned to exclusively access this page. </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"> <a class="btn btn-xs primary rounded" href="<?php echo site_url('page/content_page_perm/'.$page_id.'/group')?>">
                                        <i class="fa fa-plus m-r-xs"></i>
                                        Add
                                    </a>
                                </td>
                            </tr>
                        <?php }?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        </div>






<!--            <div class="box">
                <div class="box-body">
                    haha
                </div>



            </div>

        </div>-->

        <!-- ############ PAGE END-->

    </div>
</div>
<!-- / -->



<!-- ############ LAYOUT END-->