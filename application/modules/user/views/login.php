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

            <form ng-controller="FormController" ng-submit="submitForm" role="form" method="post" name="loginForm">
                <div class="form-group">
                    <input type="email" ng-model="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" ng-model="password" class="form-control" placeholder="password" required>
                </div>
                <button type="submit" class="btn btn-lg black p-x-lg" ng-click="login()" ng-disabled="loginForm.$invalid">Sign in</button>
            </form>
            <div class="m-y">
                <a href=<?php echo site_url("user/forgot_password");?> class="text-primary _600"><?php echo $this->settings->get('forgot_password_text') ?></a>
            </div>
            <!--<div>-->
            <!--    Do not have an account?-->
            <!--    <a href=<?php echo site_url("user/register");?> class="text-primary _600"><?php echo $this->settings->get('sign_up_text') ?></a>-->
            <!--</div>-->
        </div>
    </div>
</div>

<!-- ############ LAYOUT END-->