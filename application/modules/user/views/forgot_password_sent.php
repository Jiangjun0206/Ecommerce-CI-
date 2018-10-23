<!-- ############ LAYOUT START-->

<div class="padding">
    <div class="navbar">
        <div class="pull-center">
            <!-- brand -->
            <a href="index.html" class="navbar-brand">
                <div data-ui-include="'images/logo.svg'"></div>
                <img src="images/<?php echo $this->settings->get('logo') ?>" alt="." class="hide">
                <span class="hidden-folded inline">aside</span>
            </a>
            <!-- / brand -->
        </div>
    </div>
</div>
<div class="b-t">
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">
            <div>
                <h4>Password Reset link sent...</h4>
                <p class="text-muted m-y">
                    A password reset link has been sent to the email address provided.
                </p>
            </div>

            <div class="p-y-lg">
                Return to

                <a href=<?php echo site_url("user");?> class="text-primary _600"><?php echo $this->settings->get('sign_in_text') ?> </a>
            </div>
        </div>
    </div>
</div>

<!-- ############ LAYOUT END-->