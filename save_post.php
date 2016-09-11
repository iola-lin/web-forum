<?php
$options = array(PDO::ATTR_EMULATE_PREPARES=>false,
							      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$article_db = new PDO('mysql:host=localhost;
			          dbname=article_collection; charset=utf8',
			          'root', 'mysql', $options);

if($_POST['saveAsDraft']=='draft'){
	$publish_stmt = $article_db->prepare("INSERT INTO draft_list(title, author, content, at_board) 
									     VALUES (:d_title, :d_author, :d_content, :d_at_board)");
}
else{
	$publish_stmt = $article_db->prepare("INSERT INTO article_list(article_no, title, author, time, content, at_board, bulletinOrNot) 
										 VALUES (DEFAULT, :d_title, :d_author, DEFAULT, :d_content, :d_at_board, DEFAULT)");
}
	$publish_stmt->execute(array(':d_title' => $_POST['title'], ':d_author' => $_POST['author'],
								 ':d_content' => $_POST['content'], ':d_at_board' => $_POST['at_board']));
	$affected_rows = $publish_stmt->rowCount();	

	header('Location: index.php');
?>