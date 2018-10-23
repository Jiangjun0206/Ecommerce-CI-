<!-- ############ LAYOUT START-->

<div class="padding">
    <div class="navbar">
        <div class="pull-center">
            <!-- brand -->
            <a href="index.html" class="navbar-brand">
                <div data-ui-include="'images/logo.svg'"></div>
                <img src="images/logo.png" alt="." class="hide">
                <span class="hidden-folded inline">aside</span>
            </a>
            <!-- / brand -->
        </div>
    </div>
</div>
<div class="b-t" ng-app="GymApp">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">
            <div>
                <h4>Forgot your password?</h4>
                <p class="text-muted m-y">
                    Enter your email below and we will send you instructions on how to change your password.
                </p>
            </div>
            <form ng-controller="LostController" ng-submit="submitForm" role="form" method="post">
                <div class="form-group">
                    <input type="email"  ng-model="email" placeholder="Email" class="form-control" required>
                </div>
                <button type="submit" class="btn black btn-block p-x-md"  ng-click="forgot()">Send</button>
            </form>
            <div class="p-y-lg">
                Return to

                <a href=<?php echo site_url("user");?> class="text-primary _600"><?php echo $this->settings->get('sign_in_text') ?> </a>
            </div>
        </div>
    </div>
</div>

<!-- ############ LAYOUT END-->