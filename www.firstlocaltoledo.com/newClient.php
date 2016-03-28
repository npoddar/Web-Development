<?php
	//Designed with ngfSkeleton 1.1
	include ("../inc/inc.php");
	$User->checkLogin();
	$User->getUserById($_SESSION['userID']);

if (isset($_POST['addClientBtn'])) {
			
$address = mysql_real_escape_string($_POST['address']);
$city = mysql_real_escape_string($_POST['city']);
$state = mysql_real_escape_string($_POST['state']);
$zip = preg_replace('#[^0-9]#i', '', $_POST['zip']); 
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$phone = mysql_real_escape_string($_POST['phone']);
$userLevel = "client";


if($_POST['vehicleMake'] == ''){
	$vehicleMake = 'No Make Entered';
	$vehicleModel = 'No Model Entered';
} else {
$vehicleModel = mysql_real_escape_string($_POST['vehicleModel']);
$vehicleMake = mysql_real_escape_string($_POST['vehicleMake']);
}



$vehicleYear = mysql_real_escape_string($_POST['vehicleYear']);
$vehicleDiesel = mysql_real_escape_string($_POST['vehicleDiesel']);

$vehicleIgnition = mysql_real_escape_string($_POST['vehicleIgnition']);
$vehicleManual = mysql_real_escape_string($_POST['vehicleManual']);


if($_POST['additional'] == ''){
	$additional = 'None';
} else {
$additional = mysql_real_escape_string($_POST['additional']);
}

if($_POST['productID'] == ''){
	$productID = '11';
} else {
$productID = mysql_real_escape_string($_POST['productID']);
}

if($_POST['timeblockID'] == ''){
	$_SESSION['message'] = '<h3 class="errorHdr">No time block was selected, OR date was changed</h3><br />';
$clientQuery = '';
$appointmentQuery = '';
} else {
$timeblockID = mysql_real_escape_string($_POST['timeblockID']);

$clientQuery = mysql_query("INSERT INTO client (productID, timeblockID, firstname, lastname, address, city, state, zip, phone, userLevel, enterDate, vehicleModel, vehicleMake, vehicleYear, vehicleDiesel, vehicleIgnition, vehicleManual, appointmentScheduled) VALUES ('$productID', '$timeblockID', '$firstname', '$lastname', '$address', '$city', '$state', '$zip', '$phone', '$userLevel', '$theDate', '$vehicleModel', '$vehicleMake', '$vehicleYear', '$vehicleDiesel', '$vehicleIgnition', '$vehicleManual', '1')") or die(mysql_error());
$clientID = mysql_insert_id();

$Timeblock->getTimeblockById($timeblockID);
$appointmentTime = $Timeblock->getStartTime();
$appointmentDate = date("Y-m-d",strtotime($_POST["appointmentDate"]));

$appointmentQuery = mysql_query("INSERT INTO appointments (productID, additional, clientID, timeblockID, appointmentDate, appointmentTime, addedDate, vip) VALUES ('$productID', '$additional', '$clientID', '$timeblockID', '$appointmentDate', '$appointmentTime', '$theDate', '0')") or die(mysql_error());
$appointmentID = mysql_insert_id();

header("location: appView.php?appointmentID=$appointmentID");
exit();
}}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Car Stereo One Dashboard</title>
<?php include '../inc/backend/css.php'; ?>
<?php include '../inc/backend/js.php'; ?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

<script type="text/javascript" src="/js/global/vehicle.js"></script>
<script type="text/javascript">
	$(function(){
		vehicleInit($('#checkout_vehicle_make'), $('#checkout_vehicle_model'));
		$("#newDate").datepicker({ minDate: 0, dateFormat: "yy-mm-dd" });
	});
</script>
 <script type="text/javascript">

$(document).ready(function(){



$("#addClientForm").submit(function() {
      if ($("#firstname").val() == "") {
		$("#firstname").addClass("errorHint");
        $("#required").addClass("errorTxt");
        return false;
      }else if ($("#lastname").val() == "") {
		$("#lastname").addClass("errorHint");
        $("#required").addClass("errorTxt");
        return false;
      }else if ($("#phone").val() == "") {
		$("#phone").addClass("errorHint");
        $("#required").addClass("errorTxt");
        return false;
      }else if ($("#vehicleYear").val() == "") {
		$("#vehicleYear").addClass("errorHint");
        return false;
      }else if ($("#newDate").val() == "") {
		$("#newDate").addClass("errorHint");
        $("#newDateLbl").addClass("errorTxt");
        return false;
      }else if ($("#timeblockID").val() == "") {
		$("#timeblockID").addClass("errorHint");
        return false;
      }else {
	  return true;
	  }
});

//
$("#addClientBtn").attr('disabled', 'disabled');
$("#btnMsg").text("Select All Vehicle Information to Enter Appointment");

$("#checkout_vehicle_make").change(function() {
	$("#vehicleModelLbl").addClass("errorTxt");
});
$("#checkout_vehicle_model").change(function() {
	$("#addClientBtn").removeAttr("disabled");
	$("#vehicleModelLbl").removeClass("errorTxt");
	$("#btnMsg").text("");
});

$("#newDate").click(function() {
		$("#newDate").removeClass("errorHint");
        $("#newDateLbl").removeClass("errorTxt");
		//$('#timeblockID').selectedIndex = 0;
		$('#timeblockID option[value=""]').attr("selected",true);
});

//Clear errors
$("input").click(function() {
		$(this).removeClass("errorHint");
        $("#required").removeClass("errorTxt");
});
$("select").change(function() {
	$(this).removeClass("errorHint");
});

/*$("#findDateBtn").click(function() {
 $("#newDate").attr('readonly', true);
});	*/


});

 
function showDates(){
var startDate = document.getElementById('newDate').value;
	
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("timeblockID").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","_times.php?eventStartDate="+startDate);
xmlhttp.send();
}

function noDates(){
var newHTML = "<option selected='selected' value=''></option>";
document.getElementById("timeblockID").innerHTML= newHTML;
}

</script>
<style type="text/css"> 
.errorHdr {margin-bottom:10px; color:#900;}
.errorTxt {color:#900;}
#formErrors {color:#900;}
.errorHint {border:solid 2px #900;}
.darker {font-weight:bold;}
#additional {width:194px;}
#btnMsg {color:#999999;}
</style> 	
</head>

<body>
    <div id="header_container">
	<div id="header"><a href="index.php"><img src="../img/global/logo.png" /></a>
	</div>
    </div>
    
    <div id="navigation_container">
        <div id="navigation">
            <a href="index.php">Home</a>
            <a href="calendar.php">Calendar</a>
            <a href="appNone.php">Unscheduled</a>
            <a href="newClient.php">Schedule Appointment</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div id="content_container">
        <div id="contentMain">
            <div id="primary_container">

                    	<h1>Schedule Appointment</h1><br />

<?php if (isset($_SESSION['message'])) {
	echo $_SESSION['message']; 
	unset($_SESSION['message']);
} else {
	unset($_SESSION['message']);
	$_SESSION['message'] = "";
}?>
                        
<form action="" name="addClientForm" id="addClientForm" method="post">
<fieldset class="wideLable">
<h3>General Info (<span class="required" id="required">* = Required</span>)</h3>
<label for="firstname">First Name</label>
<input name="firstname" id="firstname" type="text" value="<?php if(isset($firstname)){ echo $firstname;}?>" /><span class="required"> *</span><br />
<label for="lastname">Last Name</label>
<input name="lastname" id="lastname" type="text" value="<?php if(isset($lastname)){ echo $lastname;}?>" /><span class="required"> *</span><br />

<label for="phone">Phone</label>
<input name="phone" id="phone" type="text" value="<?php if(isset($phone)){ echo $phone;}?>" /><span class="required"> *</span><br />
<label for="address">Address</label>
<input name="address" id="address" type="text" value="<?php if(isset($address)){ echo $address;}?>" />
<br />
<label for="city">City</label>
<input name="city" id="city" type="text" value="<?php if(isset($city)){ echo $city;}?>" />
<br />
<label for="state">State</label>
<input name="state" id="state" type="text" value="OH" />
<br />
<label for="zip">Zip</label>
<input name="zip" id="zip" type="text" value="<?php if(isset($zip)){ echo $zip;}?>" />
<br />


</fieldset>
<br />
<fieldset class="wideLable">
<h3>Vehicle Info</h3>
<label for="vehicleMake">Make</label>
<select name="vehicleMake" id="checkout_vehicle_make">
<option value="" selected="selected">Select Vehicle Make</option>
</select><span class="required"> *</span><br />

<label for="vehicleModel" id="vehicleModelLbl">Model</label>

<select name="vehicleModel" id="checkout_vehicle_model"></select><span id="checkout_vehicle_modelMsg" class="required"> *</span><br />


<label for="vehicleYear">Year</label>
<select name="vehicleYear" id="vehicleYear">
<option selected="selected" value="">Select Year</option>
<?php 

for($newYear = date('Y')+1; $newYear > 1968; $newYear--){
echo "<option value='".$newYear."'>".$newYear."</option>";
}

?>
</select><span class="required"> *</span><br />

<label for="vehicleDiesel">Deisel</label>
<select name="vehicleDiesel" id="vehicleDiesel">
<option selected="selected" value="0">No</option>
<option value="1">Yes</option>
</select>
<br />

<label for="vehicleIgnition">Push Button Start</label>
<select name="vehicleIgnition" id="vehicleIgnition">
<option selected="selected" value="0">No</option>
<option value="1">Yes</option>
</select>
<br />

<label for="vehicleManual">Transmission</label>
<select name="vehicleManual" id="vehicleManual">
<option selected="selected" value="0">Automatic</option>
<option value="1">Manual</option>
</select>
<br />
</fieldset>


<br />
<fieldset class="wideLable">
<h3>Products &amp; Installation Details</h3>

<label for="productID">Product</label>
  <select name="productID" id="productID">
  <option selected="selected" value="">Select...</option>
  <?php 
 $eventQuery = mysql_query("SELECT * FROM products") or die(mysql_error());
				while($row = mysql_fetch_array($eventQuery))
				{
				 $productID = intval($row['productID']);
				 $productName = strip_tags($row['productName']);
				 $price = strip_tags($row['price']);
				 echo '<option value="'.$productID.'">'.$productName.' '.$price.'</option>';
	} 
  
  
  ?>
  </select>
<br class="clear" />
<label for="additional">Details</label>

<textarea name="additional" cols="" rows="4" id="additional"><?php if(isset($additional)){ echo $additional;}?></textarea>
<br />
<br />

<table width="100%" border="0">
  <tr>
    <td colspan="2"><span id="newDateLbl" class="darker">Schedule Time & Date</span></td>
    </tr>
  <tr>
    <td width="27%"><input name="appointmentDate" type="text" id="newDate" value="" readonly="readonly" onclick="noDates()" /></td>
    <td width="73%"><input type="button" name="findDateBtn" id="findDateBtn" value="Find Open Slot" onclick="showDates()" /></td>
  </tr>
</table>

<div id="timeblocks">
<select name="timeblockID" id="timeblockID">
<option selected="selected" value="">View Open Times</option>
</select>
</div><br />
</fieldset><br />

<fieldset class="wideLable">
<span id="endErrorMsg"></span>
<span id="btnMsg"></span>
<input name="addClientBtn" id="addClientBtn" type="submit" value="Enter Information" />
</fieldset>
</form>
<p>&nbsp;</p>
            </div>
            <!--#primary_container-->  
            
<?php include("_sidebar.php"); ?>    
            
            <!--#secondary_container-->
            <div class="clear"></div>
		</div><!--#content-->  
	</div><!--#content_container-->  
    <div id="footer_container">
        <div id="footer">
            
        </div><!--#footer-->
    </div><!--#footer_container-->
</body>
</html>
