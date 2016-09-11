<!DOCTYPE html>
<html>

	<head>
		<?php include_once "header.php"; ?>
		<title>自介版</title>
		<?php 
		$num_per_page = 6;
		?>
	</head>
	
	<body>
		<?php
		
		// processing multi-page
		if(!$_GET['page'])
			{$page=0;}
		else
			{$page=$_GET['page'];}
			
		$stmt=$article_db->query('SELECT COUNT(*) AS num_row 
		                         FROM article_list WHERE NOT bulletinOrNot AND at_board LIKE "postAtIntro"');
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$total_dataRow = $result[0]['num_row']; //共幾筆data
		
		$stmt2=$article_db->query('SELECT COUNT(*) AS num_row 
		                          FROM article_list WHERE bulletinOrNot AND at_board LIKE "postAtIntro"');
		$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
		$total_bullRow = $result2[0]['num_row']; //共幾筆bull
		
		?>
		
		<img src="" >
		<hr>
		<div> 公告 <br><br>		
			<?php
			$intro_bull = $article_db->query('SELECT article_no, title, author, time FROM article_list 
			                                  WHERE bulletinOrNot AND at_board LIKE "postAtIntro"
											  ORDER BY article_no DESC');
			$rs_intro_bull = $intro_bull->fetchAll(PDO::FETCH_ASSOC);	
			
			?>
			
			<div id="bull_block">
			<a href="<?php echo $show_url.'?no='.$rs_intro_bull[0]['article_no']; ?>">
				<div>					
					<?php
					echo $rs_intro_bull[0]['title'], "<br>";
					?>					
				</div>
				<div>
					<?php
					echo $rs_intro_bull[0]['author']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_intro_bull[0]['time'];
					?>
				</div>
			</a>
			</div>
			
			<br>
			
		</div>
		<hr>
		
		<div> 所有文章 <br><br>
			<?php		
			$intro_stmt = $article_db->prepare("SELECT article_no, title, author, time FROM article_list 
											  WHERE NOT bulletinOrNot AND at_board LIKE 'postAtIntro' 
											  ORDER BY article_no DESC LIMIT :offset, {$num_per_page}");
			$intro_stmt->execute(array(':offset' => $num_per_page*$page));
			$rs_intro = $intro_stmt->fetchAll(PDO::FETCH_ASSOC);		
			foreach($rs_intro as $rs_row){			
			?>
		
			<div>
			<a href="<?php echo $show_url.'?no='.$rs_row['article_no']; ?>">
				<div>					
					<?php
					echo $rs_row['title'], "<br>";
					?>
				</div>
				<div>
					<?php
					echo $rs_row['author']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rs_row['time'];
					?>
				</div>
			</a>
			</div>
			
			<br>
			<?php } ?>
			
		</div>
		
		<div>
		<?php
			$total_page = ceil($total_dataRow/$num_per_page);
			for($p=0;$p<$total_page;$p++){
				if($p != $page)
					echo '<a href="Intro_board.php?page=',$p,'"> ', $p+1, ' </a>';
				else
					echo $p+1;
			}
			
		?>
		</div>
		
		<script type="text/javascript">
		
		var bull_block = document.getElementById('bull_block');
			
		var iflip = 1; //若data只有一筆，就不行QQ
		
		setInterval(function(){
			var xhr = new XMLHttpRequest();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				bull_block.innerHTML = xhr.responseText;
			}};
			xhr.open('POST', '/' + '<?php echo $project_name; ?>' + '/Intro_bull.php', true);
			xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xhr.send("flip=" + iflip);
			
			if(iflip >= <?php echo $total_bullRow-1; ?>)
				iflip=0;
			else
				iflip++;
				
			
		}, 5000);	
		
		</script>
		
<?php include_once "footer.html"; ?>