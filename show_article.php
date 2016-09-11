<!DOCTYPE html>
<html>
	<head>
		<?php include_once "header.php"; ?>
		<?php
		if(!$_GET['no'])
			$post_no = -1;
		else
			$post_no = $_GET['no'];
		
		$get_article = $article_db->query("SELECT title, author, time, content, at_board FROM article_list
			                                               WHERE article_no LIKE $post_no");
		$rs_article = $get_article->fetch(PDO::FETCH_ASSOC);
		switch($rs_article['at_board']){
			case "postAtCreate":
				$board_title = "創作版";
				break;
			case "postAtReview":
				$board_title = "心得版";
				break;
			case "postAtIntro":
				$board_title = "自介版";
				break;
			default:
				$board_title = "";
				break;
		}
		?>
		<title><?php echo $board_title."：".$rs_article['title']; ?></title>
	</head>
	
	<body>
	
		<div>
			<div>標題：<?php echo $rs_article['title']; ?><br></div>
			<div>作者：<?php echo $rs_article['author']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_article['time']; ?><br><br></div>
			<div>
			<?php echo $rs_article['content']; ?>
			</div>		
		</div>	
	
	</body>
</html>