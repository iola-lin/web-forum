<!DOCTYPE html>
<html>

	<head>
		<?php include_once "header.php"; ?>
		<title>心得版</title>
	</head>
	
	<body>
		<img src="" >
		<hr>
		<div> 公告 <br><br>		
			<?php
			$review_bull = $article_db->query('SELECT article_no, title, author, time FROM article_list 
			                                  WHERE bulletinOrNot AND at_board LIKE "postAtReview"
											  ORDER BY article_no DESC LIMIT 0, 2');
			$rs_review_bull = $review_bull->fetchAll(PDO::FETCH_ASSOC);	
			foreach($rs_review_bull as $rs_row){
			?>
		
			<a href="<?php echo $show_url; ?>">
			<div>
				<div>
					<?php
					echo $rs_row['title'], "<br>";
					?>
				</div>
				<div>
					<?php
					echo $rs_row['author']."  ".$rs_row['time'];
					?>
				</div>
			</div>
			</a>
			<br>
			<?php } ?>
			
		</div>
		<hr>
		
		<div> 所有文章 <br><br>
			<?php		
			$review_stmt = $article_db->query('SELECT article_no, title, author, time FROM article_list 
											  WHERE NOT bulletinOrNot AND at_board LIKE "postAtReview" 
											  ORDER BY article_no DESC LIMIT 0, 10');
			$rs_review = $review_stmt->fetchAll(PDO::FETCH_ASSOC);		
			foreach($rs_review as $rs_row){			
			?>
		
			<a href="<?php echo $show_url; ?>">
			<div>
				<div>
					<?php
					echo $rs_row['title'], "<br>";
					?>
				</div>
				<div>
					<?php
					echo $rs_row['author']."  ".$rs_row['time'];
					?>
				</div>
			</div>
			</a>
			<br>
			<?php } ?>
			
		</div>
		
<?php include_once "footer.html"; ?>