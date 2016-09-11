<meta charset="utf-8">
<?php
	$options = array(PDO::ATTR_EMULATE_PREPARES=>false,
					 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	$article_db = new PDO('mysql:host=localhost;
			              dbname=article_collection; charset=utf8',
			              'root', 'mysql', $options);
	$project_name = "wfp";
	$show_url = "http://".$_SERVER['HTTP_HOST']."/".$project_name."/show_article.php";
?>