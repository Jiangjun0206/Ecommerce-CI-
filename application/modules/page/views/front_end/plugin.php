<?php $this->load->view('menu/menu');
?>
<!-- Page Title -->
<div id="page-title" class="page-title page-title-1 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><?php echo $title?></h1>
            </div>
            <!-- <div class="col-md-6">
                 <ol class="breadcrumb">
                     <li><a href="index.html">Home Page</a></li>
                     <li class="active">Sidebar right</li>
                 </ol>
             </div>-->
        </div>
    </div>
</div>
<!-- Page Title / End -->
<!-- Content -->
<div id="content">

    <section>

        <div class="container">
            <div class="row">

                <!-- Content -->
                <div class="content col-md-9">
                    <?php //echo $plugin_display?>
                </div>

                <!-- Sidebar -->
                <div class="sidebar col-md-3 clearfix">

                    <div class="widget">
                        <h6 class="text-uppercase text-muted">Plugin Menu</h6>
                        <ul class="list-posts">
                            <li>
                                <a href="#">Crazy developer ideas on 2016</a>
                            </li>
                            <li>
                                <a href="#">Crazy developer ideas on 2016</a>
                            </li>
                        </ul>
                    </div>



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