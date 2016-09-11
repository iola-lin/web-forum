
<?php
$options = array(PDO::ATTR_EMULATE_PREPARES=>false,
				 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$article_db = new PDO('mysql:host=localhost;
			          dbname=article_collection; charset=utf8',
			          'root', 'mysql', $options);
?>
<?php
$create_bull = $article_db->query("SELECT article_no, title, author, time FROM article_list 
								  WHERE bulletinOrNot AND at_board LIKE 'postAtCreate'
								  ORDER BY article_no DESC");
$rs_create_bull = $create_bull->fetchAll(PDO::FETCH_ASSOC);

$idx = $_POST['flip'];

$project_name = "wfp";
$show_url = "http://".$_SERVER['HTTP_HOST']."/".$project_name."/show_article.php?no=".$rs_create_bull[$idx]['article_no'];

echo "<a href='".$show_url."'><div>".$rs_create_bull[$idx]['title']."<br></div><div>".$rs_create_bull[$idx]['author']."&nbsp;&nbsp;&nbsp;&nbsp;".$rs_create_bull[$idx]['time']."</div></a>";

?>
