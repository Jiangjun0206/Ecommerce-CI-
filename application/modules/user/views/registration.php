<!-- ############ LAYOUT START-->

<div class="padding">
    <div class="navbar">
        <div class="pull-center">
            <!-- brand -->
            <a href="index.html" class="navbar-brand">
                <span class="hidden-folded inline"><?php echo $this->settings->get('website_name') ?></span>
            </a>
            <!-- / brand -->
        </div>
    </div>
</div>
<div class="b-t" ng-app="GymApp">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">

            <form ng-controller="RegController" ng-submit="submitForm" role="form" method="post">
                <?php if($this->settings->get('require_username') == 'on'){?>
                    <div class="form-group">
                        <input type="text" ng-model="username" class="form-control" placeholder="Username" required>
                    </div>
                <?php } ?>
                <div class="form-group">
                    <input type="text" ng-model="fname" class="form-control" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <input type="text" ng-model="lname" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <input type="email" ng-model="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" ng-model="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="m-b-md text-sm">
                    <p>IMPORTANT: Your password must have between<strong> <br>
                    5 to 12 characters.</strong></p>
                    <p>Please, Click the &quot;Sign Up&quot; Button <strong><br>
                    Only One Time</strong> and wait</p>
                </div>
                <button type="submit" class="btn btn-lg black p-x-lg" ng-click="register()" ng-disabled="loginForm.$invalid"><?php echo $this->settings->get('sign_up_text') ?></button>
            </form>
            <div class="p-y-lg text-center">
                <div>
                  <p>&nbsp;</p>
                  <p>Already have an account?<a href=<?php echo site_url("user");?> class="text-primary _600"><?php echo $this->settings->get('sign_in_text') ?> </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ############ LAYOUT END-->