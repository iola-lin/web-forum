<!DOCTYPE html>
<html>

	<head>
		<?php include_once "header.php"; ?>
		<title>測試論壇 1.0.0</title>
		<style>
			.board_title{
				background: pink;
				border: 2px pink solid;
				padding: 5px;
				font-size: 11pt;
			}
		</style>
		
	</head>
	
	<body>
		<img src="" > <!-- banner: use JS to change the images? use 'setInterval()'-->
		
		<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$project_name."/post_page.php"; ?>">
		<input type="button" value="發表文章"></a>
		
		<?php
		if(!$_SESSION['login']){
		?>
			<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$project_name."/login.html"; ?>">
			<input type="button" value="登入"></a>
		<?php }
		else{
		?>
			<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$project_name."/destroySess.php"; ?>">
			<input type="button" value="登出"></a>
		<?php } ?>
		<hr>
		
		<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$project_name."/Create_board.php"; ?>">
		<div class="board_title">創作版：
		</a><br><br>
		
			<div style="font-weight:bold;">最新公告：</div>		
			<?php
			$create_bull = $article_db->query('SELECT article_no, title, author, time FROM article_list 
			                                  WHERE bulletinOrNot AND at_board LIKE "postAtCreate"
											  ORDER BY article_no DESC LIMIT 0, 1');
			$rs_create_bull = $create_bull->fetch(PDO::FETCH_ASSOC);	
			?>
		
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_create_bull['article_no']; ?>">
				<div>
					<?php
					echo $rs_create_bull['title'], "<br>";
					?>
				</div>
				<div>
					<?php echo $rs_create_bull['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_create_bull['time']; ?>
				</div>
			</a>
			</div>
			
			<br>
		
			<div style="font-weight:bold;">最新文章：</div>		
			<?php		
			$create_stmt = $article_db->query('SELECT article_no, title, author, time FROM article_list 
											  WHERE NOT bulletinOrNot AND at_board LIKE "postAtCreate" 
											  ORDER BY article_no DESC LIMIT 0, 1');
			$rs_create = $create_stmt->fetch(PDO::FETCH_ASSOC);												   
			?>
		
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_create['article_no']; ?>">
				<div>
					<?php
					echo $rs_create['title'], "<br>";
					?>
				</div>
				<div>
					<?php echo $rs_create['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_create['time']; ?>
				</div>
			</a>
			</div>
		
		</div>
		
		<br>
		
		<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$project_name."/Review_board.php"; ?>">
		<div class="board_title">心得版：
		</a><br><br>
		
			<div style="font-weight:bold;">最新公告：</div>		
			<?php
			$review_bull = $article_db->query('SELECT article_no, title, author, time FROM article_list 
			                                  WHERE bulletinOrNot AND at_board LIKE "postAtReview"
											  ORDER BY article_no DESC LIMIT 0, 1');
			$rs_review_bull = $review_bull->fetch(PDO::FETCH_ASSOC);	
			?>
			
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_review_bull['article_no']; ?>">
				<div>
					<?php
					echo $rs_review_bull['title'], "<br>";
					?>
				</div>
				<div>
					<?php echo $rs_review_bull['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_review_bull['time']; ?>
				</div>
			</a>
			</div>
			
			<br>
			
			<div style="font-weight:bold;">最新文章：</div>			
			<?php
			$review_stmt = $article_db->query('SELECT article_no, title, author, time FROM article_list 
											  WHERE NOT bulletinOrNot AND at_board LIKE "postAtReview" 
											  ORDER BY article_no DESC LIMIT 0, 1');
			$rs_review = $review_stmt->fetch(PDO::FETCH_ASSOC);
			?>
			
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_review['article_no']; ?>">
				<div>
					<?php
					echo $rs_review['title'], "<br>";
					?>
				</div>
				<div>
					<?php echo $rs_review['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_review['time']; ?>
				</div>
			</a>
			</div>
			
		</div>

		<br>
		
		<a href="<?php echo "http://".$_SERVER['HTTP_HOST']."/".$project_name."/Intro_board.php"; ?>">
		<div class="board_title">自介版：
		</a><br><br>
		
			<div style="font-weight:bold;">最新公告：</div>
			<?php
			$intro_bull = $article_db->query('SELECT article_no, title, author, time FROM article_list 
											  WHERE bulletinOrNot AND at_board LIKE "postAtIntro"
											  ORDER BY article_no DESC LIMIT 0, 1');
			$rs_intro_bull = $intro_bull->fetch(PDO::FETCH_ASSOC);			
			?>
			
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_intro_bull['article_no']; ?>">
				<div>
					<?php
					echo $rs_intro_bull['title'], "<br>";
					?>
				</div>
				<div>
					<?php echo $rs_intro_bull['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_intro_bull['time']; ?>
				</div>
			</a>
			</div>
			
			<br>
		
			<div style="font-weight:bold;">最新文章：</div>
			<?php
			$intro_stmt = $article_db->query('SELECT article_no, title, author, time FROM article_list 
											  WHERE at_board LIKE "postAtIntro" 
											  ORDER BY article_no DESC LIMIT 0, 1');
			$rs_intro = $intro_stmt->fetch(PDO::FETCH_ASSOC);															   
			?>
			
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_intro['article_no']; ?>">
				<div>
					<?php
					echo $rs_intro['title'], "<br>";
					?>
				</div>
				<div>
					<?php echo $rs_intro['author'];?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_intro['time']; ?>
				</div>
			</a>
			</div>
		
		</div>					

<?php include_once "footer.html"; ?>