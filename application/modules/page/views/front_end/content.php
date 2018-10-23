<?php $this->load->view('menu/menu');
if(isset($home_page_id) && !$home_page_id == $page->id){
?>

<div id="page-title" class="page-title page-title-1 bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo $page->title?></h1>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="<?=site_url()?>">Home Page</a></li>
                        <li class="active"><?php echo $page->title?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <?php } ?>
<!-- Content -->
<div id="content">

    <section>

        <div class="container">
            <div class="row">
            	<?php if(isset($page->content)) { ?>
                <?=$page->content?>
                <?php } ?>
            </div>
        </div>
</div>

</section>

</div>
<!-- Content / End -->
<?php $this->load->view('footer/default_footer');?>