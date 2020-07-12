
<?php
	session_start();
	
	if(!isset($_SESSION['adminusername'])){
		header("Location: adminLogin.php");
	}
	
	//GET ID
	$id = $_GET['id'];//CV ID
	$yonid = $_SESSION['id'];//LOGIN ID
	
	//CONNECTION INFO
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "sv";
	
	//CONNECT
	$conn3 = new mysqli($servername, $username, $password, $dbname);
	
	//GET INFORMATIONS
	$kisisel_bilgiler = mysqli_query($conn3, 	"SELECT ad, soyad, fotograf, cvdosyasi, cinsiyet, dogutarihi
												FROM profil 
												WHERE id = '".$id."' 
												");
	
	$egitim_bilgiler = mysqli_query($conn3, 	"SELECT universite, bolum, baslangic_tarihi, bitis_tarihi, yabanci_dil, egitimderecesi
												FROM egitim 
												WHERE id = '".$id."' 
												");
	
	$deneyim_bilgiler = mysqli_query($conn3, 	"SELECT sirket_adi, pozisyon, baslangic_tarihi, bitis_tarihi
												FROM deneyim 
												WHERE id = '".$id."' 
												");
												
	$dil_bilgiler	=	mysqli_query($conn3, 	"SELECT dil_adi, seviye
												FROM dil 
												WHERE id = '".$id."' 
												");
												
	$referans_bilgiler = mysqli_query($conn3, 	"SELECT refad, refsoyad, reftelefon, unvan
												FROM referans
												WHERE id = '".$id."' 
												");
												
	$iletisim_bilgiler = mysqli_query($conn3, 	"SELECT il, ilce, telefon, email
												FROM iletisim
												WHERE id = '".$id."' 
												");
	
	//ASSIGN
	if (!empty($kisisel_bilgiler) && $kisisel_bilgiler->num_rows > 0) {

		while($row = $kisisel_bilgiler->fetch_assoc()) {
			
        $isim = $row["ad"];
		$soyisim = $row["soyad"];
		$fotograf = $row["fotograf"];
		$cv_dosya = $row["cvdosyasi"];
		$cinsiyet = $row["cinsiyet"];
		$dogum_tarihi = $row["dogutarihi"];
		
		}
	} else {
		
	}
	
	if (!empty($egitim_bilgiler) && $egitim_bilgiler->num_rows > 0) {

		while($row = $egitim_bilgiler->fetch_assoc()) {
			
        $universite[] = $row["universite"];
		$bolum[] = $row["bolum"];
		$unibaslangic[] = $row["baslangic_tarihi"];
		$unibitis[] = $row["bitis_tarihi"];
		$unidil[] = $row["yabanci_dil"];
		$uniderece[] = $row["egitimderecesi"];
		
		}
	} else {
		
	}
	
	if ($dil_bilgiler->num_rows > 0) {

		while($row = $dil_bilgiler->fetch_assoc()) {
			
        $dil_adi[] = $row["dil_adi"];
		$seviye[] = $row["seviye"];
		
		}
	} else {
		
	}	
	
	if (!empty($deneyim_bilgiler) && $deneyim_bilgiler->num_rows > 0) {

		while($row = $deneyim_bilgiler->fetch_assoc()) {
			
        $sirket_isim[] = $row["sirket_adi"];
		$sirket_pozisyon[] = $row["pozisyon"];
		$sirket_baslangic[] = $row["baslangic_tarihi"];
		$sirket_cikis[] = $row["bitis_tarihi"];
		
		}
	} else {
		
	}
	
	if (!empty($referans_bilgiler) && $referans_bilgiler->num_rows > 0) {

		while($row = $referans_bilgiler->fetch_assoc()) {
			
        $ref_ad[] = $row["refad"];
		$ref_soyad[] = $row["refsoyad"];
		$ref_tel[] = $row["reftelefon"];
		$ref_unvan[] = $row["unvan"];
		
		}
	} else {
		
	}
	
	if (!empty($iletisim_bilgiler) && $iletisim_bilgiler->num_rows > 0) {

		while($row = $iletisim_bilgiler->fetch_assoc()) {
			
        $il = $row["il"];
		$ilce = $row["ilce"];
		$tel = $row["telefon"];
		$email = $row["email"];
		
		}
	} else {
		
	}
	
	$egitimcounter = 0;
	$dilcounter = 0;
	$deneyimcounter = 0;
	$referanscounter = 0;
	
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
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

		<link rel="stylesheet" href="addStyle.css">
        <script src="addMore.js"></script>
		
		<!--ADDITIONAL JAVASCRIPT-->
		<script type="text/javascript">
			
			//PHP TO JS
			var id_num = 		"<?php echo $_GET['id']; ?>";
			var text = 			"<?php echo $isim ." ". $soyisim; ?>";
			var isim = 			"<?php echo $isim; ?>";
			var soyisim = 		"<?php echo $soyisim; ?>";
			var cinsiyet = 		"<?php echo $cinsiyet; ?>";
			var dogum_tarihi = 	"<?php echo $dogum_tarihi; ?>";
			var fotograf = 		"<?php echo $fotograf; ?>";
			
			var egitimsayisi = "<?php echo sizeof($universite); ?>";	
			var egitimnum = parseInt(egitimsayisi, 10);
			
			var universite_isimleri = 	<?php echo json_encode($universite); ?>;
			var bolum_isimleri = 		<?php echo json_encode($bolum); ?>;
			var unibaslangic_isimleri = <?php echo json_encode($unibaslangic); ?>;
			var unibitis_isimleri = 	<?php echo json_encode($unibitis); ?>;
			var unidil_isimleri = 		<?php echo json_encode($unidil); ?>;
			var uniderece_isimleri = 	<?php echo json_encode($uniderece); ?>;
			
			var dilsayisi = "<?php echo sizeof($dil_adi); ?>";
			var dilnum = parseInt(dilsayisi, 10);
			
			var dil_isimleri = 			<?php echo json_encode($dil_adi); ?>;
			var dil_seviyeleri = 		<?php echo json_encode($seviye); ?>;
			
			var deneyimsayisi = "<?php echo sizeof($sirket_isim); ?>";
			var deneyimnum = parseInt(deneyimsayisi, 10);
			
			var sirket_isimleri = 		<?php echo json_encode($sirket_isim); ?>;
			var pozisyon_isimleri =	<?php echo json_encode($sirket_pozisyon);?>;
			var isgiris_isimleri =		<?php echo json_encode($sirket_baslangic);?>;
			var iscikis_isimleri =		<?php echo json_encode($sirket_cikis);?>;
			
			var referanssayisi = "<?php echo sizeof($ref_ad); ?>";		
			var referansnum = parseInt(referanssayisi, 10);
			
			var refad_isimleri = 			<?php echo json_encode($ref_ad); ?>;
			var refsoyad_isimleri = 		<?php echo json_encode($ref_soyad); ?>;
			var reftel_isimleri = 			<?php echo json_encode($ref_tel); ?>;
			var refunvan_isimleri = 		<?php echo json_encode($ref_unvan); ?>;
			
			var il = 				"<?php echo $il; ?>";
			var ilce = 				"<?php echo $ilce; ?>";
			var telefon = 			"<?php echo $tel; ?>";
			var email = 			"<?php echo $email; ?>";
			
			
			//ACIKLAMA
			
			//JQUERY
			$(document).ready(function(){
				/*
				$("#button").click(function(){
					
					var clickBtnValue = $(this).val();
					
					$.ajax({
						type:'POST',
						url:'deletecv.php',
						data :  {action: clickBtnValue, id: <?php echo $_GET['id']; ?>},
						 success: function(){
							 alert('works');
						 },
						 error: function(){
							 alert('something went wrong');
						 }
					});

					
						var ajax = new XMLHttpRequest();
						var method = "POST";
						var url = "deletecv.php?id="+<?php echo $_GET['id']; ?>+"&action="+clickBtnValue+"";
						var asynchronous = true;
						
						ajax.open(method, url, asynchronous);
						ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
						ajax.send();
						
						ajax.onreadystatechange = function(){
							if(this.readyState==4 && this.status == 200){
								alert("CV DELETED");
							}
						}
					
				});*/
			});
			
		</script>
		
    </head>
    
    <body>
	<!--
        <header>
            <h2>HEADER</h2>
        </header>
	-->
	<!--
        <div class="topnav">
            <a href="index.php">Ara</a>
            <a href="add.php">Ekle</a>
        </div>
	-->
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="index.php">SiteName</a>
			</div>
			<ul class="nav navbar-nav">
			  <li><a href="index.php">Ara</a></li>
			  <!--<li><a href="#">Başvurular</a></li>-->
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="editMyAccount.php?name=yonetici&id=<?php echo $yonid; ?>"><span class="glyphicon glyphicon-user"></span> Hesabı Düzenle </a></li>
			  <li><a href="logout.php?name=yonetici"><span class="glyphicon glyphicon-log-out"></span> Çıkış </a></li>
			</ul>
		  </div>
		</nav>
        
        <div class="container">
		
			<div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<h2>	<script>document.write(text);</script>		</h2>
			  </div>
			</div>
			
            <div class="form-horizontal" >
			
			<!--KİŞİSEL BİLGİLER PANELİ-->
                    <div class="panel panel-default">
					
						<div class="panel-heading">KİŞİSEL BİLGİLER</div>
						
						<div class="panel-body">
						
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="col-md-4 control-label" >FOTOĞRAF </label> 
									<div class="col-md-4 inputGroupContainer">
										<div class="input-group">
											<script>document.write("<img id='blah' src="+fotograf+" alt='Resim Seçilmedi' class='centered' width = 250 height = 250>")</script>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-8">		 
							<div class="form-group">
								<label class="col-md-4 control-label" >İSİM </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<script>document.write("<input name='isim' placeholder='İsim' class='form-control'  type='text' value="+isim+" readonly>")</script>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" >SOYİSİM </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<script>document.write("<input name='isim' placeholder='İsim' class='form-control'  type='text' value="+soyisim+" readonly>")</script>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label">CİNSİYET</label>
								<div class="col-md-4">
									<div class="input">
										
											<script>document.write("<input name='isim' placeholder='İsim' class='form-control'  type='text' value="+cinsiyet+" readonly>")</script>
										
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" >DOĞUM TARİHİ </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<script>document.write("<input name='dogum' placeholder='Doğum tarihi' class='form-control'  type='date' value="+dogum_tarihi+" readonly>")</script>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
				
				<!--CV BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">CV BİLGİLERİ</div>
						
						<div class="panel-body">

							<div class="form-group">
								<label class="col-md-5 control-label" >CV </label> 
								<div class="col-md-5 inputGroupContainer">
									<div class="input-group">
										<label class="col-md-5" style="padding-top:7px;">
											<a href = <?php echo $cv_dosya; ?> > INDIR </a>
										</label>
									</div>
								</div>
							</div>
						</div>
				</div>
				
			<!--EĞİTİM BİLGİLERİ PANELİ-->			
			<div class="panel panel-default">
						<div class="panel-heading">EĞİTİM BİLGİLERİ</div>
						
						<div class="panel-body">
							<div class="row" id="dynamic-field">
								<script>
								
									for(i = 0; i<egitimnum; i++){

										$("#dynamic-field").append('<div class="col-sm-4" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-7 control-label">'+uniderece_isimleri[i]+'</label></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">UNİVERSİTE</label><div class="col-sm-8"><input type="text" name="uni[]" class="form-control" value = '+universite_isimleri[i]+' readonly ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BÖLÜM</label><div class="col-sm-8"><input type="text" name="bol[]" class="form-control " value = '+bolum_isimleri[i]+' readonly></div></div></div><input type="hidden" name="derece[]" value="universite"><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">EGİTİM DİLİ</label><div class="col-sm-8"><input type="text" name="yab[]" class="form-control " value = '+unidil_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">GİRİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unigiris[]" class="form-control" value = '+unibaslangic_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BİTİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unibitis[]" class="form-control" value = '+unibitis_isimleri[i]+' readonly></div></div></div></div>');

									}
									
								</script>							
							</div>
						</div>
			</div>
			
			<!--EĞİTİM BİLGİLERİ PANELİ-->
			<div class="panel panel-default">
				<div class="panel-heading">DİL BİLGİLERİ</div>
				
							<div class="row" id="dynamic-field2">
							
								<script>
								
									for(i = 0; i<dilnum; i++){

										$("#dynamic-field2").append('<div class="col-sm-4" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label"></label></div></div><div class="form-group"><label class="col-sm-3 control-label">YABANCI DİL</label><div class="col-sm-8"><input type="text" name="yabancidil[]" class="form-control " value = '+dil_isimleri[i]+' readonly ></div></div><div class="form-group"><label class="col-sm-3 control-label" >SEVİYE</label><div class="col-sm-9"><label><input type="text" name="seviye[]" class="form-control " value = '+dil_seviyeleri[i]+' readonly ></label></div></div></div>');

									}
									
								</script>							
									
							</div>				
				<div class="panel-body">
				
				</div>
			</div>			
			
			<!--DENEYİM BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">DENEYİM BİLGİLERİ</div>
						
						<div class="panel-body">
							<div class="row" id="dynamic-field3">
								
								<script>
								
									for(i = 0; i<deneyimnum; i++){

										$("#dynamic-field3").append('<div class="col-sm-4" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label">DENEYİM</label></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">ŞİRKET</label><div class="col-sm-8"><input type="text" name="sirket[]" class="form-control" value = '+sirket_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">POZİSYON</label><div class="col-sm-8"><input type="text" name="poz[]" class="form-control " value = '+pozisyon_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">GİRİS TARİHİ</label><div class="col-sm-8"><input type="date" name="isgiris[]" class="form-control" value = '+isgiris_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">ÇIKIŞ TARİHİ</label><div class="col-sm-8"><input type="date" name="isbitis[]" class="form-control" value = '+iscikis_isimleri[i]+' readonly></div></div></div><div class="col-sm-8"></div></div>');

									}
								
								</script>								
							</div>
						</div>
				</div>
				
				<!--REFERANS BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">REFERANS BİLGİLERİ</div>
						
						<div class="panel-body">
							<div class="row" id="dynamic-field4">
							
								<script>
								
									for(i = 0; i<referansnum; i++){

										$("#dynamic-field4").append('<div class="col-sm-4" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label">REFERANS</label></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">REF. İSİM</label><div class="col-sm-8"><input type="text" name="refisim[]" class="form-control" value = '+refad_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">REF. SOYİSİM</label><div class="col-sm-8"><input type="text" name="refsoyisim[]" class="form-control " value = '+refsoyad_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">TELEFON</label><div class="col-sm-8"><input type="number" name="reftel[]" class="form-control" value = '+reftel_isimleri[i]+' readonly></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">UNVAN</label><div class="col-sm-8"><input type="text" name="refunvan[]" class="form-control" value = '+refunvan_isimleri[i]+' readonly></div></div></div><div class="col-sm-8"></div></div>');

									}
								
								</script>							
							</div>
						</div>
				</div>
				
				<!--İLETİSİM BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">İLETİŞİM BİLGİLERİ</div>
						
						<div class="panel-body">
									
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">İL</label>
											<div class="col-sm-4">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
												<script>document.write("<input class='form-control'  type='text' value="+il+" readonly>")</script>
												</div>
											</div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">İLÇE</label>
											<div class="col-sm-4">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
												<script>document.write("<input class='form-control'  type='text' value="+ilce+" readonly>")</script>
												</div>
											</div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">TELEFON</label>
											<div class="col-sm-4">
												<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
													<script>document.write("<input class='form-control'  type='number' value="+telefon+" readonly>")</script>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-4 control-label">EMAİL</label>
											<div class="col-sm-4">
											<div class="input-group">
													<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												<script>document.write("<input class='form-control' type='text' value="+email+" readonly>")</script>
											</div>
											</div>
										</div>
									</div>
									
						</div>
				</div>

				<!--AÇIKLAMA BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">EK AÇIKLAMA</div>
						
						<div class="panel-body">

							<div class="form-group">
								<label class="col-md-4 control-label" >AÇIKLAMALAR</label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<textarea rows="4" cols="50" name="acıklama" readonly>Açıklama</textarea>
									</div>
								</div>
							</div>
						</div>
				</div>

                <p>
                    <!--
						<button class="btn btn-danger sil-btn" name="delete-cv" value="delete-cv" onclick="location.href='deletecv.php?id=<?php //echo $_GET['id']; ?>';">SİL</button>
						<button class="btn btn-warning duzenle-btn" name="edit-cv" value="edit-cv" onclick="location.href='editcv.php?id=<?php //echo $_GET['id']; ?>';">DÜZENLE</button>
					-->
					<button class="btn btn-danger sil-btn" name="delete-cv" value="" onclick="window.close();">KAPAT</button>
                </p>
                
            </div>
        </div>
        
    </body>
	
	<!--<footer>
		<p>Footer</p>
	</footer>
	-->
</html>