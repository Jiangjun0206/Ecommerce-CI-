<?php $this->load->view('menu/menu');?>
<!-- Content -->
<div id="content">

    <section>

        <div class="container">
            <div class="row">

                <!-- Content -->
                <div class="content col-md-9">
                    <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vulputate mauris a urna tristique, a congue massa auctor. Quisque pretium, ipsum vel fermentum ornare, nisl augue interdum nulla, eu placerat nisl nisi id velit. Pellentesque commodo mauris a nisl mattis, semper posuere urna iaculis.</p>
                    <p>Ut vitae lectus nunc. In ultrices diam ut commodo laoreet. Aliquam sollicitudin, mi sit amet pulvinar vulputate, eros ipsum vulputate nisl, nec sollicitudin nulla augue a ipsum. Proin sed risus aliquet, molestie lorem in, aliquam tortor.Mauris aliquam risus eget urna dictum, id dictum quam varius. Praesent pretium ultricies molestie. Nulla facilisi. Morbi vitae elementum felis. Phasellus tempor lectus vitae tortor accumsan, eget commodo dolor dignissim. Nunc neque turpis, mollis at ex id, mollis ultricies eros. Nullam quis rutrum augue.<br><br>
                        Mauris eu est sed arcu placerat bibendum id vitae lectus. Suspendisse a ligula quis mauris porta rutrum nec quis odio. Nulla euismod eu purus sit amet dapibus. Duis tellus nisl, pharetra quis volutpat ac, dignissim sed orci. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    <blockquote>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <footer>Johnatan Doe</footer>
                    </blockquote>
                    <p>Ut vitae lectus nunc. In ultrices diam ut commodo laoreet. Aliquam sollicitudin, mi sit amet pulvinar vulputate, eros ipsum vulputate nisl, nec sollicitudin nulla augue a ipsum. Proin sed risus aliquet, molestie lorem in, aliquam tortor.Mauris aliquam risus eget urna dictum, id dictum quam varius. Praesent pretium ultricies molestie. Nulla facilisi. Morbi vitae elementum felis. Phasellus tempor lectus vitae tortor accumsan, eget commodo dolor dignissim. Nunc neque turpis, mollis at ex id, mollis ultricies eros. Nullam quis rutrum augue.<br><br>
                        Mauris eu est sed arcu placerat bibendum id vitae lectus. Suspendisse a ligula quis mauris porta rutrum nec quis odio. Nulla euismod eu purus sit amet dapibus. Duis tellus nisl, pharetra quis volutpat ac, dignissim sed orci. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p>Mauris eu est sed arcu placerat bibendum id vitae lectus. Suspendisse a ligula quis mauris porta rutrum nec quis odio. Nulla euismod eu purus sit amet dapibus. Duis tellus nisl, pharetra quis volutpat ac, dignissim sed orci. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div>
                        <div class="col-md-6">
                            <p>Mauris eu est sed arcu placerat bibendum id vitae lectus. Suspendisse a ligula quis mauris porta rutrum nec quis odio. Nulla euismod eu purus sit amet dapibus. Duis tellus nisl, pharetra quis volutpat ac, dignissim sed orci. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="sidebar col-md-3 clearfix">

                    <!-- Widget - Search -->
                    <div class="widget widget-search">
                        <h6 class="text-uppercase text-muted">Search</h6>
                        <form id="search-widget-form" class="validate-form">
                            <div class="form-group inner-button">
                                <input type="text" class="form-control input-2 input-sm" required>
                                <button type="submit"><i class="ti-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <!-- Widget - Newsletter -->
                    <div class="widget widget-newsletter">
                        <h6 class="text-uppercase">Subscribe Us</h6>
                        <form action="http://suelo.us12.list-manage1.com/subscribe/post-json" id="sign-up-form-2" class="sign-up-form validate-form" method="POST">
                            <input type="hidden" name="u" value="ed47dbfe167d906f2bc46a01b">
                            <input type="hidden" name="id" value="24ac8a22ad">
                            <input type="email"  name="MERGE0" size="25" value="" class="form-control input-2 input-sm" placeholder="Your e-mail..." required>
                            <button type="submit" class="btn btn-filled btn-sm btn-submit btn-block"><span>Sign Up</span></button>
                        </form>
                    </div>

                    <!-- Widget - Recent posts -->
                    <div class="widget widget-recent-posts">
                        <h6 class="text-uppercase text-muted">Recent Posts</h6>
                        <ul class="list-posts">
                            <li>
                                <a href="#">Crazy developer ideas on 2016</a>
                                <span class="date">February 14, 2015</span>
                            </li>
                            <li>
                                <a href="#">Our road trip to London!</a>
                                <span class="date">February 14, 2015</span>
                            </li>
                            <li>
                                <a href="#">New iOS design concept</a>
                                <span class="date">February 14, 2015</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Widget - Twitter -->
                    <div class="widget widget-twitter">
                        <h6 class="text-uppercase text-muted">Latest Tweets</h6>
                        <div class="twitter-feed" data-count="2"></div>
                    </div>

                </div>

            </div>
        </div>

    </section>

</div>
<!-- Content / End -->