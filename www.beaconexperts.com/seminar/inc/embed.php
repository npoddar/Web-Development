<?php

//session_start();
	
	if ($Video) {
				SecureLog::create(array('code' => 200, 'user' => $Self, 'data' => array('video' => $Video)));
				$MyVideo = $Video->getEmbed();
				//$_SESSION["user"] = $Video->getId();
				//echo $_SESSION["user"];
				//exit();
			}
			else{
				Print 'include the error here';
				//$_SESSION["user"] = $Video->getId();
				exit; }
				

	//Form Action
	if (isset($_POST['contact_submit'])) {
	//forms@neongoldfish.com
			// if (FormHelper::checkRequiredFields('contact_name','contact_email')) {
				if (FormHelper::isNotSpammer()) {
					$mailRecipients = array(
						'to' =>  'forms@neongoldfish.com',
						'cc' =>  '',
						'bcc' => '',
					);
					$mailSubject = 'Qualification Form';
					
					$mailBody = "";
					
					$mailBody .= "State: ".$_POST['video']['view']['state']."\r\n";
					$mailBody .= "Seminar Presenter: ".$_POST['video']['view']['seminarPresenter']."\r\n";
					$mailBody .= "Seminar Location: ".$_POST['video']['view']['seminarLocation']."\r\n";
					$mailBody .= "Applicant's Status: ".$_POST['video']['view']['status']."\r\n";
					$mailBody .= "Applicant's Name: ".$_POST['video']['view']['applicantName']."\r\n";
					$mailBody .= "Applicant's Age: ".$_POST['video']['view']['age']."\r\n";
					$mailBody .= "Family Member's Name: ".$_POST['video']['view']['familyMemberName']."\r\n";
					$mailBody .= "Daytime Phone: ".$_POST['video']['view']['daytimePhone']."\r\n";
					$mailBody .= "Email: ".$_POST['video']['view']['email']."\r\n";
					$mailBody .= "Gross Income (Monthly) \r\n";
					$mailBody .= "Social Security \t ".$_POST['video']['view']['veteran']['socialSecurity']."(Veteran)\t ".$_POST['video']['view']['spouse']['socialSecurity']."(Spouse)\r\n";
					$mailBody .= "Pension \t ".$_POST['video']['view']['veteran']['pension']."(Veteran)\t ".$_POST['video']['view']['spouse']['pension']."(Spouse)\r\n";
					$mailBody .= "Additional Income from other sources \t ".$_POST['video']['view']['veteran']['otherIncome']."(Veteran)\t ".$_POST['video']['view']['spouse']['otherIncome']."(Spouse)\r\n";
					$mailBody .= "Assets (excluding primary residence) \r\n";
					$mailBody .= "Approximate Net Worth \t ".$_POST['video']['view']['veteran']['appxNetWorth']."(Veteran) \t ".$_POST['video']['view']['spouse']['appxNetWorth']."(Spouse) \r\n";
					
					$mailBody .= "Own House: ".$_POST['video']['view']['ownHouse']."\r\n"; 
					$mailBody .= "Value of House: ".$_POST['video']['view']['houseValue']."\r\n";
					
					$mailBody .= "Expenses (Monthly) \r\n";
					$mailBody .= "Amount spent for community \t ".$_POST['video']['view']['veteran']['communitySpending']."(Veteran) \t ".$_POST['video']['view']['spouse']['communitySpending']."(Spouse) \r\n";
					$mailBody .= "Average living expenses (non-medical) \t ".$_POST['video']['view']['veteran']['livingExpenses']."(Veteran) \t ".$_POST['video']['view']['spouse']['livingExpenses']."(Spouse) \r\n";			
					
					$mailBody .= "Where does the applicant live: ".$_POST['video']['view']['communityName']."\r\n"; 
					
					$mailBody .= "Does applicant receive medical services: ".$_POST['video']['view']['medicalServices']."\r\n";
					
					$mailBody .= "Date of Military Entry: ".$_POST['video']['view']['militaryEntryDate']."\r\n";
					
					$mailBody .= "Date of Separation: ".$_POST['video']['view']['militaryEntryDate']."\r\n";		
					
					$h  = "From: Beacon Associates <forms@neongoldfish.com> \r\n";
					$h .= "Sender: Beacon Associates <forms@neongoldfish.com> \r\n";
					$h .= "Reply-To: Beacon Associates <forms@neongoldfish.com> \r\n";
					$h .= "X-Mailer: PHP/".phpversion();
					
					$mailHeaders = $h;
					
					
					//$mailHeaders = array(
					//			'From' => sprintf('"%s %s" <%s>', $Self->getFirstname(), $Self->getLastname(), $Self->getEmail()), );

					//$mailHeaders['Sender'] = $mailHeaders['Reply-to'] = $mailHeaders['From'];

					FormHelper::doLog();
					
					if( (mail('forms@neongoldfish.com','Seminar Video Form',$mailBody,$h)) === true ){
						//echo "In success";
						//exit();
						include 'mail-success.php';
						exit();
						//header('Location: mail-success.php');
						}
					else {
						//echo "Failure ";
						//exit();
						include "mail-failure.php";
						exit();
					//header('Location: mail-failure.php');
					}

					
				}
				exit();
				//Alert::show("Email successfully sent"); 
				//FormHelper::redirectTo('mail-success.php');
			//}
		
		//Alert::show("Email was not sent. Please contact your system administrator."); 
		//FormHelper::redirectTo('');
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Seminar Videos</title>
		<?php include 'private/section/head.php'; ?>
        
        <style>
		
		th{
			text-align:left;
		}
		
		div#body{
		height:auto !important;
		}
		
		td.table {
			/*width:125;*/
		}

		label{
		font-weight:normal;
		}
		
		label.heading {
		font-size:120%;
		font-weight:normal;
		}
		
		span.heading{
			font-size:120%;
			font-weight:bold;
		}
		
		select#radio, select#radio1, select#radio2, select#radio3, select#radio4{
		      width: 100%;
		}
		
		form{
		display:inline;
		}
		
			button.button{
			background-image: url("/seminar/img/private/button1.png");
			/*background-color:#333366;*/
			color:#FFFFFF;
			width: auto;
			height:auto;
			padding: 5px;
			font-weight:bold;
			margin-top:2px;
			}
			
			td.divider {
			
				border-bottom: 1.5px solid #EF7C22;
				border-collapse:collapse;
				padding:6px;
				/*padding-top:3px;
				padding-bottom:3px;*/
						
				}
		
		button.button{
			/*margin-top:2px;
			margin-bottom:2px*/
		}
		br{
		height:0px;
		line-height:0px;
		width:0px;
		}
		
		div#video{
			padding:8px;
			text-align:center;
		
		}
		
		</style>
        
	</head>
	<body>
		
		<?php include 'private/section/header.php'; ?>
		
		<div id="body_container">
			<div id="body">
					
				<?php Alert::show(); ?>
                
                <?php 
			   $path = $_SERVER['DOCUMENT_ROOT'];
			   $path .= "/beaconexperts.com/seminar/inc/private/page/seminarNav.php";
			   include_once($path);
			   
			   //include 'seminarNav.php'; ?>

				<h1>View Your Video</h1>
				
                <!--<embed width="420" height="315"
					src="http://www.youtube.com/v/XGSy3_Czz8k">-->

				<!-- <embed width="320" height="240" 
  						src=$MyVideo > -->
                        <div id="video"> 
                        	<?php Print $Video->getEmbed();   ?> 
                        </div>  
                        
                        <div id="clear"> </div>
                        
                        <h2> Online Application </h2> 
                        <p> The following will assist us in verifying your eligibility for the Aid and Attendance program. (Estimates are acceptable) </p>                 
                                                
                        <form title="Contact Me" class="generic_form_standard" method="post">
												<table width="662" border="0" cellpadding="2.3" cellspacing="0">
                                                <tr>
                                                <th><label class="" for="public_video_view_generalInfo">
													  <span class="heading">General Information:</span>
													  </label></th>
                                                      </tr>
                                                <tr>
                                                <th width="347"><label for="public_video_view_state">
												  State:
												 </label></th>
										    <td width="151" class="table">
		  <select id="radio1" class="input" size="1" name="video[view][state]" id="private_video_view_state" >
													        <option value= "None Selected"></option>
															<option value="AL">Alabama</option>
                                                            <option value="AK">Alaska</option>
                                                            <option value="AZ">Arizona</option>
                                                            <option value="AR">Arkansas</option>
                                                            <option value="CA">California</option>
                                                            <option value="CO">Colorado</option>
                                                            <option value="CT">Connecticut</option>
                                                            <option value="DE">Delaware</option>
                                                            <option value="DC">District Of Columbia</option>
                                                            <option value="FL">Florida</option>
                                                            <option value="GA">Georgia</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="ID">Idaho</option>
                                                            <option value="IL">Illinois</option>
                                                            <option value="IN">Indiana</option>
                                                            <option value="IA">Iowa</option>
                                                            <option value="KS">Kansas</option>
                                                            <option value="KY">Kentucky</option>
                                                            <option value="LA">Louisiana</option>
                                                            <option value="ME">Maine</option>
                                                            <option value="MD">Maryland</option>
                                                            <option value="MA">Massachusetts</option>
                                                            <option value="MI">Michigan</option>
                                                            <option value="MN">Minnesota</option>
                                                            <option value="MS">Mississippi</option>
                                                            <option value="MO">Missouri</option>
                                                            <option value="MT">Montana</option>
                                                            <option value="NE">Nebraska</option>
                                                            <option value="NV">Nevada</option>
                                                            <option value="NH">New Hampshire</option>
                                                            <option value="NJ">New Jersey</option>
                                                            <option value="NM">New Mexico</option>
                                                            <option value="NY">New York</option>
                                                            <option value="NC">North Carolina</option>
                                                            <option value="ND">North Dakota</option>
                                                            <option value="OH">Ohio</option>
                                                            <option value="OK">Oklahoma</option>
                                                            <option value="OR">Oregon</option>
                                                            <option value="PA">Pennsylvania</option>
                                                            <option value="RI">Rhode Island</option>
                                                            <option value="SC">South Carolina</option>
                                                            <option value="SD">South Dakota</option>
                                                            <option value="TN">Tennessee</option>
                                                            <option value="TX">Texas</option>
                                                            <option value="UT">Utah</option>
                                                            <option value="VT">Vermont</option>
                                                            <option value="VA">Virginia</option>
                                                            <option value="WA">Washington</option>
                                                            <option value="WV">West Virginia</option>
                                                            <option value="WI">Wisconsin</option>
                                                            <option value="WY">Wyoming</option>                                                                          
														  </select>	
                                                 </td>
												  </tr>
                                                  
                                                  <tr>
														<th><label for="public_video_view_seminarPresenter">
														Seminar Presenter:
														</label></th>
														<td class="table"><input class="input" name="video[view][seminarPresenter]" id="public_video_view_data" type="text" ></td>
													</tr> 
                                                    
                                                   <tr>
														<th><label for="public_video_view_seminarLocation">
														Seminar Location:
														</label></th>
														<td class="table"><input class="input" name="video[view][seminarLocation]" id="public_video_view_seminarLocation" type="text" ></td>
													</tr> 
                                                                                                        
                                                    <tr>
														<th><label for="private_user_view_applicantType">
														Is the Applicant a:
														</label></th>
														<td class="table">
											  			<select id="radio2" class="input"  size="1" name="video[view][status]" id="private_video_view_status" >
		                                                        <option value= "None Selected"></option>
																<option value= "Veteran"> Veteran</option>
																<option value="Surviving Spouse" >Surviving Spouse</option>
                                                                <option value="Both" >Both</option>                                                               
														</select>	
                                                        </td>
												  </tr>
                                                  
                                                <!-- <tr> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 //<td class="divider"> </td>
                                                 </tr>
												 <tr> 
												 <td> </td>
												 </tr> -->
                                                    
												<tr>
														<th><label for="public_video_view_applicantName">
														Applicant Name:
														</label></th>
														<td class="table"><input class="input" name="video[view][applicantName]" id="public_video_view_applicantName" type="text" ></td>
													</tr>   
                                                    
                                                <tr>
														<th><label for="public_video_view_applicantName">
														Age:
														</label></th>
														<td class="table"><input class="input" name="video[view][age]" id="public_video_view_age" type="text" ></td>
													</tr>  
                                                    
                                                    <div class="clear"> </div>
                                                  <div class="clear"> </div>
                                                  
                                                  
                                                <tr>
														<th><label for="public_video_view_applicantName">
														Family Member's Name:
														</label></th>
														<td class="table"><input class="input" name="video[view][familyMemberName]" id="public_video_view_familyMemberName" type="text" ></td>
													</tr>   
                                                    
                                                    <tr>
														<th><label for="public_video_view_daytimePhone">
														Daytime Phone:
														</label></th>
														<td class="table"><input class="input" name="video[view][daytimePhone]" id="public_video_view_daytimePhone" type="text" ></td>													</tr>   
                                                        
                                                    <tr>
														<th><label for="public_video_view_email">
														Email:
														</label></th>
														<td class="table"><input class="input" name="video[view][email]" id="public_video_view_email" type="text" ></td>
													</tr>
                                                    
                                                <tr class=""> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 <!--<td class="divider"> </td>-->
                                                 </tr>
												 <tr class=""> 
												 <td> </td>
												 </tr>
                                                    
                                                <tr>
													  <th><label class="" for="public_video_view_grossIncome">
													  <span class="heading">Gross Income</span> (Monthly):
													  </label></th>
                                                        <th><label class="" for="public_video_view_grossIncome">Veteran $</label></th>
                                                      <th width="144"><label class="" for="public_video_view_grossIncome">Spouse $ </label></th>
                                                  </tr>
                                                  
                                                       <tr> 
                                                       	<th><label for="public_video_view_ss">
                                                       	Social Security:
                                                       	</label></th>
														<td class="table"><input class="input" name="video[view][veteran][socialSecurity]" id="public_video_view_ssVeteran" type="text" ></td>
                                                        <td class="table"><input class="input" name="video[view][spouse][socialSecurity]" id="public_video_view_ssSpouse" type="text" ></td>
													</tr> 
                                                    
                                                     <tr> 
                                                       	<th><label for="public_video_view_pension">
                                                       	Pensions:
                                                       	</label></th>
														<td class="table"><input class="input" name="video[view][veteran][pension]" id="public_video_view_ssVeteran" type="text" ></td>
                                                        <td class="table"><input class="input" name="video[view][spouse][pension]" id="public_video_view_ssSpouse" type="text" ></td>
													</tr>

													<tr> 
                                                       	<th><label for="public_video_view_email">
                                                       	Income from other sources:
                                                       	</label></th>
														<td class="table"><input class="input" name="video[view][veteran][otherIncome]" id="public_video_view_ssVeteran" type="text" ></td>
                                                        <td class="table"><input class="input" name="video[view][spouse][otherIncome]" id="public_video_view_ssSpouse" type="text" ></td>
													</tr>
                                                    
                                                    <tr style="border-bottom: 1px solid #EF7C22;"> </tr>
                                                    
                                                 <tr class=""> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 <!--<td class="divider"> </td>-->
                                                 </tr>
												 <tr class=""> 
												 <td> </td>
												 </tr>
												 
                                                    <tr>
													  <th><label class="" for="public_video_view_grossIncome">
													 <span class="heading">Assets </span>(excluding primary residence):
													  </label></th>
													  <th><label class="" for="public_video_view_grossIncome">Veteran $</label></th>
														<th><label class="" for="public_video_view_grossIncome">Spouse $ </label></th>
                                                  
                                                    </tr>
                                                    <tr> 
                                                       	<th width=347><label for="public_video_view_email">
                                                       	  Approximate Net Worth: Ex: Checking, Savings, IRAs, CDs, Stocks, Bonds, Annuities, Mutual Funds, etc.
                                                       	</label>
														
														 											
														</th>
                                                        
													  <td class="table"><input class="input" name="video[view][veteran][appxNetWorth]" id="public_video_view_nwVeteran" type="text" ></td>
                                                        <td class="table"><input class="input" name="video[view][spouse][appxNetWorth]" id="public_video_view_nwSpouse" type="text" ></td>
													</tr>
                                                    
                                                    <tr>
														<th align="right"><label for="private_user_view_ownHouse">
														Own House:
														
														</label></th>
														<td width="151px" class="table" align="right">
											  			<select id="radio" width="157px" class="input"  size="1" name="video[view][ownHouse]" id="private_video_view_ownHouse" >
                                                       			 <option value= "None Selected"></option>
																<option value= "Yes"> Yes</option>
																<option value="No" > No </option>                                                                        
														</select>	
                                                        </td>
												  </tr>
                                                  
                                                  <tr>
														<th align="right"><label for="private_user_view_ownHouse">
														Value:														
														</label></th>																
                                                        <td class="table"><input class="input" name="video[view][houseValue]" id="public_video_view_houseValue" type="text" ></td>                                                        	
                                                        </td>
												  </tr>
                                                  
                                                  <!-- ------------------------------------------------------------ -->
                                                 
												 
												 <tr class=""> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 <!--<td class="divider"> </td>-->
                                                 </tr>
												 <tr class=""> 
												 <td> </td>
												 </tr>
                                                  
                                                  <tr>
													  <th><label class="" for="public_video_view_expenses">
													  <span class="heading">Expenses:</span>
													  </label></th>
													  
													 <th><label class="" for="public_video_view_grossIncome">Veteran $</label></th>
                                                     <th width="144"><label class="" for="public_video_view_grossIncome">Spouse $ </label></th>
                                                  												  
                                                    </tr>
                                                    <tr> 
                                                       	<th width=347><label for="public_video_view_communitySpending">
                                                       	  Amount spent for community
                                                       	</label></th>
														
														
                                                        
													  <td class="table"><input class="input" name="video[view][veteran][communitySpending]" id="public_video_view_VeteranCommunitySpending" type="text" ></td>
                                                        <td class="table"><input class="input" name="video[view][spouse][communitySpending]" id="public_video_view_SpouseCommunitySpending" type="text" ></td>
													</tr>
                                                    
                                                     <tr> 
                                                       	<th width=347><label for="public_video_view_livingExpenses">
                                                       	  Average living expenses (non-medical)
                                                          </label></th>
                                                        
													  <td class="table"><input class="input" name="video[view][veteran][livingExpenses]" id="public_video_view_veteran_livingExpenses" type="text" ></td>
                                                        <td class="table"><input class="input" name="video[view][spouse][livingExpenses]" id="public_video_view_spouse_livingExpenses" type="text" ></td>
													</tr> 
                                                    
                                                    <!-- ----------------------------------------------- -->
                                                    
                                                 <tr class=""> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 <!--<td class="divider"> </td>-->
                                                 </tr>
												 <tr class=""> 
												 <td> </td>
												 </tr>
                                                 
                                                    
                                                    <tr>
														<th align="right"><label for="private_user_view_ownHouse">
														Where does the applicant currently live?														
														</label></th>
														<td class="table" align="right">
											  			<select id="radio3" class="input"  size="1" name="video[view][ownHouse]" id="private_video_view_ownHouse" >
                                                        		<option value= "None Selected"></option>
																<option value= "At Home"> At Home</option>
																<option value="Independent Living" > Independent Living </option> 
                                                                <option value="Assisted Living" > Assisted Living </option>                                                                                                                        
														</select>	
                                                        </td>
												  </tr>
                                                  
                                                  <!-- ----------------------------------- -->
                                                  
                                                  <tr>
														<th><label for="public_video_view_seminarPresenter">
														Name of Community:
														</label>
                                                        </th>
														<td class="table"><input class="input" name="video[view][communityName]" id="public_video_view_cummunityName" type="text" ></td>
													</tr> 
                                                    
                                                    
                                                    <!-- ------------------------------------- -->
                                                    
                                                <tr class=""> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 <!--<td class="divider"> </td>-->
                                                 </tr>
												 <tr class=""> 
												 <td> </td>
												 </tr>
                                                 
                                                    
                                                    <tr>
														<th align="right"><label for="private_user_view_ownHouse">
														Does applicant receive any medical services?<br>
														i.e	bathing,	dressing,	eating	(cutting	food),	toileting,	etc.							
														</label></th>
														<td class="table" align="right">
											  			<select id="radio4"	class="input"  size="1" name="video[view][medicalServices]" id="private_video_view_medicalServices" >
                                                        		<option value= "None Selected"></option>
																<option value= "Yes"> Yes </option>
																<option value="Np" > No </option>                                                                                                                                                                        
														</select>	
                                                        </td>
												  </tr>
                                                  
                                                <tr class=""> 
                                                 <td class="divider"> </td>
												 <td class="divider"> </td>
												 <td class="divider"> </td>										
                                                 <!--<td class="divider"> </td>-->
                                                 </tr>
												 <tr class=""> 
												 <td> </td>
												 </tr>
                                                 
                                                  
                                                  <tr>
														<th><label for="public_video_view_militaryEntryDate">
														Date of Military Entry:
														</label>
                                                        </th>
														<td class="table"><input class="input" name="video[view][militaryEntryDate]" id="public_video_view_militaryEntryDate" type="text" ></td>
													</tr>
                                                    
                                                    <!-- ----------------------------------- -->
                                                    
                                                    <tr>
														<th><label for="public_video_view_separationDate">
														Date of Separation:
														</label>
                                                        </th>
														<td class="table"><input class="input" name="video[view][separationDate]" id="public_video_view_separationDate" type="text" ></td>
													</tr>
                                                    
                                                    <!-- ------------------------------------- --> 
                                                    
	                                                <tr>
													<th></th>
														<td><button class="button" name="contact_submit" type="submit">Submit</button></td>
													</tr>    
                                                                                    
                         	</table>
			  </form>             
                
                				

			</div>
		</div>
		
		<?php include 'private/section/footer.php'; ?>
		
	</body>
</html>