<?php $this->load->view('menu/menu');?>
<!-- Content -->
<div id="content">

    <!-- Section -->
    <section class="bg-black fullheight dark">

        <div class="bg-image"><img src="<?php echo base_url(); ?>assets/themes/default/img/photos/classic_bg03.jpg" alt=""></div>

        <div class="container v-center text-center">
            <div class="row">
                <div class="col-lg-4 col-lg-push-4">
                    <div class="bordered-box rounded">
                        <h2>Log in!</h2>
                        <form id="login-form" class="validate-form text-center mb-30" method="post" action="<?php echo site_url("user/front_end_login")?>">
                            <div class="form-group mb-10">
                                <label for="login">Login:</label>
                                <input id="email" name="email" type="text" class="form-control input-2" required>
                            </div>
                            <div class="form-group mb-10">
                                <label for="password">Password:</label>
                                <input id="password" name="password" type="password" class="form-control input-2" required>
                            </div>
                            <input type="hidden" name="refer_from" value="<?php echo current_url(); ?>" />
                            <button type="submit" class="btn btn-filled btn-primary btn-block">Login</button>
                        </form>
                        <a href="#" class="link-underline">Forgot my password</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Content / End -->