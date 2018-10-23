<?php //die ('controller ->'.$controller.' method->'.$method);
if(!isset($user_id))
    $user_id = $this->input->get('uid');
?>
<div class="col-xs w modal fade aside aside-md b-r" id="subnav">
    <div class="row-col light bg">
        <!-- flex content -->
        <div class="row-row">
            <div class="row-body scrollable hover">
                <div class="row-inner">
                    <!-- content -->
                    <div class="navside m-t">
                        <nav class="nav-border b-primary">
                            <ul class="nav">
                              <!--  <li class="active">-->

                              <!--      <?php echo anchor('user/user_list', '<span class="nav-label">-->
									                    	<!--<b class="label warn rounded">'.$no_of_users.'</b>-->
                              <!--      </span><span class="nav-text">All Users</span>', 'class="link-class"') ?>-->

                              <!--  </li>-->
                              
                                <li class="active">

                                    <a data-href="<?php echo base_url(); ?>user/user_list" class="link-class" onclick="user_list('<?php echo base_url('user/user_list'); ?>')"><span class="nav-label">
                                                            <b class="label warn rounded"><?php echo $no_of_users; ?></b>
                                    </span><span class="nav-text">All Users</span></a>
                                </li>
                              
                                <li class="">
                                    <?php echo anchor('user/user_groups', '<span class="nav-label">
									                    	<b class="label primary rounded">'.$no_of_groups.'</b>
									                  	</span><span class="nav-text">User Groups</span>', 'class="link-class"') ?>
                                </li>
                                <li class="">
                                    <?php echo anchor('user/settings', '<span class="nav-text">Settings</span>', 'class="link-class"') ?>
                                </li>


                                <?php

                                if($controller == 'user' && $method=='settings') { ?>
                                    <li class="nav-header hidden-folded m-t">
                                        <span class="block p-t b-t text-sm text-muted _600">Settings Categories</span>
                                    </li>
                                    <?php
                                    $i = 1;
                                    foreach ($subgroups as $subgroup) {

                                        if (strlen($subgroup->subgroup) < 1) {
                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link block active" href="#" data-toggle="tab"
                                                   data-target="#tab-1">General</a>
                                            </li>
                                            <?php
                                        } else {

                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link block" href="#" data-toggle="tab"
                                                   data-target="#tab-<?php echo $i ?>"><?php echo ucfirst($subgroup->subgroup) ?></a>
                                            </li>
                                            <?php
                                        }
                                        $i++;
                                    }
                                }
                                ?>

                                <?php

                                if($method == 'group_permissions' ||  $method=='user_permissions' || $method =='change_user_permissions') { ?>
                                    <li class="nav-header hidden-folded m-t">
                                        <span class="block p-t b-t text-sm text-muted _600">Permissions Categories</span>
                                    </li>
                                    <?php
                                    foreach ($controllers as $controller) {

                                            ?>
                                            <li class="nav-item">
                                                <a class="nav-link block" href="<?php
                                                if($this->input->get('gid'))
                                                    echo site_url("user/group_permissions?gid=".$this->input->get('gid')."&cont=".$controller->controller_id);
                                                else
                                                    echo site_url("user/user_permissions?uid=".$user_id."&cont=".$controller->controller_id);


                                                ?>"><?php echo ucfirst($controller->controller) ?></a>
                                            </li>
                                            <?php
                                        }
                                }
                                ?>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- / -->

    </div>
</div>

<script type="text/javascript">
    function user_list(url) {
        $.post(site_url + 'user/ready_list',{}).done(function(res) {
            if (res) {
                window.location.href = url;
            }
        }).fail(function(err) {
            console.log(err);
        });
    }
</script>