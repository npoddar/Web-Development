<?php 
if(isset($_POST['SaveAccount'])){

if(trim(strtolower($_POST['captcha'])) == '' || trim(strtolower($_POST['captcha'])) == 'Enter text from above here'){
 $_SESSION['response'] = '<span class="errorTxt">Please enter all information.</span>';
 header('Location: http://www.beaconhealthquote.com/auto-quote-form.php');
} else {

$message = '<html><body>';
  $message .=  ' 
  <h3>Primary Insureds Info:</h3>
  
  <table width="100%" border="0">
  <tr>
    <td width="12%">Quote For:</td>
    <td width="31%">'.strip_tags($_POST['quoteFor']).'</td>
    <td width="15%">Home Phone:</td>
    <td width="42%">'.strip_tags($_POST['homePhone']).'</td>
  </tr>
  <tr>
    <td>Address:</td>
    <td>'.strip_tags($_POST['address']).'</td>
    <td>Cell Phone:</td>
    <td>'.strip_tags($_POST['cell']).'</td>
  </tr>
  <tr>
    <td>City:</td>
    <td>'.strip_tags($_POST['city']).'</td>
    <td>Work Phone:</td>
    <td>'.strip_tags($_POST['workPhone']).'</td>
  </tr>
  <tr>
    <td>State:</td>
    <td>'.strip_tags($_POST['state']).'</td>
    <td>Notes:</td>
    <td rowspan="4">'.strip_tags($_POST['notes']).'</td>
  </tr>
  <tr>
    <td>Zip:</td>
    <td>'.strip_tags($_POST['zip']).'</td>
    <td rowspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td>County:</td>
    <td>'.strip_tags($_POST['county']).'</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
</table>

<h3>Drivers Info:</h3>

<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Driver 1</td>
    <td colspan="2">Driver 2</td>
    <td colspan="2">Driver 3</td>
  </tr>
  <tr>
    <td width="12%">First Name</td>
    <td colspan="2">'.strip_tags($_POST['driver1name']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2name']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3name']).'</td>
  </tr>
  <tr>
    <td>Middle name</td>
    <td colspan="2">'.strip_tags($_POST['driver1Midname']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2Midname']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3Midname']).'</td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td colspan="2">'.strip_tags($_POST['driver1lastname']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2lastname']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3lastname']).'</td>
  </tr>
  <tr>
    <td>Age &amp; Date of Birth</td>
    <td width="5%">Yrs
      '.strip_tags($_POST['driver1Age']).'</td>
    <td width="26%">
    '.strip_tags($_POST['driver1_dob_month']).'-'.strip_tags($_POST['driver1_dob_day']).'-'.strip_tags($_POST['driver1_dob_year']).'</td>
    <td width="5%">Yrs
      '.strip_tags($_POST['driver2Age']).'</td>
    <td width="23%">'.strip_tags($_POST['driver2_dob_month']).'-'.strip_tags($_POST['driver2_dob_day']).'-'.strip_tags($_POST['driver2_dob_year']).'</td>
    <td width="5%">Yrs
      '.strip_tags($_POST['driver3Age']).'</td>
    <td width="24%">'.strip_tags($_POST['driver3_dob_month']).'-'.strip_tags($_POST['driver3_dob_day']).'-'.strip_tags($_POST['driver3_dob_year']).'</td>
  </tr>
  <tr>
    <td>Gender:</td>
    <td colspan="2">'.strip_tags($_POST['driver1sex']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2sex']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3sex']).'</td>
  </tr>
  <tr>
    <td>S.S.#</td>
    <td colspan="2">'.strip_tags($_POST['driver1SSN']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2SSN']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3SSN']).'</td>
  </tr>
  <tr>
    <td>DL# &amp; State:</td>
    <td colspan="2">'.strip_tags($_POST['driver1LIC']).' 
    '.strip_tags($_POST['driver1State']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2LIC']) .' 
    '.strip_tags($_POST['driver2State']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3LIC']) .' 
    '.strip_tags($_POST['driver3State']).'</td>
  </tr>
  <tr>
    <td>Prior Insurance Carrier:</td>
    <td colspan="2">'.strip_tags($_POST['driver1PriorIns']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2PriorIns']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3PriorIns']).'</td>
  </tr>
  <tr>
    <td>Prior Policy #</td>
    <td colspan="2">'.strip_tags($_POST['driver1PriorPolicy']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2PriorPolicy']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3PriorPolicy']).'</td>
  </tr>
  <tr>
    <td>Prior Ins. Months:</td>
    <td colspan="2">'.strip_tags($_POST['driver1InsrMonths']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2InsrMonths']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3InsrMonths']).'</td>
  </tr>
  <tr>
    <td>Miles to Work:</td>
    <td colspan="2">'.strip_tags($_POST['driver1WorkMi']).' 

      </select>
    </select></td>
    <td colspan="2">'.strip_tags($_POST['driver2WorkMi']).' 
      </select>
      </select></td>
    <td colspan="2">'.strip_tags($_POST['driver3WorkMi']).' 
      </select>
      </select></td>
  </tr>
  <tr>
    <td>Occupation:</td>
    <td colspan="2">'.strip_tags($_POST['driver1Job']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2Job']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3Job']).'</td>
  </tr>
  <tr>
    <td>Good Student</td>
    <td colspan="2">'.strip_tags($_POST['driver1Student']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver2Student']).'</td>
    <td colspan="2">'.strip_tags($_POST['driver3Student']).'</td>
  </tr>
  <tr>
    <td>Citations/Accidents:</td>
    <td colspan="2">'.strip_tags($_POST['driver1Accidents']).'  Accidents</td>
    <td colspan="2">'.strip_tags($_POST['driver2Accidents']).'  Accidents</td>
    <td colspan="2">'.strip_tags($_POST['driver3Accidents']).'  Accidents</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">'.strip_tags($_POST['driver1Citation']).'  Citations</td>
    <td colspan="2">'.strip_tags($_POST['driver2Citation']).'  Citations</td>
    <td colspan="2">'.strip_tags($_POST['driver3Citation']).'  Citations</td>
  </tr>
</table>


<h3>Vehicle Info:</h3>
<table width="100%" border="0">
  <tr>
    <td>&nbsp;</td>
    <td>Vehicle 1</td>
    <td>Vehicle 2</td>
    <td>Vehicle 3</td>
  </tr>
  <tr>
    <td width="12%">Year:</td>
    <td>'.strip_tags($_POST['vehicle1Year']).'</td>
    <td>'.strip_tags($_POST['vehicle2Year']).'</td>
    <td>'.strip_tags($_POST['vehicle3Year']).'</td>
  </tr>
  <tr>
    <td>Make:</td>
    <td>'.strip_tags($_POST['vehicle1Make']).'</td>
    <td>'.strip_tags($_POST['vehicle2Make']).'</td>
    <td>'.strip_tags($_POST['vehicle3Make']).'</td>
  </tr>
  <tr>
    <td>Model:</td>
    <td>'.strip_tags($_POST['vehicle1Model']).'</td>
    <td>'.strip_tags($_POST['vehicle2Model']).'</td>
    <td>'.strip_tags($_POST['vehicle3Model']).'</td>
  </tr>
  <tr>
    <td>V.I.N. #</td>
    <td>'.strip_tags($_POST['vehicle1VIN']).'</td>
    <td>'.strip_tags($_POST['vehicle2VIN']).'</td>
    <td>'.strip_tags($_POST['vehicle3VIN']).'</td>
  </tr>
  <tr>
    <td>Limits of Liability:</td>
    <td>'.strip_tags($_POST['vehicle1LiaLimit']).'</td>
    <td>'.strip_tags($_POST['vehicle1LiaLimit']).'</td>
    <td>'.strip_tags($_POST['vehicle1LiaLimit']).'</td>
  </tr>
  <tr>
    <td>Comp/Collision:</td>
    <td>'.strip_tags($_POST['name37']).'</td>
    <td>'.strip_tags($_POST['name38']).'</td>
    <td>'.strip_tags($_POST['name39']).'</td>
  </tr>
  <tr>
    <td>Usage:</td>
    <td>'.strip_tags($_POST['vehicle1Usage']).'</td>
    <td>'.strip_tags($_POST['vehicle2Usage']).'</td>
    <td>'.strip_tags($_POST['vehicle3Usage']).'</td>
  </tr>
  <tr>
    <td>Loss of Use::</td>
    <td>'.strip_tags($_POST['vehicle1LossUse']).'</td>
    <td>'.strip_tags($_POST['vehicle2LossUse']).'</td>
    <td>'.strip_tags($_POST['vehicle3LossUse']).'</td>
  </tr>
  <tr>
    <td>Towing:</td>
    <td>'.strip_tags($_POST['vehicle1Towing']).'</td>
    <td>'.strip_tags($_POST['vehicle2Towing']).'</td>
    <td>'.strip_tags($_POST['vehicle3Towing']).'</td>
  </tr>
  <tr>
    <td>Non-Factory Parts:</td>
    <td>'.strip_tags($_POST['nonFacParts']).'</td>
    <td>'.strip_tags($_POST['nonFacParts2']).'</td>
    <td>'.strip_tags($_POST['nonFacParts3']).'</td>
  </tr>
  <tr>
    <td>Price/Description:</td>
    <td>'.strip_tags($_POST['nonFacDescr']).'</td>
    <td>'.strip_tags($_POST['nonFacDescr2']).'</td>
    <td>'.strip_tags($_POST['nonFacDescr3']).'</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

<h3>Lien Holder Info:</h3>
<table width="100%" border="0">
  <tr>
    <td width="12%">Vehicle 1:</td>
    <td width="76%">'.strip_tags($_POST['vehicle1Lien']).'</td>
    <td width="12%">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Vehicle 2:</td>
    <td>'.strip_tags($_POST['vehicle2Lien']).'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Vehicle 3:</td>
    <td>'.strip_tags($_POST['vehicle3Lien']).'</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
';
$to = 'rwise@beaconexperts.com';
$message .= "</body></html>";
$subject = "Auto Quote Form Generated";
$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
$headers .= "CC: dre.board@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
mail('dre.board@gmail.com', $subject, $message, $headers);

header('Location: http://www.beaconhealthquote.com');
exit();

}

}
?>

