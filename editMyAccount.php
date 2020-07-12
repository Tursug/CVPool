<?php
	$send_id = $_REQUEST['id'];
	$who = $_REQUEST['name'];
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta charset = "utf-8" name = "viewport" content = "width=device-width, initial-scale =1">
        <title>title</title>
		
		<!--BOOTSTRAP CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		
		<!--BOOTSTRAP JS-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		<!--JQUERY-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

		<link rel="stylesheet" href="addStyle.css">
	</head>
	<body>
	
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand">SiteName</a>
			</div>
			<ul class="nav navbar-nav">
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="editMyAccount.php"><span class="glyphicon glyphicon-user"></span> Kullanıcı Adı</a></li>
			  <li><a href="logout.php?name=kullanici"><span class="glyphicon glyphicon-log-out"></span> Çıkış </a></li>
			</ul>
		  </div>
		</nav>
		
		<div class="container">
			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				<div class="panel panel-default">
				
						<div class="panel-heading">HESAP BİLGİLERİNİ DEĞİŞTİR</div>
						
						<div class="panel-body">

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">ESKİ KULLANICI ADI</label>
											<div class="col-sm-4"><input type="text" name="oldusername" class="form-control" ></div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">ESKİ ŞİFRE</label>
											<div class="col-sm-4"><input type="password" name="oldpassword" class="form-control " ></div>
										</div>
									</div>
									<hr>
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">YENI KULLANICI ADI</label>
											<div class="col-sm-4"><input type="text" name="newusername" class="form-control" ></div>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">YENI SİFRE</label>
											<div class="col-sm-4"><input type="password" name="newpassword" class="form-control" ></div>
										</div>
									</div>

						</div>
				</div>
			</form>
			    <p>
					<button class ="btn btn-danger gonder-btn" onclick="window.history.back();" style="margin-left: 30%;">İPTAL</button>
					<input  class ="btn btn-success gonder-btn" type="submit" style="margin-left: 20%;"></input>
                </p>
		</div>
	</body>
</html>