
<ul class="nav nav-sm">

    <?php
    $i=1;
    foreach($subgroups as $subgroup) {

        if (strlen($subgroup->subgroup) < 1) {
            ?>
            <li class="nav-item">
                <a class="nav-link block active" href="#" data-toggle="tab" data-target="#tab-1">General</a>
            </li>
            <?php
        } else{

            ?>
            <li class="nav-item">
                <a class="nav-link block" href="#" data-toggle="tab" data-target="#tab-<?php echo $i ?>"><?php echo ucfirst($subgroup->subgroup) ?></a>
            </li>
            <?php
        }
        $i++;
    }
    ?>

</ul>
