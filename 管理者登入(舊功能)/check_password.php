<?php 
	session_start(); 	
	
	$hash1 = password_hash("CuteCat", PASSWORD_DEFAULT);
	$hash2 = password_hash("HeartOfTheSea", PASSWORD_DEFAULT);
	
	$project_name = "wfp";
	
	if(password_verify($_POST['pw'], $hash1) || password_verify($_POST['pw'], $hash2)){
		$_SESSION['login'] = 'login';
		$_POST['pw'] = "";
		header('Location: index.php');
	}
	else{
		echo 'Wrong password.';
		$_POST['pw'] = "";
		header('Location: /'.$project_name.'/login.html');
	}
	
?>
