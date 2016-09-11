
<?php
$options = array(PDO::ATTR_EMULATE_PREPARES=>false,
				 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$article_db = new PDO('mysql:host=localhost;
			          dbname=article_collection; charset=utf8',
			          'root', 'mysql', $options);
?>
<?php
$intro_bull = $article_db->query("SELECT article_no, title, author, time FROM article_list 
								  WHERE bulletinOrNot AND at_board LIKE 'postAtIntro'
								  ORDER BY article_no DESC");
$rs_intro_bull = $intro_bull->fetchAll(PDO::FETCH_ASSOC);

$idx = $_POST['flip'];

$project_name = "wfp";
$show_url = "http://".$_SERVER['HTTP_HOST']."/".$project_name."/show_article.php?no=".$rs_intro_bull[$idx]['article_no'];

echo "<a href='".$show_url."'><div>".$rs_intro_bull[$idx]['title']."<br></div><div>".$rs_intro_bull[$idx]['author']."&nbsp;&nbsp;&nbsp;&nbsp;".$rs_intro_bull[$idx]['time']."</div></a>";

?>
