<?php //die ('controller ->'.$controller.' method->'.$method);

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

                                <?php foreach($megamenus as $megamenu){?>
                                <li class="active">
                                    <?php echo anchor('user/user_groups', '<span class="nav-text">'.$megamenu->name.'</span>', 'class="link-class"') ?>
                                </li>
                                <?php }?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- / -->

    </div>
</div>