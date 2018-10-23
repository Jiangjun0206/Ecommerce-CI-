<style type="text/css">
    .upgrade-link:hover {
        text-decoration: underline;
        color: #5bc0de;
    }
</style>
<form role="form" class="p-a-md col-md-8" method="post" action="<?php echo site_url('/upgrade/key_confirm'); ?>">
    <div class="form-group col-md-8">
        <label>Key For Funnels Ready (xxxx-xxxx-xxxx-xxxx) </label>
        <input type="text" class="form-control" style="display: none !important" id="key_type" name="key_type" value="ready">
        <input type="text" class="form-control" id="key_ready" name="key_ready" value="">
        <?php if (isset($_SESSION['error_ready'])) { ?>
            <span style="color:red;"><?php echo $_SESSION['error_ready']; ?></span>
        <?php } ?>
    </div>
    <div class="col-md-8">
        <button type="submit" class="btn btn-info m-t">Confirm        </button>
        <div class="pull-right" style="margin-top: 35px;"></div>
    </div>
</form>

<form role="form" class="p-a-md col-md-8" method="post" action="<?php echo site_url('/upgrade/key_confirm'); ?>">
    <div class="form-group col-md-8">
        <label>Key For Funnels Club (xxxx-xxxx-xxxx-xxxx) </label>
        <input type="text" class="form-control" style="display: none !important" id="key_type" name="key_type" value="club">
        <input type="text" class="form-control" id="key_club" name="key_club" value="">
        <?php if (isset($_SESSION['error_club'])) { ?>
            <span style="color:red;"><?php echo $_SESSION['error_club']; ?></span>
        <?php } ?>
    </div>
    <div class="col-md-8">
      <button type="submit" class="btn btn-info m-t">Confirm      </button>
      <p>&nbsp;</p>
      <p><a href="https://jvz8.com/c/1112155/304296"><img src="https://instantecomfunnels.net/q1.png" width="168" height="106" alt=""/></a> <a href="https://jvz7.com/c/1112155/304312"><img src="https://instantecomfunnels.net/q2.png" width="168" height="106" alt=""/></a> </p>
      <p><a href="https://jvz3.com/c/1112155/304304"><img src="https://instantecomfunnels.net/q3.png" width="168" height="106" alt=""/></a> <a href="https://jvz1.com/c/1112155/304324"><img src="https://instantecomfunnels.net/q4.png" width="168" height="106" alt=""/></a></p>
      <p><strong>We Recommend</strong>: For &quot;Instant eCom Funnels&quot; Users, Discount Coupon : <strong>10off</strong></p>
        <p><a href="http://streamstore.net/salespage-2-2s/"><img src="https://instantecomfunnels.net/banner.png" width="500" height="272" alt=""/></a></p>
        <div class="pull-right" style="margin-top: 35px;">
          <p>&nbsp;</p>
          <p>&nbsp;</p>
      </div>
    </div>
</form>