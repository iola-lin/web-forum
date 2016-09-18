<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<?php 
		$project_name = "wfp";
		?>
		<title>會員登入</title>
	</head>
	
	<body>
		<div>會員登入<br><br></div>
		<form method="POST" action="memberLoginProcess.php">
		<div>
			<div>
			帳號<br>
			<input type="text" name="userid"><br><br>
			</div>
			<div>
			密碼<br>
			<input type="password" name="userpwd"><br><br>
			</div>
			<input type="submit" value="登入"><br><br>
			<?php if($_GET['errLogin']) 
							echo " 密碼或帳號錯誤!!"; ?>
			<div>
			<input type="button" onclick="history.back()" value="返回上一頁">
			</div>
		
		</div>
		
		</form>
	</body>

</html>