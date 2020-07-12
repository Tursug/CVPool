<?php
	session_start();
	
	if(!isset($_SESSION['adminusername'])){
		header("Location: adminLogin.php");
	}
	
	//
	$usern = $_SESSION['adminusername'];
	$user_check_query = "SELECT id FROM yoneticiler WHERE username='$usern' LIMIT 1";
	
	//CONNECTION INFO
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "sv";
	
	//CONNECT
	$conn3 = new mysqli($servername, $username, $password, $dbname);
	
	$result = mysqli_query($conn3, $user_check_query);
	$user_id = mysqli_fetch_assoc($result);
	$id;
	
	if ($user_id) { // if user exists
		$id = $user_id['id'];
		}
		
	$_SESSION['id'] = $id;
?>

<!DOCTYPE html>
<html>

	<head>
	
		<meta charset = "utf-8" name = "viewport" content = "width=device-width, initial-scale =1"/>
		<title>title</title>
		
		<!--BOOTSTRAP CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		
		<!--BOOTSTRAP JS-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
		<!--JQUERY-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<link href="mainFrame.css" rel="stylesheet">
		<script src="addMore.js"></script>
		<script src="getcvIndex.js"></script>
		
	</head>

	<body>

		<div class="wrapper">
		
		<!--
			<header class="header">
				<h2>HEADER</h2>
			</header>
			-->
			<!--
			<div class="topnav">
				<a class="active" href="index.php">Ara</a>
				<a href="add.php">Yeni CV Ekle</a>
			</div>
		-->
		
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="index.php">SiteName</a>
			</div>
			<ul class="nav navbar-nav">
			  <li class="active" ><a href="index.php">Ara</a></li>
			  <!--<li><a href="#">Başvurular</a></li>-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="editMyAccount.php?name=yonetici&id=<?php echo $_SESSION['id']; ?>"><span class="glyphicon glyphicon-user"></span> Hesabı Düzenle </a></li>
			  <li><a href="logout.php?name=yonetici"><span class="glyphicon glyphicon-log-out"></span> Çıkış </a></li>
			</ul>
		  </div>
		</nav>
			<div class="middle">

				<div class="container">
					<main class="content" id="dynamic-field-grid" >
						<!--CV's DISPLAYED IN HERE -->		
					</main><!-- .content -->
				</div><!-- .container-->

				<aside class=" col-sm-4 left-sidebar">
									<h2 style="padding-left:40%;">Ara</h2>
									
									<!--FORM-->
									<form class="form-horizontal">
									<fieldset>
										<legend>Kişisel Bilgiler</legend>
										<!--İSİM-->
										<div class="form-group">
										  <label class="control-label col-sm-3" for="isim">İsim:</label>
										  <div class="col-sm-8">          
											<input type="text" class="form-control" id="isimid" placeholder="" name="isimname">
										  </div>
										</div>
										
										<!--SOYİSİM-->
										<div class="form-group">
										  <label class="control-label col-sm-3" for="soyisim">Soyisim:</label>
										  <div class="col-sm-8">          
											<input type="text" class="form-control" id="soyisimid" placeholder="" name="soyisimname">
										  </div>
										</div>
										
										<!--CİNSİYET-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="cinsiyet">Cinsiyet:</label>
											<div class="col-sm-2 divpadding">
												<label class="radio-inline"><input type="radio" name="cinsiyetname" id="Erkekinputid" value="Erkek" checked>Erkek</label>
											</div>
											<div class="col-sm-2 divpadding">  
												<label class="radio-inline"><input type="radio" name="cinsiyetname" id="Kadıninputid" value="kadin" >Kadın</label>
											</div>
											<div class="col-sm-2">  
												<label class="radio-inline"><input type="radio" name="cinsiyetname" id="Farkinputid" value="Fark" >Farketmez</label>
											</div>
										</div>
										
										<!--YAŞ-->
										<div class="form-group">
										
											<label class="control-label col-sm-3" for="yasmin">Yaş</label>
											<label class="control-label col-sm-1" for="yasmax">Min:</label>
											<div class="col-sm-3">          
												<input type="number" class="form-control" id="yasminid" name="yasminname" placeholder="">
											</div>
										  
											<label class="control-label col-sm-1" for="yasmax">Max:</label>
											<div class="col-sm-3">          
												<input type="number" class="form-control" id="yasmaxid" name="yasmaxxname" placeholder="">
											</div>
											
										</div>
									</fieldset>
									<br>
									
									<fieldset>
										<legend>Adres Bilgileri</legend>
										<!--İL-->
										<div class="form-group">
										  <label class="control-label col-sm-3" for="il">İl:</label>
										  <div class="col-sm-8">          
											<input type="text" class="form-control" id="ilid" name="ilname" placeholder="">
										  </div>
										</div>
										<!--YAKA-->
										<!--<div class="form-group">
											<label class="control-label col-sm-3" for="yuksekegitim">İstanbul:</label>
											<div class="col-sm-4">
												<label class="radio-inline"><input type="checkbox" name="yakaname" id="avrupa">Avrupa</label>
											</div>
											<div class="col-sm-5">  
												<label class="radio-inline"><input type="checkbox" name="yakaname" id="anadolu">Anadolu</label>
											</div>
										</div>-->
										<!--İLCE-->
										<div class="form-group">
										  <label class="control-label col-sm-3" for="ilce">İlçe:</label>
										  <div class="col-sm-8">          
											<input type="text" class="form-control" id="ilceid" name="ilcename" placeholder="">
										  </div>
										</div>
									</fieldset>
									<br>
									
									<fieldset>
										<legend>Eğitim Bilgileri</legend>
										<!--UNİVERSİTE-->
										<div class="form-group">
										  <label class="control-label col-sm-3" for="uni">Üniversite:</label>
										  <div class="col-sm-8">          
											<input type="text" class="form-control" id="uniid" name="uniname" placeholder="">
										  </div>
										</div>
										
										<!--BOLUM-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="bolum">Bölüm:</label>
											<div class="col-sm-8">          
												<input type="text" class="form-control" id="bolumid" name="bolumname" placeholder="">
											</div>
										</div>
										
										<!--EGİTİM DİLİ-->
										<div class="form-group">
										  <label class="control-label col-sm-3" for="unidil">Eğitim Dili:</label>
										  <div class="col-sm-8">          
											<input type="text" class="form-control" id="unidilid" name="unidilname" placeholder="">
										  </div>
										</div>
										
										<!--LİSANSUSTU-->
										<!--<div class="form-group">
											<label class="control-label col-sm-3" for="yuksekegitim">Lisansüstü:</label>
											<div class="col-sm-5">
												<label class="radio-inline"><input type="checkbox" name="lisansustuname" id="yuklis">Yüksek Lis.</label>
											</div>
											<div class="col-sm-4 dok">  
												<label class="radio-inline"><input type="checkbox" name="lisansustuname" id="doktor">Doktora</label>
											</div>
										</div>-->
									</fieldset>
									<br>
									
									<fieldset>
									<legend>Dil Bilgileri</legend>	
									<div id="dynamic-field2">
									
										<!--YABANCI DIL-->
										<div id="dil">
											<div class="form-group">
												<label class="col-sm-3 control-label">Yabancı Dil:</label>
												<div class="col-sm-8"><input type="text" id="yabancidilid" name="yabancidilid" class="form-control " ></div>
											</div>
											
										<!--SEVIYE-->
											<!--<div class="form-group">
											<label class=" col-sm-3 control-label" >Seviye: </label>
											  
											  <div class="col-sm-6">
											  <select class="form-control" id="sel1" name="dilseviye[]">
											  
												<option value="Farketmez">Farketmez</option>
												<option value="Baslangic">Başlangıç</option>
												<option value="Orta">Orta</option>
												<option value="Iyı">İyi</option>
												<option value="Ileri">İleri</option>
												
											  </select>
											  </div><button id="add-more-lang-search" name="add-more-lang-search" type="button" class=" btn-primary btn-sm btn ">EKLE</button>
											</div>-->
										</div>
										
									</div>
									</fieldset>
									<br>
									
									<fieldset>
										<legend>Deneyim Bilgileri</legend>										
										<!--SİRKET ADI-->
										<div class="form-group">
											<label class="control-label col-sm-3" for="sirketdeneyimi">Şirket İsmi:</label>
											<div class="col-sm-8">          
												<input type="text" class="form-control" id="sirketid" name="sirketname" placeholder="">
											</div>
										</div>
										
										<!--POZİSYON ADI-->
										<div class="form-group">
										
											<label class="control-label col-sm-3" for="pozisyondeneyimi">Pozisyon İsmi:</label>
											<div class="col-sm-8">          
												<input type="text" class="form-control" id="pozisyonid" name="pozisyonname" placeholder="">
											</div>
											
										</div>
										
										<!--DENEYİM-->
										<div class="form-group">
										
											<label class="control-label col-sm-3" for="deneyim">Pozisyon Deneyimi</label>
											<label class="control-label col-sm-1" for="denmin">Min:</label>
											<div class="col-sm-3">          
												<input type="number" class="form-control" id="deneyiminid" name="deneyim" placeholder="">
											</div>
											<label class="control-label col-sm-1" for="denmax">Max:</label>
											<div class="col-sm-3">          
												<input type="number" class="form-control" id="deneyimmaxid" name="deneyim" placeholder="">
											</div>
										  
										</div>
										
										<!--TOPLAM DENEYİM-->
										<!--<div class="form-group">
										
											<label class="control-label col-sm-3" for="deneyim">Toplam Deneyim</label>
											<label class="control-label col-sm-1" for="topmin">Min:</label>
											<div class="col-sm-3">          
												<input type="number" class="form-control" id="topdeneyiminid" name="deneyim" placeholder="">
											</div>
											<label class="control-label col-sm-1" for="yasmax">Max:</label>
											<div class="col-sm-3">          
												<input type="number" class="form-control" id="topdeneyimmaxid" name="deneyim" placeholder="">
											</div>
										  
										</div>-->
										
									</fieldset>
									</form>
									<!--END OF THE FORM-->
									<div class="row-sm-1">
										<!--<div class="col-sm-1">
											<button class="btn btn-info bul-btncv" id="get-cvs" >YENİ CV EKLE</button>
										</div>-->
										<div class="col-sm-1">
											<button class="btn btn-success bul-btn" id="get-cvs" >BUL</button><!--GETCVINDEX.JS-->
										</div>
									</div>
				</aside><!-- .left-sidebar -->

			</div><!-- .middle-->

		</div><!-- .wrapper -->
		
	</body>
			<!--
			<footer class="footer">
			</footer>
			-->
</html>