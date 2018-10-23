<?php
error_reporting(0);
if(isset($msg)){
    echo '<div class="text-center">'.$msg.'</div>';
}
?>
<div class="container">

<div class="row">
    <div class="form-group col-md-6">
        <label>Page Title</label>
        <input type="text" class="form-control" name="title" id="title" value="<?php echo (isset($page))? $page->title : ""; ?>" required>
    </div>
</div>

	<?php 

	$countdown_vars = @explode("----", $page->title); 
	$cd = @explode("-", $countdown_vars[1]);

	?>

<div id="visible-countdown" class="row" style="display:none;">

    <div class="form-group col-md-3">
  	<input type='checkbox' name='activate_coundown' class="show-countdown-check" id="activate_countdown" <?php if($cd[0] != '0' && $cd[0] != '') echo "checked"; ?>>
        <label for="activate_countdown">Activate countdown</label>
    </div>

    <div class="form-group col-md-9 show-countdown" style="display:none;" id="show-countdown">
        <label>Set countdown end date</label>
        <br/>

		<select class="custom-select mr-sm-2" name="countdown_year" id="countdown_year">
		        <option selected value="0">Year</option>
		        <option value="2018" <?php if($cd[0] == 2018) echo 'selected'; ?>>2018</option>
		        <option value="2019" <?php if($cd[0] == 2019) echo 'selected'; ?>>2019</option>
		        <option value="2020" <?php if($cd[0] == 2020) echo 'selected'; ?>>2020</option>
		      </select>
        		<select class="custom-select mr-sm-2" name="countdown_month" id="countdown_month">
		        <option selected value="0">Month</option>
		        <option value="1" <?php if($cd[1] == 1) echo 'selected'; ?>>January</option>
		        <option value="2" <?php if($cd[1] == 2) echo 'selected'; ?>>February</option>
		        <option value="3" <?php if($cd[1] == 3) echo 'selected'; ?>>March</option>
		        <option value="4" <?php if($cd[1] == 4) echo 'selected'; ?>>April</option>
		        <option value="5" <?php if($cd[1] == 5) echo 'selected'; ?>>May</option>
		        <option value="6" <?php if($cd[1] == 6) echo 'selected'; ?>>June</option>
		        <option value="7" <?php if($cd[1] == 7) echo 'selected'; ?>>July</option>
		        <option value="8" <?php if($cd[1] == 8) echo 'selected'; ?>>August</option>
		        <option value="9" <?php if($cd[1] == 9) echo 'selected'; ?>>September</option>
		        <option value="10" <?php if($cd[1] == 10) echo 'selected'; ?>>October</option>
		        <option value="11" <?php if($cd[1] == 11) echo 'selected'; ?>>November</option>
		        <option value="12" <?php if($cd[1] == 12) echo 'selected'; ?>>December</option>
		      </select>


		<select class="custom-select mr-sm-2" name="countdown_day" id="countdown_day">
		        <option selected value="0">Day</option>
		        <option value="1" <?php if($cd[2] == 1) echo 'selected'; ?>>1</option>
		        <option value="2" <?php if($cd[2] == 2) echo 'selected'; ?>>2</option>
		        <option value="3" <?php if($cd[2] == 3) echo 'selected'; ?>>3</option>
		        <option value="4" <?php if($cd[2] == 4) echo 'selected'; ?>>4</option>
		        <option value="5" <?php if($cd[2] == 5) echo 'selected'; ?>>5</option>
		        <option value="6" <?php if($cd[2] == 6) echo 'selected'; ?>>6</option>
		        <option value="7" <?php if($cd[2] == 7) echo 'selected'; ?>>7</option>
		        <option value="8" <?php if($cd[2] == 8) echo 'selected'; ?>>8</option>
		        <option value="9" <?php if($cd[2] == 9) echo 'selected'; ?>>9</option>
		        <option value="10" <?php if($cd[2] == 10) echo 'selected'; ?>>10</option>
		        <option value="11" <?php if($cd[2] == 11) echo 'selected'; ?>>11</option>
		        <option value="12" <?php if($cd[2] == 12) echo 'selected'; ?>>12</option>
		        <option value="13" <?php if($cd[2] == 13) echo 'selected'; ?>>13</option>
		        <option value="14" <?php if($cd[2] == 14) echo 'selected'; ?>>14</option>
		        <option value="15" <?php if($cd[2] == 15) echo 'selected'; ?>>15</option>
		        <option value="16" <?php if($cd[2] == 16) echo 'selected'; ?>>16</option>
		        <option value="17" <?php if($cd[2] == 17) echo 'selected'; ?>>17</option>
		        <option value="18" <?php if($cd[2] == 18) echo 'selected'; ?>>18</option>
		        <option value="19" <?php if($cd[2] == 19) echo 'selected'; ?>>19</option>
		        <option value="20" <?php if($cd[2] == 20) echo 'selected'; ?>>20</option>
		        <option value="21" <?php if($cd[2] == 21) echo 'selected'; ?>>21</option>
		        <option value="22" <?php if($cd[2] == 22) echo 'selected'; ?>>22</option>
		        <option value="23" <?php if($cd[2] == 23) echo 'selected'; ?>>23</option>
		        <option value="24" <?php if($cd[2] == 24) echo 'selected'; ?>>24</option>
		        <option value="25" <?php if($cd[2] == 25) echo 'selected'; ?>>25</option>
		        <option value="26" <?php if($cd[2] == 26) echo 'selected'; ?>>26</option>
		        <option value="27" <?php if($cd[2] == 27) echo 'selected'; ?>>27</option>
		        <option value="28" <?php if($cd[2] == 28) echo 'selected'; ?>>28</option>
		        <option value="29" <?php if($cd[2] == 29) echo 'selected'; ?>>29</option>
		        <option value="30" <?php if($cd[2] == 30) echo 'selected'; ?>>30</option>
		        <option value="31" <?php if($cd[2] == 31) echo 'selected'; ?>>31</option>
		      </select>



		<select class="custom-select mr-sm-2" name="countdown_hour" id="countdown_hour">
		        <option selected value="0">Hour</option>
		        <option value="1" <?php if($cd[3] == 1) echo 'selected'; ?>>1</option>
		        <option value="2" <?php if($cd[3] == 2) echo 'selected'; ?>>2</option>
		        <option value="3" <?php if($cd[3] == 3) echo 'selected'; ?>>3</option>
		        <option value="4" <?php if($cd[3] == 4) echo 'selected'; ?>>4</option>
		        <option value="5" <?php if($cd[3] == 5) echo 'selected'; ?>>5</option>
		        <option value="6" <?php if($cd[3] == 6) echo 'selected'; ?>>6</option>
		        <option value="7" <?php if($cd[3] == 7) echo 'selected'; ?>>7</option>
		        <option value="8" <?php if($cd[3] == 8) echo 'selected'; ?>>8</option>
		        <option value="9" <?php if($cd[3] == 9) echo 'selected'; ?>>9</option>
		        <option value="10" <?php if($cd[3] == 10) echo 'selected'; ?>>10</option>
		        <option value="11" <?php if($cd[3] == 11) echo 'selected'; ?>>11</option>
		        <option value="12" <?php if($cd[3] == 12) echo 'selected'; ?>>12</option>
		        <option value="13" <?php if($cd[3] == 13) echo 'selected'; ?>>13</option>
		        <option value="14" <?php if($cd[3] == 14) echo 'selected'; ?>>14</option>
		        <option value="15" <?php if($cd[3] == 15) echo 'selected'; ?>>15</option>
		        <option value="16" <?php if($cd[3] == 16) echo 'selected'; ?>>16</option>
		        <option value="17" <?php if($cd[3] == 17) echo 'selected'; ?>>17</option>
		        <option value="18" <?php if($cd[3] == 18) echo 'selected'; ?>>18</option>
		        <option value="19" <?php if($cd[3] == 19) echo 'selected'; ?>>19</option>
		        <option value="20" <?php if($cd[3] == 20) echo 'selected'; ?>>20</option>
		        <option value="21" <?php if($cd[3] == 21) echo 'selected'; ?>>21</option>
		        <option value="22" <?php if($cd[3] == 22) echo 'selected'; ?>>22</option>
		        <option value="23" <?php if($cd[3] == 23) echo 'selected'; ?>>23</option>
		        <option value="24" <?php if($cd[3] == 24) echo 'selected'; ?>>24</option>
		      </select>

		<select class="custom-select mr-sm-2" name="countdown_minute" id="countdown_minute">
		        <option selected value="0">Minute</option>
		        <option value="0" <?php if($cd[4] == '0') echo 'selected'; ?>>0</option>
		        <option value="1" <?php if($cd[4] == 1) echo 'selected'; ?>>1</option>
		        <option value="2" <?php if($cd[4] == 2) echo 'selected'; ?>>2</option>
		        <option value="3" <?php if($cd[4] == 3) echo 'selected'; ?>>3</option>
		        <option value="4" <?php if($cd[4] == 4) echo 'selected'; ?>>4</option>
		        <option value="5" <?php if($cd[4] == 5) echo 'selected'; ?>>5</option>
		        <option value="6" <?php if($cd[4] == 6) echo 'selected'; ?>>6</option>
		        <option value="7" <?php if($cd[4] == 7) echo 'selected'; ?>>7</option>
		        <option value="8" <?php if($cd[4] == 8) echo 'selected'; ?>>8</option>
		        <option value="9" <?php if($cd[4] == 9) echo 'selected'; ?>>9</option>
		        <option value="10" <?php if($cd[4] == 10) echo 'selected'; ?>>10</option>
		        <option value="11" <?php if($cd[4] == 11) echo 'selected'; ?>>11</option>
		        <option value="12" <?php if($cd[4] == 12) echo 'selected'; ?>>12</option>
		        <option value="13" <?php if($cd[4] == 13) echo 'selected'; ?>>13</option>
		        <option value="14" <?php if($cd[4] == 14) echo 'selected'; ?>>14</option>
		        <option value="15" <?php if($cd[4] == 15) echo 'selected'; ?>>15</option>
		        <option value="16" <?php if($cd[4] == 16) echo 'selected'; ?>>16</option>
		        <option value="17" <?php if($cd[4] == 17) echo 'selected'; ?>>17</option>
		        <option value="18" <?php if($cd[4] == 18) echo 'selected'; ?>>18</option>
		        <option value="19" <?php if($cd[4] == 19) echo 'selected'; ?>>19</option>
		        <option value="20" <?php if($cd[4] == 20) echo 'selected'; ?>>20</option>
		        <option value="21" <?php if($cd[4] == 21) echo 'selected'; ?>>21</option>
		        <option value="22" <?php if($cd[4] == 22) echo 'selected'; ?>>22</option>
		        <option value="23" <?php if($cd[4] == 23) echo 'selected'; ?>>23</option>
		        <option value="24" <?php if($cd[4] == 24) echo 'selected'; ?>>24</option>
		        <option value="25" <?php if($cd[4] == 25) echo 'selected'; ?>>25</option>
		        <option value="26" <?php if($cd[4] == 26) echo 'selected'; ?>>26</option>
		        <option value="27" <?php if($cd[4] == 27) echo 'selected'; ?>>27</option>
		        <option value="28" <?php if($cd[4] == 28) echo 'selected'; ?>>28</option>
		        <option value="29" <?php if($cd[4] == 29) echo 'selected'; ?>>29</option>
		        <option value="30" <?php if($cd[4] == 30) echo 'selected'; ?>>30</option>
		        <option value="31" <?php if($cd[4] == 31) echo 'selected'; ?>>31</option>
		        <option value="32" <?php if($cd[4] == 32) echo 'selected'; ?>>32</option>
		        <option value="33" <?php if($cd[4] == 33) echo 'selected'; ?>>33</option>
		        <option value="34" <?php if($cd[4] == 34) echo 'selected'; ?>>34</option>
		        <option value="35" <?php if($cd[4] == 35) echo 'selected'; ?>>35</option>
		        <option value="36" <?php if($cd[4] == 36) echo 'selected'; ?>>36</option>
		        <option value="37" <?php if($cd[4] == 37) echo 'selected'; ?>>37</option>
		        <option value="38" <?php if($cd[4] == 38) echo 'selected'; ?>>38</option>
		        <option value="39" <?php if($cd[4] == 39) echo 'selected'; ?>>39</option>
		        <option value="40" <?php if($cd[4] == 40) echo 'selected'; ?>>40</option>
		        <option value="41" <?php if($cd[4] == 41) echo 'selected'; ?>>41</option>
		        <option value="42" <?php if($cd[4] == 42) echo 'selected'; ?>>42</option>
		        <option value="43" <?php if($cd[4] == 43) echo 'selected'; ?>>43</option>
		        <option value="44" <?php if($cd[4] == 44) echo 'selected'; ?>>44</option>
		        <option value="45" <?php if($cd[4] == 45) echo 'selected'; ?>>45</option>
		        <option value="46" <?php if($cd[4] == 46) echo 'selected'; ?>>46</option>
		        <option value="47" <?php if($cd[4] == 47) echo 'selected'; ?>>47</option>
		        <option value="48" <?php if($cd[4] == 48) echo 'selected'; ?>>48</option>
		        <option value="49" <?php if($cd[4] == 49) echo 'selected'; ?>>49</option>
		        <option value="50" <?php if($cd[4] == 50) echo 'selected'; ?>>50</option>
		        <option value="51" <?php if($cd[4] == 51) echo 'selected'; ?>>51</option>
		        <option value="52" <?php if($cd[4] == 52) echo 'selected'; ?>>52</option>
		        <option value="53" <?php if($cd[4] == 53) echo 'selected'; ?>>53</option>
		        <option value="54" <?php if($cd[4] == 54) echo 'selected'; ?>>54</option>
		        <option value="55" <?php if($cd[4] == 55) echo 'selected'; ?>>55</option>
		        <option value="56" <?php if($cd[4] == 56) echo 'selected'; ?>>56</option>
		        <option value="57" <?php if($cd[4] == 57) echo 'selected'; ?>>57</option>
		        <option value="58" <?php if($cd[4] == 58) echo 'selected'; ?>>58</option>
		        <option value="59" <?php if($cd[4] == 59) echo 'selected'; ?>>59</option>
		      </select>


    </div>

</div>


<style>
.help-tip{
    text-align: center;
    background-color: #BCDBEA;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    font-size: 14px;
    line-height: 26px;
    cursor: default;
	position: relative;
	display:inline-block;

}

.help-tip:before{
    content:'?';
    font-weight: bold;
    color:#fff;
}

.help-tip:hover p{
    display:block;
    transform-origin: 100% 0%;

    -webkit-animation: fadeIn 0.3s ease-in-out;
    animation: fadeIn 0.3s ease-in-out;

}

.help-tip p{    /* The tooltip */
    display: none;
    text-align: left;
    background-color: #1E2021;
    padding: 20px;
    width: 300px;
    position: absolute;
    border-radius: 3px;
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
    right: -4px;
    color: #FFF;
    font-size: 13px;
    line-height: 1.4;
    z-index:9999999;
}

.help-tip p:before{ /* The pointer of the tooltip */
    position: absolute;
    content: '';
    width:0;
    height: 0;
    border:6px solid transparent;
    border-bottom-color:#1E2021;
    right:10px;
    top:-12px;
}

.help-tip p:after{ /* Prevents the tooltip from being hidden */
    width:100%;
    height:40px;
    content:'';
    position: absolute;
    top:-40px;
    left:0;
}

/* CSS animation */

@-webkit-keyframes fadeIn {
    0% { 
        opacity:0; 
        transform: scale(0.6);
    }

    100% {
        opacity:100%;
        transform: scale(1);
    }
}

@keyframes fadeIn {
    0% { opacity:0; }
    100% { opacity:100%; }
}

</style>




<div id="contentarea" class="row">
<?php 
$folder = 'page';
$url = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'].'/'.$folder.'/'.'assets/components/'; 
?>


<style>
.row .topbar-s{
	background:#e43b2c;color:white;margin-left:-50%;width:200%;font-size:18px;text-transform: uppercase;font-weight:700;text-align:center;padding:15px 0;
}
.row .topbar-s h1{
	font-family:Arial, sans-serif;font-size:34px;font-weight: 700;
}
.share-facebook{
cursor:pointer;display:inline-block;color:#FFF;width:35px;height:33px;border-radius:50px;background-color:#128BDB ;margin-left:0
}
.share-twitter{
cursor:pointer;display:inline-block;color:#FFF;width:35px;height:33px;border-radius:50px;background-color:#00bfff 
}
.share-google{
	cursor:pointer;display:inline-block;color:#FFF;width:35px;height:33px;border-radius:50px;background-color: #DF311F
}
.share-container{
	width:100%;text-align:center;
}
.row .bottombar-s{
	background:#323232;color:white;margin-left:-50%;width:200%;padding:15px 0;
}
.bottom-bar-container{
	width:900px;
	margin:0 auto;
}
.cd-circles-container{
width:55%;margin:0 auto 120px;
}
.cd-circles{
	margin:0 auto;font-weight:600;background:#383838;color:#FFF;border-radius:50px;font-size:22px !important;padding:10px 0;border:2px solid transparent;
}
.cd-circles-text{
	font-size:11px;text-transform: uppercase;
}
.row p{
	font-family:Arial, sans-serif;font-size:16px;line-height:1.5;
}
.row .big-button{
width:100%;background:#e75245;border:1px solid transparent;font-weight:700;border-radius:5px;font-size:26px;text-transform: none;font-family:Arial, sans-serif;line-height:1.5;
margin:1em 0;
display:block;
}
.row .big-button:hover{
	background:#e75245;
}
.row .big-button .btn-second-row{
	font-size:60%;font-weight: 300;opacity:0.7;
		letter-spacing: 0px;
}
.policy-s{
	font-family:Arial, sans-serif;font-size:14px;color:#000;font-weight:700;margin-bottom:70px;display:block;
}
.policy-s span{
display:inline-block;width:150px;
}

.f-list{
	  list-style-type: none;
	  padding:0;
}
.f-list li{
	text-align:left;
	font-size:18px;
}

.steps-s-1{
	background:#bddaa2;text-transform: uppercase;border-top-left-radius:5px;border:1px solid #bddaa2; border-bottom-left-radius:5px;padding:10px;color:#58763c;font-family: 'Oswald', sans-serif;font-size:18px;font-weight:500;
}

.steps-s-2{
background:#f2f8ec;text-transform: uppercase;border-top-right-radius:5px;border:1px solid #bddaa2; border-bottom-right-radius:5px;padding:10px;color:#cedac0;font-family: 'Oswald', sans-serif;font-size:18px;font-weight:500;
}

.full-headline{
	font-family: Arial, sans-serif;padding:10px;font-size:32px;font-weight:700;color:#e75245;text-align:center;
}
@media (max-width: 767px) {
    .container{
        width:100%;
    }
    .container .display{
        width:90%;
        margin:0 auto;
    }
    .row .topbar-s,.row .bottombar-s{
        margin-left:0;
        width:100%;
        padding:10px;
    }
    .row .topbar-s h1{
        font-size:20px;
    }
    .cd-circles-container{
        width:70%;
        margin:0 auto;
    }
    .cd-circles-container div.column{
        display:inline;
        width:50px;
        text-align:center;
        float:left;
        margin-right:6px;
        margin-left:6px;
    }

    .cd-circles-text{
        margin-top:10px;
        display:block;
    }
    .steps-s{
    	margin:15px;
    }

    .row .big-button{
        font-size:18px;
        padding:10px 0;
    }
    .policy-s span{
        display:block;
        width:100%;
        text-align:center;
    }
    .bottom-bar-container{
        width:100%;
    }
    .bottom-bar-container div{
        width:100%;
    }


}
</style>

<?php if($_GET['snippet'] == 1) : ?>



<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center topbar topbar-s">
            <h1>CLAIM YOUR {X} FOR ONLY $x.xx INCLUDES FREE SHIPPING!</h1>
        </div>
    </div>

</div>    
   
<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column half">
            <img src="<?=$url?>assets/minimalist-basic/0105062-0-Large.jpeg">

            <div class="clearfix is-rounded-button-medium share-container">
            	<p><strong>Share With Your Friends!</strong></p>
                <div class="share-facebook"><i class="icon ion-social-facebook"></i></div>
                <div class="share-twitter"><i class="icon ion-social-twitter"></i></div>
                <div class="share-google"><i class="icon ion-social-googleplus"></i></div>
            </div><br/><br/>
        </div>
        <div class="column half">
            <div class="display" style="text-align:center;margin-top:25px;">
                <h1 style="font-family:Arial, sans-serif;font-size:32px;font-weight:700;">Includes FREE Shipping!</h1>
                <p>This {product} Normally Sells For <strong>$x.xx</strong> But Is On a Special <strong>x%</strong> Discount For a Limited Time!</p>
                <p>Just Pay <strong>$xx.xx</strong>! Includes FREE Shipping!</p>
  
                <a href="#" class="btn btn-primary edit btn-primary-sale big-button ship-button">Get Yours For Just $xx.xx<div class="btn-second-row">Limited Time Special Offer</div></a>
  
                <p><input id="upgrade_offer" name="upgrade_offer" type="checkbox"> Check This Box If You Would Like To Upgrade Your<br/>Order And Receive TWO XXX For Just <strong>$xx.xx</strong></p>
            	<p>Grab Yours Before The <strong>Timer Ends!</strong></p>

		    	<img style="margin-top:0;" src="<?=$url?>assets/minimalist-basic/secure.png" width="250"/>

		     	<div class="cd-circles-container">
		     	<div class="column third center" >
		            <h1 class="cd-circles" id="chours">00</h1>
		            <h3 class="cd-circles-text">Hours</h3>
		        </div>
		        <div class="column third center" >
		            <h1 class="cd-circles" id="cminutes">00</h1>
		            <h3 class="cd-circles-text">Minutes</h3>
		        </div>
		        <div class="column third center" >
		            <h1 class="cd-circles" id="cseconds">00</h1>
		            <h3 class="cd-circles-text">Seconds</h3>
		        </div>
		    	</div>


            </div>
        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full topbar bottombar-s">
        	<div class="bottom-bar-container">
            <div class="column third">
	            <p>
					<strong>Your Company Name</strong>
					<br/>Company Address line 1<br/>
					Company Address line 2<br/>
					Company Address line 3<br/>
	            </p>
        	</div>
            <div class="column two-third">
	            <p>Any Questions? Please Contact Support At support@yourssite.com </p>
        	</div>
        </div>
        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center" style="margin-top:40px;">
            <a class="policy-s" href="#"><span>Refund Policy</span><span>Terms of Service</span><span>Privacy Policy</span></a>
        </div>
    </div>

</div>


<?php endif; ?>





<?php if($_GET['snippet'] == 2) : ?>

<div class="ui-draggable">
    <div class="row clearfix">
        <div class="column full center topbar topbar-s">
            <h1>WOULD YOU LIKE TO ADD {X} TO YOUR ORDER?</h1>
        </div>
    </div>
</div>

<br/><br/>
<div class="ui-draggable">

    <div class="row clearfix steps-s">
        <div class="column half center steps-s-1">
           <div>Step1: Customize Order</div>
        </div>
        <div class="column half center steps-s-2">
           <div>Step2: Order Complete</div>
        </div>

    </div>
</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center">
            <h1 class="full-headline">WAIT! Special ONE TIME ONLY Offer!</h1>
        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column half">
            <img src="<?=$url?>assets/minimalist-basic/rBVaEFgGGE2ASNUeAAH_i0xUw14333.jpg">
        </div>
        <div class="column half">
            <div class="display" style="text-align:center;">
                <h1 style="font-family:Arial, sans-serif;font-size:32px;font-weight: 700;">Claim Your Exclusive<br/>{x} Now!</h1>
                <ul class="f-list">
                	<li><strong><i class="fa fa-check"></i> Feature 1:</strong> Your Text Here</li>
                	<li><strong><i class="fa fa-check"></i> Feature 2:</strong> Your Text Here</li>
                	<li><strong><i class="fa fa-check"></i> Feature 3:</strong> Your Text Here</li>
                </ul>

                <a href="#" class="btn btn-primary edit btn-primary-sale big-button upgrade-order">Please Upgrade My Order NOW<div class="btn-second-row">Just $14,99 (Usually $39,99)</div></a>

                <p><a class="no-thanks" style="color:blue;" href="#">No thanks, I will pass on the upgrade knowing that this is a one time offer.  Please let me complete my order, by clicking here.</a></p>

                  <img src="<?=$url?>assets/minimalist-basic/paypal.png" style="width:60%;height:auto;">
            </div>
        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full topbar bottombar-s">
        	<div class="bottom-bar-container">
            <div class="column third">
	            <p>
					<strong>Your Company Name</strong>
					<br/>Company Address line 1<br/>
					Company Address line 2<br/>
					Company Address line 3<br/>
	            </p>
        	</div>
            <div class="column two-third">
	            <p>Any Questions? Please Contact Support At support@yourssite.com </p>
        	</div>
        </div>
        </div>
    </div>

</div>
<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center" style="margin-top:40px;">
            <a class="policy-s" href="#"><span>Refund Policy</span><span>Terms of Service</span><span>Privacy Policy</span></a>
        </div>
    </div>

</div>

<?php endif; ?>



<?php if($_GET['snippet'] == 3) : ?>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center topbar topbar-s">
            <h1>WE WANT TO SEND YOU THIS {X} ABSOLUTELY FREE!</h1>
        </div>
    </div>

</div>    
   
<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column half">
            <img src="<?=$url?>assets/minimalist-basic/0105062-0-Large.jpeg">

            <div class="clearfix is-rounded-button-medium share-container">
            	<p><strong>Share With Your Friends!</strong></p>
                <div class="share-facebook"><i class="icon ion-social-facebook"></i></div>
                <div class="share-twitter"><i class="icon ion-social-twitter"></i></div>
                <div class="share-google"><i class="icon ion-social-googleplus"></i></div>
            </div>
            <br/><br/>
        </div>
        <div class="column half">
            <div class="display" style="text-align:center;margin-top:25px;">
                <h1 style="font-family:Arial, sans-serif;font-size:32px;font-weight:700;">Just Pay Shipping & Handling!</h1>
                <p>We Only Have a Short Supply Of This Item, So Please Take<br/>Immediate Action & Secure Yours Now! Just Pay Shipping!</p>
                <p>Just Pay <strong>$X.XX</strong> To Cover Shipping & Handling</p>


                <a href="#" class="btn btn-primary edit btn-primary-sale big-button ship-button">Claim Your Free {x} Now<div class="btn-second-row">Limited Time Offer - Just Pay Shipping & Handling</div></a>

                <p><input id="upgrade_offer" name="upgrade_offer" type="checkbox"> Check This Box If You Would Like To Upgrade Your Order & Receive XXX XXX! Just Pay <strong>$X.XX To Cover Shipping & Handling!</strong></p>
            	<p>Grab Yours Before The <strong>Timer Ends!</strong></p>
            	<img style="margin-top:0;" src="<?=$url?>assets/minimalist-basic/secure.png" width="250"/>

            	<div class="cd-circles-container">
		     	<div class="column third center" >
		            <h1 class="cd-circles" id="chours">00</h1>
		            <h3 class="cd-circles-text">Hours</h3>
		        </div>
		        <div class="column third center">
		            <h1 class="cd-circles" id="cminutes">00</h1>
		            <h3 class="cd-circles-text">Minutes</h3>
		        </div>
		        <div class="column third center" >
		            <h1 class="cd-circles" id="cseconds">00</h1>
		            <h3 class="cd-circles-text">Seconds</h3>
		        </div>
		    	</div>
            </div>
        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full topbar bottombar-s">
        	<div class="bottom-bar-container">
            <div class="column third">
	            <p>
					<strong>Your Company Name</strong>
					<br/>Company Address line 1<br/>
					Company Address line 2<br/>
					Company Address line 3<br/>
	            </p>
        	</div>
            <div class="column two-third">
	            <p>Any Questions? Please Contact Support At support@yourssite.com </p>
        	</div>
        </div>
        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center" style="margin-top:40px;">
            <a class="policy-s" href="#"><span>Refund Policy</span><span>Terms of Service</span><span>Privacy Policy</span></a>
        </div>
    </div>

</div>


<?php endif; ?>


<?php if($_GET['snippet'] == 4) : ?>

<div class="ui-draggable">
    <div class="row clearfix">
        <div class="column full center topbar topbar-s">
            <h1>WE ARE PROCESSING YOUR ORDER</h1>
        </div>
    </div>
</div>

<div class="ui-draggable">
    <div class="row clearfix">
        <div class="column half">
            <img src="<?=$url?>assets/minimalist-basic/0105062-0-Large.jpeg">
        </div>
        <div class="column half">
            <div class="display" style="text-align:center;">
                <h1  style="font-family:Arial, sans-serif;font-size:50px;font-weight: 700;">THANK YOU</h1>
                <p  style="font-family:Arial, sans-serif;font-size:24px;line-height:1.5;">Your order was completed successfully</p>
                <p  style="font-family:Arial, sans-serif;font-size:26px;line-height:1.5;"><img width="120" src="<?=$url?>assets/minimalist-basic/express-mail-email-envelope-pictogram-vector-12188876.jpg" /></p>
                <p>Confirmation of the order has been sent to your email address, check this for further details and information. <br/>Any questions contact support@yoursite.com</p>
            </div>

                <p  style="font-family:Arial, sans-serif;font-size:16px;line-height:1.5;font-weight: 700;text-align:center;">Share the offer with your friends</p>

            <div class="clearfix is-rounded-button-medium" style="width:100%;text-align:center;margin-bottom:40px;">
                <div class="share-facebook"><i class="icon ion-social-facebook"></i></div>
                <div class="share-twitter"><i class="icon ion-social-twitter"></i></div>
                <div class="share-google"><i class="icon ion-social-googleplus"></i></div>
            </div>


        </div>
    </div>

</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full topbar bottombar-s">
        	<div class="bottom-bar-container">
            <div class="column third">
	            <p>
					<strong>Your Company Name</strong>
					<br/>Company Address line 1<br/>
					Company Address line 2<br/>
					Company Address line 3<br/>
	            </p>
        	</div>
            <div class="column two-third">
	            <p>Any Questions? Please Contact Support At support@yourssite.com </p>
        	</div>
        </div>
        </div>
    </div>

</div>
<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full center" style="margin-top:40px;">
            <a class="policy-s" href="#"><span>Refund Policy</span><span>Terms of Service</span><span>Privacy Policy</span></a>
        </div>
    </div>

</div>
<?php endif; ?>

<?php if($_GET['snippet'] == 5) : ?>

<div class="ui-draggable">
    <div class="row clearfix">
        <div class="column full center topbar topbar-s">
            <h1>OUR POLICY</h1>
        </div>
    </div>
</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full" style="font-family:Arial, sans-serif;">

		<h1 style="font-weight: 700;font-size:22px;">1. Refund Policy</h1>
		<p>RETURNS</p>
		<p>All returns must be postmarked within thirty (30) days of the purchase date. All returned items must be in new and unused condition, with all original tags and labels attached.</p>
		<p>RETURN PROCESS</p>
		<p>To return an item, please email customer service at #youremailaddress to obtain a Return Merchandise Authorization (RMA) number. After receiving a RMA number, place the item securely in its original packaging, and mail your return to the following address:</p>
		<p>#yourcompnayname<br/> 
		Attn: Returns  <br/>
		#youraddress<br/>
		#yourcity/province,<br/> 
		#yourzippostalcode</p>
		<p>Please note, you will be responsible for all return shipping charges. We strongly recommend that you use a trackable method to mail your return.</p>
		<p>REFUNDS</p>
		<p>After receiving your return and inspecting the condition of your item, we will process your return. Please allow at least thirty (30) days from the receipt of your item to process your return.Refunds may take 1­2 billing cycles to appear on your credit card statement, depending on your credit card company. </p>
		<p>QUESTIONS</p>
		<p>If you have any questions concerning our return policy, please contact us at: #youremailaddress</p>
		<h1  style="font-weight: 700;font-size:22px;">2. Terms of Service</h1>
		<p>1. Terms</p>
		<p>By accessing the website at http://yourwebsite.com, you are agreeing to be bound by these terms of service, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws. If you do not agree with any of these terms, you are prohibited from using or accessing this site. The materials contained in this website are protected by applicable copyright and trademark law.</p>
		<p>2. Use License</p>
		<p>
		<ol>
		<li>Permission is granted to temporarily download one copy of the materials (information or software) on #yourcompanyname's website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</li>
		    	<ol>
		    		<li>modify or copy the materials;</li>
		    		<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
		    		<li>attempt to decompile or reverse engineer any software contained on #yourcompanyname's website;</li>
		    		<li>remove any copyright or other proprietary notations from the materials; or</li>
		    		<li>transfer the materials to another person or "mirror" the materials on any other server.</li>
				</ol>
		<li>This license shall automatically terminate if you violate any of these restrictions and may be terminated by #yourcompanyname at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.</li>
		</ol>
		<p>3. Disclaimer</p>
		<p>1. The materials on #yourcompanyname's website are provided on an 'as is' basis. #yourcompanyname makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
		<p>2. Further, #yourcompanyname does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its website or otherwise relating to such materials or on any sites linked to this site.</p>
		<p>4. Limitations</p>
		<p>In no event shall #yourcompanyname or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on #yourcompanyname's website, even if #yourcompanyname or a #yourcompanyname authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.</p>
		<p>5. Accuracy of materials</p>
		<p>The materials appearing on #yourcompanyname's website could include technical, typographical, or photographic errors. #yourcompanyname does not warrant that any of the materials on its website are accurate, complete or current. #yourcompanyname may make changes to the materials contained on its website at any time without notice. However #yourcompanyname does not make any commitment to update the materials.</p>
		<p>6. Links</p>
		<p>#yourcompanyname has not reviewed all of the sites linked to its website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by #yourcompanyname of the site. Use of any such linked website is at the user's own risk.</p>
		<p>7. Modifications</p>
		<p>#yourcompanyname may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.</p>
		<p>8. Governing Law</p>
		<p>These terms and conditions are governed by and construed in accordance with the laws of #yourlocation and you irrevocably submit to the exclusive jurisdiction of the courts in that State or location.</p>
		<h1  style="font-weight: 700;font-size:22px;">3. Privacy Policy</h1>
		<p>This privacy policy has been compiled to better serve those who are concerned with how their 'Personally Identifiable Information' (PII) is being used online. PII, as described in US privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.</p>
		<p>What personal information do we collect from the people that visit our blog, website or app?</p>
		<p>When ordering or registering on our site, as appropriate, you may be asked to enter your name, email address, credit card information or other details to help you with your experience.</p>
		<p>When do we collect information?</p>
		<p>We collect information from you when you place an order or enter information on our site.</p>
		<p>How do we use your information?</p>
		<p>We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:</p>
		<ul>
		    <li>To allow us to better service you in responding to your customer service requests.</li>
		    <li>To quickly process your transactions.</li>
		    <li>To ask for ratings and reviews of services or products</li>
		</ul>
		<p>How do we protect your information?</p>
		<p>Our website is scanned on a regular basis for security holes and known vulnerabilities in order to make your visit to our site as safe as possible.</p>
		<p>We use regular Malware Scanning.</p>
		<p>Your personal information is contained behind secured networks and is only accessible by a limited number of persons who have special access rights to such systems, and are required to keep the information confidential. In addition, all sensitive/credit information you supply is encrypted via Secure Socket Layer (SSL) technology.</p>
		<p>We implement a variety of security measures when a user places an order to maintain the safety of your personal information.</p>
		<p>All transactions are processed through a gateway provider and are not stored or processed on our servers.</p>
		<p>Do we use 'cookies'?</p>
		<p>We do not use cookies for tracking purposes</p>
		<p>You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser settings. Since browser is a little different, look at your browser's Help Menu to learn the correct way to modify your cookies.</p>
		<p>If you turn cookies off .</p>
		<p>Third-party disclosure</p>
		<p>We do not sell, trade, or otherwise transfer to outside parties your Personally Identifiable Information.</p>
		<p>Third-party links</p>
		<p>Occasionally, at our discretion, we may include or offer third-party products or services on our website. These third-party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.</p>
		<p>Google</p>
		<p>Google's advertising requirements can be summed up by Google's Advertising Principles. They are put in place to provide a positive experience for users. https://support.google.com/adwordspolicy/answer/1316548?hl=en </p>
		<p>We have not enabled Google AdSense on our site but we may do so in the future.</p>
		<p>California Online Privacy Protection Act</p>
		<p>CalOPPA is the first state law in the nation to require commercial websites and online services to post a privacy policy. The law's reach stretches well beyond California to require any person or company in the United States (and conceivably the world) that operates websites collecting Personally Identifiable Information from California consumers to post a conspicuous privacy policy on its website stating exactly the information being collected and those individuals or companies with whom it is being shared. - See more at: http://consumercal.org/california-online-privacy-protection-act-caloppa/#sthash.0FdRbT51.dpuf</p>
		<p>According to CalOPPA, we agree to the following:</p>
		<p>Users can visit our site anonymously.
		<p>Once this privacy policy is created, we will add a link to it on our home page or as a minimum, on the first significant page after entering our website.</p>
		<p>Our Privacy Policy link includes the word 'Privacy' and can easily be found on the page specified above.</p>
		<p>You will be notified of any Privacy Policy changes:</p>
		      <ul><li>On our Privacy Policy Page</li></ul>
		<p>Can change your personal information:</p>
		      <ul><li>By emailing us</li></ul>
		<p>How does our site handle Do Not Track signals?</p>
		<p>We honor Do Not Track signals and Do Not Track, plant cookies, or use advertising when a Do Not Track (DNT) browser mechanism is in place.</p>
		<p>Does our site allow third-party behavioral tracking?</p>
		<p>It's also important to note that we allow third-party behavioral tracking</p>
		<p>COPPA (Children Online Privacy Protection Act)</p>
		<p>When it comes to the collection of personal information from children under the age of 13 years old, the Children's Online Privacy Protection Act (COPPA) puts parents in control. The Federal Trade Commission, United States' consumer protection agency, enforces the COPPA Rule, which spells out what operators of websites and online services must do to protect children's privacy and safety online.</p>
		<p>We do not specifically market to children under the age of 13 years old.</p>
		<p>Fair Information Practices</p>
		<p>The Fair Information Practices Principles form the backbone of privacy law in the United States and the concepts they include have played a significant role in the development of data protection laws around the globe. Understanding the Fair Information Practice Principles and how they should be implemented is critical to comply with the various privacy laws that protect personal information.</p>
		<p>In order to be in line with Fair Information Practices we will take the following responsive action, should a data breach occur:</p>
		<p>We will notify you via email</p>
		     <ul><li>Within 7 business days</li></ul>
		<p>We also agree to the Individual Redress Principle which requires that individuals have the right to legally pursue enforceable rights against data collectors and processors who fail to adhere to the law. This principle requires not only that individuals have enforceable rights against data users, but also that individuals have recourse to courts or government agencies to investigate and/or prosecute non-compliance by data processors.</p>
		<p>CAN SPAM Act</p>
		<p>The CAN-SPAM Act is a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipients the right to have emails stopped from being sent to them, and spells out tough penalties for violations.</p>
		<p>We collect your email address in order to:</p>
		     <ul>
		     	<li>Send information, respond to inquiries, and/or other requests or questions</li>
		      	<li>Process orders and to send information and updates pertaining to orders.</li>
		      	<li>Send you additional information related to your product and/or service</li>
		      	<li>Market to our mailing list or continue to send emails to our clients after the original transaction has occurred.</li>
			</ul>
		<p>To be in accordance with CANSPAM, we agree to the following:</p>
		<ul>
		      <li>Not use false or misleading subjects or email addresses.</li>
		      <li>Identify the message as an advertisement in some reasonable way</li>
		      <li>Include the physical address of our business or site headquarters.</li>
		      <li>Monitor third-party email marketing services for compliance, if one is used.</li>
		      <li>Honor opt-out/unsubscribe requests quickly.</li>
		      <li>Allow users to unsubscribe by using the link at the bottom of each email.</li>
		</ul>
		<p>If at any time you would like to unsubscribe from receiving future emails, you can email us at</p>
		      <ul><li>Follow the instructions at the bottom of each email.</li></ul>
		<p>and we will promptly remove you from ALL correspondence.</p>
		<p>Contacting Us</p>
		<p>If there are any questions regarding this privacy policy, you may contact us using the information below.</p>
		<p>
		#yourwebsite<br/>
		#youraddress<br/>
		#yourcity, #yourstateprovince #yourzip/postalcode<br/>
		#yourcountry<br/>
		#yoursupportemail<br/>
		#yourphone<br/>
		</p>

		        </div>
		    </div>

		</div>

<div class="ui-draggable">

    <div class="row clearfix">
        <div class="column full topbar bottombar-s">
        	<div class="bottom-bar-container">
            <div class="column third">
	            <p>
					<strong>Your Company Name</strong>
					<br/>Company Address line 1<br/>
					Company Address line 2<br/>
					Company Address line 3<br/>
	            </p>
        	</div>
            <div class="column two-third">
	            <p>Any Questions? Please Contact Support At support@yourssite.com </p>
        	</div>
        </div>
        </div>
    </div>

</div>

<?php endif; ?>



<?=isset($page)?$page->content: ""?>

    

</div>
<div style="padding: 30px;" class="text-center"><button class="btn btn-primary" id="save_page">Save Page</button> </div>

</div>


<?php if($cd[0] != '0' && $cd[0] != '') : ?>
<script type='text/javascript'>
var x = document.getElementById("show-countdown");
x.style.display = "block";


function makeTimer() {

			var endTime = new Date("<?php echo $cd[0] . ' ' . $cd[1] . ' ' . $cd[2] . ' ' . $cd[3]. ':' . $cd[4] . ':00'; ?> GMT");			
			endTime = (Date.parse(endTime) / 1000);

			var now = new Date();
			now = (Date.parse(now) / 1000);

			var timeLeft = endTime - now;

			var days = Math.floor(timeLeft / 86400); 
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
			if (hours < "10") { hours = "0" + hours; }
			if (minutes < "10") { minutes = "0" + minutes; }
			if (seconds < "10") { seconds = "0" + seconds; }

			$("#cdays").html(days);
			$("#chours").html(hours);
			$("#cminutes").html(minutes);
			$("#cseconds").html(seconds);		

	}

	setInterval(function() { makeTimer(); }, 1000);


</script>
<?php endif; ?>