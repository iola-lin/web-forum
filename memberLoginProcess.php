<?php

	session_start(); 	
	
	$options = array(PDO::ATTR_EMULATE_PREPARES=>false,
					 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$member_db = new PDO('mysql:host=localhost;
			              dbname=member_info; charset=utf8',
			              'root', 'mysql', $options);
	
	$project_name = "wfp";
	
	$register_stmt = $member_db->prepare("SELECT passwords FROM register_info WHERE id LIKE :userid");
	$register_stmt->execute(array(':userid' => $_POST['userid']));
	$rs_psw = $register_stmt->fetch(PDO::FETCH_ASSOC);
	if(!$rs_psw['passwords'])
		$_GET['errLogin']=1;
	else{
		$_GET['errLogin']=0;
		$hash_psw = password_hash($rs_psw['passwords'], PASSWORD_DEFAULT);
		if(!password_verify($_POST['userpwd'], $hash_psw))
			$_GET['errLogin']=1;
		else
			$_GET['errLogin']=0;
	}
	
	if($_GET['errLogin'])
		header('Location: /'.$project_name.'/member_login.php?errLogin=1');
	else{
		$_SESSION['login'] = 'login';
		header('Location: index.php?login=1');
	}
		
?>