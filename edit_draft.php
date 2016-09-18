<?php session_start(); ?>
<!DOCTYPE html>
<html>

	<!-- Post Article Page -->

	<head>
		<meta charset="utf-8">
		<title>編輯文章</title>
	</head>
	
	<style>
		.row_area{
			margin-bottom: 10px;
		}
		.content_area{
			width: 700px;
			height: 200px;
		}
	</style>
	
	<body>
		<?php
		if(!$_GET['draft']){
			header('Location: /'.$project_name.'/post_page.php');
		}else{
			
			$options = array(PDO::ATTR_EMULATE_PREPARES=>false,
							 PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
			$article_db = new PDO('mysql:host=localhost;
								   dbname=article_collection; charset=utf8',
			                      'root', 'mysql', $options);
			$project_name = "wfp";
			$draft_stmt = $article_db->prepare('SELECT * FROM draft_list 
												WHERE draft_no LIKE :no');
			$draft_stmt->execute(array(':no'=>$_GET['draft']));
			$last_draft = $draft_stmt->fetch(PDO::FETCH_ASSOC);	
		?>
	
			<form method="POST" action="save_post.php">
				<div style="margin-top:30px; margin-bottom:15px">
				
					<div class="row_area">
						標題 <input type="text" name="title" style="width:500px" value=<?php echo $last_draft['title']; ?> required>
						<?php
						if($_SESSION['login']=='login'){
							?>
							&nbsp;&nbsp;<input type="checkbox" name="Bulletin" value="1">公告
						<?php } ?>
					</div>
					<div class="row_area">
						發表在 
						<select name="at_board">
							<option value="postAtCreate">創作版</option>						
							<option value="postAtReview">心得版</option>
							<option value="postAtIntro" >自介版</option>						
						</select>
					</div>
					<div class="row_area">
						作者 <input type="text" name="author" style="width:300px" value=<?php echo $last_draft['author']; ?> required>
					</div>
					<?php
					// $post_content = nl2br($last_draft['content']);
					$post_content = $last_draft['content'];
					$breaks = array("<br />","<br>","<br/>");
					$post_content = str_ireplace($breaks, "\r\n", $post_content);
					?>
					<div class="row_area">
						<textarea name="content" class="content_area"><?php echo $post_content;?></textarea>
					</div>
				</div>
				<div>
					<input type="submit" value="送出">
					<input type="checkbox" name="saveAsDraft" value="draft">存成草稿
				</div>
			</form>	
		<?php
		}
		?>
<?php include_once "footer.html"; ?>