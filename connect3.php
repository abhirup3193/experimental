<?php

$yesno ="";
$provider ="";
$tennant_id ="";
$account_id ="";
$subscription_name ="";
$subscription_id ="";
$subscription_owner ="";
$description ="";
$accommodate ="";

$cs_provider ="";
$others ="";
$deployed ="";

$conn = mysqli_connect('localhost', 'root', '', 'srs'); 

if (isset($_POST['save_3'])) {
	$yesno = mysqli_real_escape_string($conn, $_POST['yesno']);
	$provider = mysqli_real_escape_string($conn, $_POST['provider']);
	$tennant_id = mysqli_real_escape_string($conn, $_POST['tennant_id']);
	$account_id = mysqli_real_escape_string($conn, $_POST['account_id']);
	$subscription_name = mysqli_real_escape_string($conn, $_POST['subscription_name']);
	$subscription_id = mysqli_real_escape_string($conn, $_POST['subscription_id']);
	$subscription_owner = mysqli_real_escape_string($conn, $_POST['subscription_owner']);
	$description = mysqli_real_escape_string($conn, $_POST['description']);
	$accommodate = mysqli_real_escape_string($conn, $_POST['accommodate']);
	$cs_provider = mysqli_real_escape_string($conn, $_POST['cs_provider']);
	$others = mysqli_real_escape_string($conn, $_POST['others']);
	$deployed = mysqli_real_escape_string($conn, $_POST['deployed']);

	$sql = "INSERT INTO service_provider (yesno, provider, tennant_id, account_id, subscription_name, subscription_id, subscription_owner, description, accommodate, cs_provider, others, deployed) 
			VALUES('$yesno', '$provider', '$tennant_id', '$account_id', '$subscription_name', '$subscription_id', '$subscription_owner', '$description', '$accommodate', '$cs_provider', '$others','$deployed' ) ";
	 	
  	
  	$_SESSION['success3'] = "Cloud Service Provider Information saved Successfully !!";
  	$_SESSION['error'] = "Error";
    

    if ($conn->query($sql) === TRUE) {
    		echo $_SESSION['success3'];
		    header('location: ../Stage 2/5.php');
		} else {			
			echo $_SESSION['error']; 
          	unset($_SESSION['error']);					         					      	
				    
		}


	}

?>











