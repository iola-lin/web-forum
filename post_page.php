<!DOCTYPE html>
<html>

	<!-- Post Article Page -->

	<head>
		<meta charset="utf-8">
		<title>發表文章</title>
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
		<form method="POST" action="save_post.php">
			<div style="margin-top:30px; margin-bottom:15px">
				
				<div class="row_area">
					標題 <input type="text" name="title" style="width:500px" required>
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
					作者 <input type="text" name="author" style="width:300px" required>
				</div>
				<div class="row_area">
					<textarea name="content" class="content_area"></textarea>
				</div>
			</div
			<div>
				<input type="submit" value="送出">
				<input type="checkbox" name="saveAsDraft" value="draft">存成草稿
			</div>
		</form>	
		
<?php include_once "footer.html"; ?>