<?php
session_start();
include('../connect/connect3.php'); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Bootstrap CSS --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link href="../web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">

	<title>Customer Service Request Form</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/progressbar.css">
	<link rel="shortcut icon" type="image/x-icon" href="../img/bosch.png" />

	<script type="text/javascript">
		function yesnoCheck() {
			if (document.getElementById('yesCheck').checked) {
				document.getElementById('ifYes').style.display = null;
				document.getElementById('ifNo').style.display = 'none';
			} else if (document.getElementById('noCheck').checked) {
				document.getElementById('ifNo').style.display = null;
				document.getElementById('ifYes').style.display = 'none';
			} 
		}
		function checkvalue(val)
		{
		    if(val==="others")
		       document.getElementById('cloudServiceProvider_others').style.display='block';
		    else
		       document.getElementById('cloudServiceProvider_others').style.display='none'; 
		}

		window.setTimeout(function() {
		    $(".alert").fadeTo(500, 0).slideUp(500, function(){
		        $(this).remove(); 
		    });
		}, 4000);
	</script>	
</head>

<body>
	<div class="container-fluid">
		<!---------------------------
		<div class="sidebar">
			<div class="logo"><img src="img/logo.png"></div>
			<ul>
				<li><a href="1.php"><i class="fa fa-user"></i>&nbsp;&nbsp;&nbsp;Requester Information</a></li>
				<li><a href="2.php"><i class="fas fa-poll-h"></i>&nbsp;&nbsp;&nbsp;Strategy</a></li>		
				<li class="active"><a href="3.php"><i class="fas fa-cloud"></i>&nbsp;&nbsp;Cloud Service Provider</a></li>
				</ul>
		</div>
		-------------------------------->
		<div class="header">
					<div class="ribbon"><img src="../img/bosch_ribbon.png"></div>
					<div class="navbar">
						<div class="row justify-content-between"> 
							<div class="col-4">
								<div class="logo">
									<img class="navbar-brand" src="../img/logo.png">
								</div>
							</div>
							<div class="col-4">
								<div class="home_href">
									<a href="../index.php"><i class="fas fa-home"></i>&nbsp;Home</a>
								</div>
							</div>
						</div>																								
					</div>
					<h2>RBEI Cloud Customer Service Request Form</h2>									
		</div>
		<!-----------------------Progress Bar ----------------------->
					<div class="progress">
					  <div class="circle done">
					    <span class="label">✓</span>
					    <span class="title">Basic</span>					    
					  </div>	
					  <span class="bar done"></span>				  
					  <div class="circle done">
					    <span class="label">✓</span>
					    <span class="title">Strategy</span>
					  </div>	
					  <span class="bar active"></span>				  
					  <div class="circle active">
					    <span class="label">3</span>
					    <span class="title">Service</span>
					  </div>
					  <span class="bar"></span>
					  <div class="circle">
					    <span class="label">4</span>
					    <span class="title">Stage 2</span>
					  </div>					  
					</div>
		<!-----------------------Progress Bar ----------------------->
		<div class="main">
			<div class="content">
				<?php if (isset($_SESSION['success2'])) : ?>
					      <div class="alert alert-success" role="alert">
					      	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>					      	
					          <?php 
					          	echo $_SESSION['success2']; 
					          	unset($_SESSION['success2']);
					          ?>					      	
					      </div>
				<?php endif ?>
				<!-- Modal ---------------------
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title" id="exampleModalLongTitle">Confirm !</h4>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">					      	
					      	<br>					        
					        Are you sure you want to go to Stage 2 ?
					        <br>
					        <br>
					      </div>
					      <div class="modal-footer">
					      	<button type="button" class="btn btn-primary" style="float: left;" >Save changes</button>					      							
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>					        
					        <a href="../Stage 2/5.html" type="button" class="btn btn-success">Confirm</a>

					      </div>
					    </div>
					  </div>
					</div>
				--------------------------------->
					<form id="cloudServiceProvider" action="3.php" method="POST">		
							<h3>Cloud Service Provider</h3>							
							<br>
							<label for="yes_no_radio" class="required">Do you have existing cloud service subscription ? </label>
								<input type="radio" class="radioBtn" onclick="javascript:yesnoCheck();" name="yesno" id="yesCheck" value="Yes"  required>Yes &nbsp;&nbsp;
								<input type="radio" class="radioBtn" onclick="javascript:yesnoCheck();" name="yesno" id="noCheck" value="No" required>No <br>
							<br>							
							<div id="ifYes" style="display:none">								
								<fieldset>
									 <h4><b>Provide description:</b></h4>
									 <br>
									 	<div class="row">
									 		<div class="col col-md-4 col-lg-2">
									 			<label class="required" for="provider" type="text">&nbsp;Cloud Service Provider:</label>
									 		</div>
									 		<div class="col col-md-6 col-lg-5">
									 			<input id="provider" class="form-control input-sm" name="provider" value="<?php echo $provider; ?>" type="text">
									 		</div>									 		
									 	</div>
									 	<br>
									 	<div class="row">
									 		<div class="col col-md-4 col-lg-2">
									 			<label class="required" for="provider" type="text">&nbsp;Tennant ID:</label>
									 		</div>
									 		<div class="col col-md-6 col-lg-5">
									 			<input id="provider" class="form-control input-sm" name="tennant_id" value="<?php echo $tennant_id; ?>"type="text">
									 		</div>									 		
									 	</div>
									 	<br>
									 	<div class="row">
									 		<div class="col col-md-4 col-lg-2">
									 			<label class="required" for="provider" type="text">&nbsp;Account ID:</label>
									 		</div>
									 		<div class="col col-md-6 col-lg-5">
									 			<input id="provider" class="form-control input-sm" name="account_id" value="<?php echo $account_id; ?>" type="text">
									 		</div>									 		
									 	</div>
									 	<br>
									 	<div class="row">
									 		<div class="col col-md-4 col-lg-2">
									 			<label class="required" for="provider" type="text">&nbsp;Subscription Name:</label>
									 		</div>
									 		<div class="col col-md-6 col-lg-5">
									 			<input id="provider" class="form-control input-sm" name="subscription_name" value="<?php echo $subscription_name; ?>" type="text">
									 		</div>									 		
									 	</div>
									 	<br>
									 	<div class="row">
									 		<div class="col col-md-4 col-lg-2">
									 			<label class="required" for="provider" type="text">&nbsp;Subscription ID:</label>
									 		</div>
									 		<div class="col col-md-6 col-lg-5">
									 			<input id="provider" class="form-control input-sm" name="subscription_id" value="<?php echo $subscription_id; ?>" type="text">
									 		</div>									 		
									 	</div>
									 	<br>
									 	<div class="row">
									 		<div class="col col-md-4 col-lg-2">
									 			<label class="required" for="provider" type="text">&nbsp;Subscription Owner:</label>
									 		</div>
									 		<div class="col col-md-6 col-lg-5">
									 			<input id="provider" class="form-control input-sm" name="subscription_owner" value="<?php echo $subscription_owner; ?>" type="text">
									 		</div>									 		
									 	</div>											
										<br>
										<div class="row">
											<div class="col col-md-4 col-lg-2">
												<label for="csp_description1" class="required">Description:</label>			
											</div>
											<div class="col col-md-8 col-lg-10">
												<textarea id="csp_description1" class="form-control input-sm" name="description" minlength="20" rows="5" ><?php echo $description; ?></textarea>	
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col col-md-4 col-lg-2">
												<label for="csp_description2" class="required">What can we do to accommodate you?</label>																														
											</div>
											<div class="col col-md-8 col-lg-10">
												<textarea id="csp_description2" class="form-control input-sm" name="accommodate" minlength="20" rows="5" ><?php echo $accommodate; ?></textarea>	
												<br>
											</div>																				
										</div>									
								</fieldset>
							</div>
							<div id="ifNo" style="display:none">
								<fieldset>
									<h4><b>Provide required details</b></h4>
									<br>
									<div class="row">
										<div class="col col-md-4 col-lg-3">
											<label for="cloudServiceProvider" class="required">Select Cloud Service Provider:</label>
										</div>
										<div class="col col-md-6 col-lg-5">
											<select name="cs_provider" class="form-control input-sm" onchange='checkvalue(this.value)' value="<?php echo $cs_provider; ?>">
												<option value="default" disabled selected hidden>--select--</option>
												<option value="aws">Amazon Web Services</option>
												<option value="azure">Microsoft Azure</option>
												<option value="googleapis">Google Cloud Services</option>
												<option value="digitalOcean">Digital Ocean</option>
												<option value="others">Others</option>
											</select>											
										</div>											
									</div>									
									<div class="row">
										<br>
										<div class="col col-md-4 col-lg-3">											
										</div>
										<div class="col col-md-6 col-lg-5">
											<input class="form-control input-sm" type="text" name="others" id="cloudServiceProvider_others" placeholder="others" value="<?php echo $others; ?>" style='display:none;'/>
										</div>									
									</div>								
									<br>
									<div class="row">
										<div class="col col-md-4 col-lg-3">
											<label class="required" for="region">Select region cloud service to be deployed:</label>								
										</div>
										<div class="col col-md-6 col-lg-5">
											<select name="deployed" id="region" class="form-control input-sm" value="<?php echo $deployed; ?>">
												<option value="default" disabled selected hidden>--select--</option>
												<option value="AF">Afghanistan</option>
												<option value="AL">Albania</option>
												<option value="DZ">Algeria</option>
												<option value="AS">American Samoa</option>
												<option value="AD">Andorra</option>
												<option value="AG">Angola</option>
												<option value="AI">Anguilla</option>
												<option value="AG">Antigua &amp; Barbuda</option>
												<option value="AR">Argentina</option>
												<option value="AA">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="AU">Australia</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BS">Bahamas</option>
												<option value="BH">Bahrain</option>
												<option value="BD">Bangladesh</option>
												<option value="BB">Barbados</option>
												<option value="BY">Belarus</option>
												<option value="BE">Belgium</option>
												<option value="BZ">Belize</option>
												<option value="BJ">Benin</option>
												<option value="BM">Bermuda</option>
												<option value="BT">Bhutan</option>
												<option value="BO">Bolivia</option>
												<option value="BL">Bonaire</option>
												<option value="BA">Bosnia &amp; Herzegovina</option>
												<option value="BW">Botswana</option>
												<option value="BR">Brazil</option>
												<option value="BC">British Indian Ocean Ter</option>
												<option value="BN">Brunei</option>
												<option value="BG">Bulgaria</option>
												<option value="BF">Burkina Faso</option>
												<option value="BI">Burundi</option>
												<option value="KH">Cambodia</option>
												<option value="CM">Cameroon</option>
												<option value="CA">Canada</option>
												<option value="IC">Canary Islands</option>
												<option value="CV">Cape Verde</option>
												<option value="KY">Cayman Islands</option>
												<option value="CF">Central African Republic</option>
												<option value="TD">Chad</option>
												<option value="CD">Channel Islands</option>
												<option value="CL">Chile</option>
												<option value="CN">China</option>
												<option value="CI">Christmas Island</option>
												<option value="CS">Cocos Island</option>
												<option value="CO">Colombia</option>
												<option value="CC">Comoros</option>
												<option value="CG">Congo</option>
												<option value="CK">Cook Islands</option>
												<option value="CR">Costa Rica</option>
												<option value="CT">Cote D'Ivoire</option>
												<option value="HR">Croatia</option>
												<option value="CU">Cuba</option>
												<option value="CB">Curacao</option>
												<option value="CY">Cyprus</option>
												<option value="CZ">Czech Republic</option>
												<option value="DK">Denmark</option>
												<option value="DJ">Djibouti</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="TM">East Timor</option>
												<option value="EC">Ecuador</option>
												<option value="EG">Egypt</option>
												<option value="SV">El Salvador</option>
												<option value="GQ">Equatorial Guinea</option>
												<option value="ER">Eritrea</option>
												<option value="EE">Estonia</option>
												<option value="ET">Ethiopia</option>
												<option value="FA">Falkland Islands</option>
												<option value="FO">Faroe Islands</option>
												<option value="FJ">Fiji</option>
												<option value="FI">Finland</option>
												<option value="FR">France</option>
												<option value="GF">French Guiana</option>
												<option value="PF">French Polynesia</option>
												<option value="FS">French Southern Ter</option>
												<option value="GA">Gabon</option>
												<option value="GM">Gambia</option>
												<option value="GE">Georgia</option>
												<option value="DE">Germany</option>
												<option value="GH">Ghana</option>
												<option value="GI">Gibraltar</option>
												<option value="GB">Great Britain</option>
												<option value="GR">Greece</option>
												<option value="GL">Greenland</option>
												<option value="GD">Grenada</option>
												<option value="GP">Guadeloupe</option>
												<option value="GU">Guam</option>
												<option value="GT">Guatemala</option>
												<option value="GN">Guinea</option>
												<option value="GY">Guyana</option>
												<option value="HT">Haiti</option>
												<option value="HW">Hawaii</option>
												<option value="HN">Honduras</option>
												<option value="HK">Hong Kong</option>
												<option value="HU">Hungary</option>
												<option value="IS">Iceland</option>
												<option value="IN">India</option>
												<option value="ID">Indonesia</option>
												<option value="IA">Iran</option>
												<option value="IQ">Iraq</option>
												<option value="IR">Ireland</option>
												<option value="IM">Isle of Man</option>
												<option value="IL">Israel</option>
												<option value="IT">Italy</option>
												<option value="JM">Jamaica</option>
												<option value="JP">Japan</option>
												<option value="JO">Jordan</option>
												<option value="KZ">Kazakhstan</option>
												<option value="KE">Kenya</option>
												<option value="KI">Kiribati</option>
												<option value="NK">Korea North</option>
												<option value="KS">Korea South</option>
												<option value="KW">Kuwait</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="LA">Laos</option>
												<option value="LV">Latvia</option>
												<option value="LB">Lebanon</option>
												<option value="LS">Lesotho</option>
												<option value="LR">Liberia</option>
												<option value="LY">Libya</option>
												<option value="LI">Liechtenstein</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="MO">Macau</option>
												<option value="MK">Macedonia</option>
												<option value="MG">Madagascar</option>
												<option value="MY">Malaysia</option>
												<option value="MW">Malawi</option>
												<option value="MV">Maldives</option>
												<option value="ML">Mali</option>
												<option value="MT">Malta</option>
												<option value="MH">Marshall Islands</option>
												<option value="MQ">Martinique</option>
												<option value="MR">Mauritania</option>
												<option value="MU">Mauritius</option>
												<option value="ME">Mayotte</option>
												<option value="MX">Mexico</option>
												<option value="MI">Midway Islands</option>
												<option value="MD">Moldova</option>
												<option value="MC">Monaco</option>
												<option value="MN">Mongolia</option>
												<option value="MS">Montserrat</option>
												<option value="MA">Morocco</option>
												<option value="MZ">Mozambique</option>
												<option value="MM">Myanmar</option>
												<option value="NA">Nambia</option>
												<option value="NU">Nauru</option>
												<option value="NP">Nepal</option>
												<option value="AN">Netherland Antilles</option>
												<option value="NL">Netherlands (Holland, Europe)</option>
												<option value="NV">Nevis</option>
												<option value="NC">New Caledonia</option>
												<option value="NZ">New Zealand</option>
												<option value="NI">Nicaragua</option>
												<option value="NE">Niger</option>
												<option value="NG">Nigeria</option>
												<option value="NW">Niue</option>
												<option value="NF">Norfolk Island</option>
												<option value="NO">Norway</option>
												<option value="OM">Oman</option>
												<option value="PK">Pakistan</option>
												<option value="PW">Palau Island</option>
												<option value="PS">Palestine</option>
												<option value="PA">Panama</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												<option value="PH">Philippines</option>
												<option value="PO">Pitcairn Island</option>
												<option value="PL">Poland</option>
												<option value="PT">Portugal</option>
												<option value="PR">Puerto Rico</option>
												<option value="QA">Qatar</option>
												<option value="ME">Republic of Montenegro</option>
												<option value="RS">Republic of Serbia</option>
												<option value="RE">Reunion</option>
												<option value="RO">Romania</option>
												<option value="RU">Russia</option>
												<option value="RW">Rwanda</option>
												<option value="NT">St Barthelemy</option>
												<option value="EU">St Eustatius</option>
												<option value="HE">St Helena</option>
												<option value="KN">St Kitts-Nevis</option>
												<option value="LC">St Lucia</option>
												<option value="MB">St Maarten</option>
												<option value="PM">St Pierre &amp; Miquelon</option>
												<option value="VC">St Vincent &amp; Grenadines</option>
												<option value="SP">Saipan</option>
												<option value="SO">Samoa</option>
												<option value="AS">Samoa American</option>
												<option value="SM">San Marino</option>
												<option value="ST">Sao Tome &amp; Principe</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SN">Senegal</option>
												<option value="RS">Serbia</option>
												<option value="SC">Seychelles</option>
												<option value="SL">Sierra Leone</option>
												<option value="SG">Singapore</option>
												<option value="SK">Slovakia</option>
												<option value="SI">Slovenia</option>
												<option value="SB">Solomon Islands</option>
												<option value="OI">Somalia</option>
												<option value="ZA">South Africa</option>
												<option value="ES">Spain</option>
												<option value="LK">Sri Lanka</option>
												<option value="SD">Sudan</option>
												<option value="SR">Suriname</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="SY">Syria</option>
												<option value="TA">Tahiti</option>
												<option value="TW">Taiwan</option>
												<option value="TJ">Tajikistan</option>
												<option value="TZ">Tanzania</option>
												<option value="TH">Thailand</option>
												<option value="TG">Togo</option>
												<option value="TK">Tokelau</option>
												<option value="TO">Tonga</option>
												<option value="TT">Trinidad &amp; Tobago</option>
												<option value="TN">Tunisia</option>
												<option value="TR">Turkey</option>
												<option value="TU">Turkmenistan</option>
												<option value="TC">Turks &amp; Caicos Is</option>
												<option value="TV">Tuvalu</option>
												<option value="UG">Uganda</option>
												<option value="UA">Ukraine</option>
												<option value="AE">United Arab Emirates</option>
												<option value="GB">United Kingdom</option>
												<option value="US">United States of America</option>
												<option value="UY">Uruguay</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VU">Vanuatu</option>
												<option value="VS">Vatican City State</option>
												<option value="VE">Venezuela</option>
												<option value="VN">Vietnam</option>
												<option value="VB">Virgin Islands (Brit)</option>
												<option value="VA">Virgin Islands (USA)</option>
												<option value="WK">Wake Island</option>
												<option value="WF">Wallis &amp; Futana Is</option>
												<option value="YE">Yemen</option>
												<option value="ZR">Zaire</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											    <option value="CA">Canada</option>
								                <option value="US">United States of America</option>
								                <option value="GB">United Kingdom (Great Britain)</option>
								                <option value="AU">Australia</option>
								                <option value="JP">Japan</option>										
											</select>											
										</div>										
									</div>	
									<br>							
								</fieldset>
							</div>
							<br>
							<button type="submit" class="btn btn-success btn-sm" name="save_3" style="margin-top: 8px; float: right">save & Next</button>
							<button type="button" class="btn btn-primary btn-sm" style="margin-top: 8px">Save</button>
							<button type="button" class="btn btn-danger btn-sm" style="margin-top: 8px">Cancel</button>			
					</form>
			</div>				
		</div>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="http://flesler-plugins.googlecode.com/files/jquery.scrollTo-1.4.2.js"></script>
	<script type="text/javascript">
		
			$("#cloudServiceProvider").validate({				
		    	focusInvalid: false,
			    invalidHandler: function(form, validator) {			        
			        if (!validator.numberOfInvalids())
			            return;			        
			        $('html, body').animate({
			            scrollTop: $(validator.errorList[0].element).offset().top-300
			        }, 1000);		        
			    }
			});

			/*

		    //Disable Right Clicks
		    $(document).bind("contextmenu",function(e) {
		    	e.preventDefault();
		    });

			//Disable F12 Inspectionr
			$(document).keydown(function(e){
				if(e.which === 123){
					return false;
				}
			});
			*/
		</script>
</body>

<!-- Copyright -->

<div class="copyright">
		<!-- Copyright -->
		<div class="footer-copyright text-center py-3"><b>© 2018 Copyright:</b>
			<a href="https://www.bosch.in/">bosch.in</a>
		</div>
		<!-- Copyright -->
</div>
<div class="bottom_ribbon"><img src="../img/bosch_ribbon.png"></div>
</html>






