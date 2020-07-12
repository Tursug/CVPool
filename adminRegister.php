<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Yönetici Kayıt</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<link rel="stylesheet" href="signIn.css">
	</head>

	<body>

		<div class="login-form">
			<form action="adminRegister.php" method="post">
				<?php include('errors.php'); ?>
				<h3 class="text-center">Yönetici Kayıt</h3><br>      
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Kullanıcı Adı" required="required" name="username" >
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Şifre" required="required" name="password_1" >
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Şifre Tekrar" required="required" name="password_2" >
				</div><br>	
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block" name="reg_admin">Kayıt Ol</button>
				</div>     
			</form>
		</div>

	</body>

</html>  