<!DOCTYPE html>
<html>
<head>
	<title>Order Confirmation</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" />
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOC-UJjGrZgjxYbHxzt3EzqGmE84Ga8K0">
	</script>
	<!-- &callback=initMap -->
</head>
<body>
<!--
style="margin-top:20px;"
<div id="spinner">
</div>-->
<div class="top">	
	<div style="top: 12%;left: 44%;position: absolute;">
		<div class="loader"></div>
		<h1><i>Loading...</i></h1>
	</div>
</div>
<div class="container">
<?php 
require 'Auth.php'; 
$auth = new Auth();
//$secret = hash('sha256', $_GET['order_id']);
//

//id=296869&tkn=dd503a65cc7c6bd3c93c4ec9a171d5d6a2084b7f17220137d10a9d35889c84e0
$_GET['id'] = '296869';
$_GET['tkn'] = 'dd503a65cc7c6bd3c93c4ec9a171d5d6a2084b7f17220137d10a9d35889c84e0';

if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['tkn']) && !empty($_GET['tkn'])) {


	$order_id = $_GET['id'];
	$secret = $_GET['tkn'];



	
	$auth->setSecret($secret);  // set the secret token
	$auth->setOrderId($order_id); // set the order id
	if($auth->verifyHash()===true) { // check if the secret token is valid for order id .

?>
	<input type="hidden" id="hid" value="<?php echo $order_id; ?>"  />
	
	<div class="col-md-10 col-xs-8">
		<h5 class="text-bold margin-top-bot-xs" style="">
			ORDER:<span id="job_number"></span>
		</h5>
		<h4 class="head-text-4">THANK YOU FOR ORDERING!</h4>
	</div>
	<div class="col-md-2 col-xs-4" style="padding-right: 0px;">
		<img src="assets/images/PlasTrack_logo.jpg" class="img-responsive track">


	</div>

	<div class="clearfix"></div>

	<div class="col-md-12 cell_border">
		<h4 class="head-text-4 margin-top-bot">
			ABOUT YOUR RAPID PLAS DELIVERY
		</h4>
		<p>Hi <b><span id="customer_name"></span></b></p>
		<p>We're pleased to let you know we've received your order which was placed through: 
		<b><span id="dealer_name"></span></b></p>

		<p>Your order has been allocated a delivery window from: <b><span id="dispatch_start_date"></span></b> to 
		<b><span id="dispatch_end_date"></span>.</b> If you need to change this for any reason, please contact us immediately. Call <a href="tel:1800816299">1800 816 299</a> or Email 
		<a href="mailto:customersupport@rapidplas.com.au">customersupport@rapidplas.com.au</a>
		</p>

		<h4 class="head-text-5">Before we go any further...</h4>
		<strong>We need you to acknowledge the below details are correct so that your delivery is as smooth as possible. You'll need to click the CONFIRM AND SAVE button at the bottom of this page.</strong>




		<p>Next, you will receive a call from our Freight team to confirm the delivery date 2 days prior to the delivery.
		 Thank you for taking the time to assist us in the delivery of your rain water tank.</p>			
	</div>

	<div class="clearfix"></div>

	<div class="col-md-12 cell_border">
		<h4 class="head-text-4 margin-top-bot">
			IMPORTANT TANK DELIVERY INFORMATION 
		</h4>
		<p>Delivering tanks can be pretty complicated so we'll need you to give as much information as possible to make sure your tank delivery is a no-fuss operation. Our Rapid Plas fleet team will do everything they can to get your tank delivered right where you need it.</p>
		<ul>
			<li>Is the base for your tank ready? Please see: <a href="http://rapidplas.com.au/information/tank-installation-guide/" target="_blank">http://rapidplas.com.au/information/tank-installation-guide/</a> </li>
			<li>Your tank will be arriving on a large truck and trailer combination which is 19 metres long, 
			3.5 metres wide, 5 metres high, (this is approximately the same size as a Semi-trailer however 
			lower to the ground). </li>
			<li>Our tanks are delivered on a large truck, so there needs to be a 30m turning circle so our 
			driver can turn around and then deliver other customer’s tanks! </li>
			<li>Clear access to your property is required for a truck and trailer combination. Eg. Gateways, 
			ramps, trees, over-head powerlines, driveways, building, clear of spikes, rubbish, rocky 
			ground, river crossings, contour banks. </li>
			<li>Clear location and directions to the property must be provided - please add any specific 
			directions in the Special Requirements section below. </li>
			<li>In addition to the driver, at least two or three willing and able people are needed to assist 
			the driver handle and place the tank on the pad. </li>
			<li>If any conditions change that may make access to your property difficult, you’ll need to call 
			our freight department immediately to advise us of the situation (E.g. If it has rained recently, 
			your site may be too wet.). </li>
			<li>If you are not able to install the tank straight away, you must leave the tank on its side 
			and securely tie it down to prevent it from rolling or being blown away. </li>
		</ul>

		<h4 class="head-text-5">This is what our delivery truck looks like.....</h4>

		<img src="assets/images/image.jpg" class="img-responsive" alt="image" />
	</div>
		
	<div class="col-md-12 cell_border">	
		<h4 class="head-text-4 margin-top-bot">
			YOUR ORDER DETAILS
		</h4>
		<p><strong><small>Click the button below to EDIT any details. This will enable the fields to be in edit mode. Once you have made changes, click SAVE CHANGES</small></strong></p>
		<div class="mb-xs">
			<button class="btn btn-green" id="edit">
				CLICK HERE TO EDIT
			</button>
			<button class="btn btn-green" id="save" style="display: none;">
				SAVE CHANGES
			</button>
		</div>

		<div class="clearfix"></div>

        <div class="margin-top-bot" id="result1" style="font-size: 18px;padding: 6px;"></div>
        <div class="clearfix"></div>
		<table class="table table-bordered">
			<tr>
				<th class="col-md-2">Your Preferred Email</th>
				<td class="col-md-10">
					<span id="email"></span>
					<input type='text' placeholder="Email" id="iemail" style="display: none;"/>
				</td>
			</tr>
			<tr>
				<th class="col-md-2">Your Mobile Number</th>
				<td class="col-md-10">
					<span id="mobile_number"></span>
					<input type='text' placeholder="Mobile" id="imobile_number" style="display: none;"/>
				</td>
			</tr>
			<tr>
				<th class="col-md-2">Site Contact </th>
				<td class="col-md-10">
					<span id="site_contact"></span>
					<input type="text" placeholder="Site Contact" id="isite_contact" maxlength="30" style="display: none;"/>
				</td>
			</tr>
			<tr>
				<th class="col-md-2">Site Contact Number </th>
				<td class="col-md-10">
					<span id="site_contact_number"></span>
					<input type="text" placeholder="Site Contact Number" id="isite_contact_number" maxlength="30" style="display: none;"/>
				</td>
			</tr>
			<tr>
				<th class="col-md-2">Delivery Address </th>
				<td class="col-md-10" id="addd">
					<div id="result2">
                    </div>
					<span id="order_address"></span>
					<input type="text" maxlength="30" style="display: none;" id="iline1" placeholder="Property Name"  />
					<input type="text" maxlength="30" style="display: none;" id="iline2" placeholder="Street Address" />
					<input type="text" maxlength="30" style="display: none;" id="iline3" placeholder="Town" />
					<input type="text" maxlength="30" style="display: none;" id="iline4" placeholder="State &amp; Postcode" />
				</td>
			</tr>
			<tr>
				<th class="col-md-2">Special Requirements
				<p class="text-simple"><span>Where does the tank need to go? On the pad, on its base?</span></p></th>
				<td class="col-md-10">
					<span id="others"></span>
					<textarea id="iothers" placeholder="Description or notes" style="display: none; width: 100%;"></textarea>
				</td>
			</tr>
		</table>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-12 cell_border">
		<h4 class="head-text-4 margin-top-bot">
			PRODUCTS ORDERED
		</h4>
		<table class="table table-bordered" id="products">
			<thead>
				<tr>
					<th class="col-md-2">Product code</th>
					<th class="col-md-9">Description</th>
					<th class="col-md-1">Quantity</th>
				</tr>
			</thead>
			<tbody>				
			</tbody>
		</table>
	</div>
	<div class="clearfix"></div>

	<div class="col-md-12 cell_border">
		<!--<h4 class="head-text-4 margin-top-bot">
			YOUR DELIVERY LOCATION
		</h4>
		<p><strong><small>The existing BLUE marker shows the delivery address. Click on the map to place a RED marker, 
        and drag and drop this RED marker on the place where you would prefer the product to be delivered</small></strong></p>
		<p><strong><small>
		PLEASE NOTE: If your preferred Location is inaccessible for our Large truck, our driver 
		will leave the tank at the nearest possible location. It is at the driver's discretion due to truck 
		and personal safety.
		</small></strong></p>-->
		<!-- MAP DIV STARTS -->
		<div id="map" class="mapDiv" style="display:none"></div>
		<!-- MAP DIV ENDS -->	
		

		<div class="margin-top-bot" id="result"></div>

		<div class="margin-top-bot" id="footerDiv">
			<div class="col-md-12">
				<p><strong>I Agree/Acknowledge</strong>
                <ul style="padding: 0;"><li style="list-style: none;"><input type="checkbox" name="check1" id="check1" /> There is sufficient access for the Rapid Plas truck (as shown) to allow delivery in a safe manner</li>
                <li style="list-style: none;"><input type="checkbox" name="check2" id="check2" /> Two (2) able helpers will be present to assist driver to manoeuvre tank into place</li>
                <li style="list-style: none;"><input type="checkbox" name="check3" id="check3" /> If driver is unable to deliver tank to final site, tank will be left at nearest possible location</li></ul>
                </p>
			</div>
			<div class="col-md-2">
				<button id="update" class="btn btn-green">
					Confirm and Save
				</button>
			</div>
				
			<div class="clearfix"></div>
		</div>		

	</div>
	<div class="clearfix"></div>
	<div class="mb-lg"></div>	
<!--	<script type="text/javascript" src="assets/js/global.js"></script>	-->
<?php
	}else{
		echo $auth->showAuthFailureMsg(); // authentication failure.
	}
}else{
	echo $auth->showMissingParamsMsg(); //  required parameters are missing.
}
?>
<script type="text/javascript">

/*$("#save").on("click",function(){ 
    
    if($("#result1").is(':empty')){
       console.log("ok"); 
    }else{
       console.log("ok1");
       $("#addd").css("border","2px solid #f00 !IMPORTANT");  
    }
});*/

</script>
</div>




</body>
</html>