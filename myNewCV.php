<?php session_start();?>

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
		<script src="addMore.js"></script>
		<script src="ShowPhoto.js"></script>
		
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
            <a class="active" href="add.php">Ekle</a>
        </div>
	-->	
		<nav class="navbar navbar-default">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand">SiteName</a>
			</div>
			<ul class="nav navbar-nav">
			</ul>
			<ul class="nav navbar-nav navbar-right">
			  <li><a href="editMyAccount.php"><span class="glyphicon glyphicon-user"></span> Kullanıcı Adı</a></li>
			  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Çıkış </a></li>
			</ul>
		  </div>
		</nav>
		
        <div class="container">
		
			<div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12">
				<h2>Yeni Kayıt</h2>
			  </div>
			</div>
			
            <form class="form-horizontal" action="insertMyNewCV.php" method="POST" enctype="multipart/form-data"><!--ACTION-->
			
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
											<img id="blah" src="#" alt="Resim Seçilmedi" class="centered"/><br>
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
										<input name="isim" placeholder="İsim" class="form-control"  type="text">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" >SOYİSİM </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input name="soyisim" placeholder="Soyisim" class="form-control"  type="text">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label">CİNSİYET</label>
								<div class="col-md-4">
									<div class="radio">
										<label>
											<input type="radio" name="cinsiyet" value="Erkek" /> Erkek
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="cinsiyet" value="kadin" /> Kadın
										</label>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" >DOĞUM TARİHİ </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input name="dogum" placeholder="Doğum tarihi" class="form-control"  type="date">
									</div>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-md-4 control-label" >FOTOĞRAF SEÇ </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<input type='file' name="dosya" onchange="readURL(this);" />
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
								<label class="col-md-4 control-label" >CV SEÇ </label> 
								<div class="col-md-4 inputGroupContainer">
									<div class="input-group">
										<input type='file' name="cvdosya" />
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
							
								<div class="col-sm-4" >
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-8 control-label">ÜNİVERSİTE</label>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">UNİVERSİTE</label>
											<div class="col-sm-8"><input type="text" name="uni[]" class="form-control" ></div>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">BÖLÜM</label>
											<div class="col-sm-8"><input type="text" name="bol[]" class="form-control " ></div>
										</div>
									</div>
									
									<input type="hidden" name="derece[]" value="universite">
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">EGİTİM DİLİ</label>
											<div class="col-sm-8"><input type="text" name="yab[]" class="form-control " ></div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">GİRİS TARİHİ</label>
											<div class="col-sm-8"><input type="date" name="unigiris[]" class="form-control" ></div>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">BİTİS TARİHİ</label>
											<div class="col-sm-8"><input type="date" name="unibitis[]" class="form-control" ></div>
										</div>
									</div>
									
									<hr><!--HORIZINTAL LINE-->
									
									<div class="row-sm-4">
										<div class="form-group">
										  <label class="col-sm-3 control-label" >EĞİTİM</label>
										  <div class="col-sm-6">
										  <select class="form-control" id="sel1">

											<option>Üniversite</option>
											<option>Yüksek Lisans</option>
											<option>Doktora</option>
											
										  </select>
										  </div><button id="add-more" name="add-more" type="button" class="btn btn-primary btn-sm">EKLE</button>									
										</div><hr>
									</div>

									
								</div>
							</div>
						</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">DİL BİLGİLERİ</div>
				
							<div class="row" id="dynamic-field2">
							
									<div class="col-sm-4">
									
										<div class="row-sm-4">
											<div class="form-group">
												<label class="col-sm-8 control-label"></label>
											</div>
										</div>	
										
											<div class="form-group">
												<label class="col-sm-3 control-label">YABANCI DİL</label>
												<div class="col-sm-8"><input type="text" name="yabancidil[]" class="form-control " ></div>
											</div>
											<div class="form-group">
											  <label class="col-sm-3 control-label" >SEVİYE</label>
											  <div class="col-sm-6">
											  <select class="form-control" id="sel1" name="dilseviye[]">

												<option value="Baslangic">Başlangıç</option>
												<option value="Orta">Orta</option>
												<option value="Iyı">İyi</option>
												<option value="Ileri">İleri</option>
												
											  </select>
											  </div><button id="add-more-lang" name="add-more-lang" type="button" class=" btn btn-primary btn-sm">EKLE</button>
											</div>
									</div>
									
							</div>				
				<div class="panel-body">
				
				</div>
			</div>
			
			<!--DENEYİM BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">DENEYİM BİLGİLERİ</div>
						
						<div class="panel-body">
							<div class="row" id="dynamic-field3">
							
								<div class="col-sm-4" >
								
									<div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label">DENEYİM</label></div></div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">ŞİRKET</label>
											<div class="col-sm-8"><input type="text" name="sirket[]" class="form-control" ></div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">POZİSYON</label>
											<div class="col-sm-8"><input type="text" name="poz[]" class="form-control " ></div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">GİRİS TARİHİ</label>
											<div class="col-sm-8"><input type="date" name="isgiris[]" class="form-control" ></div>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">ÇIKIŞ TARİHİ</label>
											<div class="col-sm-8"><input type="date" name="isbitis[]" class="form-control" ></div>
										</div>
										
									</div>
									
									<div class="col-sm-8">
										<button id="add-more-den" name="add-more-den" type="button" class="btn btn-primary btn-sm">EKLE</button>
									</div>
								</div>
								
							</div>
						</div>
				</div>
				
				<!--REFERANS BİLGİLERİ PANELİ-->
				<div class="panel panel-default">
						<div class="panel-heading">REFERANS BİLGİLERİ</div>
						
						<div class="panel-body">
							<div class="row" id="dynamic-field4">
								<div class="col-sm-4" >
								
								<div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label">REFERANS</label></div></div>
								
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">REF. İSİM</label>
											<div class="col-sm-8"><input type="text" name="refisim[]" class="form-control" ></div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">REF. SOYİSİM</label>
											<div class="col-sm-8"><input type="text" name="refsoyisim[]" class="form-control " ></div>
										</div>
									</div>

									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">TELEFON</label>
											<div class="col-sm-8"><input type="number" name="reftel[]" class="form-control" ></div>
										</div>
									</div>
									
									<div class="row-sm-4">
										<div class="form-group">
											<label class="col-sm-3 control-label">UNVAN</label>
											<div class="col-sm-8"><input type="text" name="refunvan[]" class="form-control" ></div>
										</div>
									</div>
									
									<div class="col-sm-8">
										<button id="add-more-ref" name="add-more-ref" type="button" class="btn btn-primary btn-sm">EKLE</button>
									</div>
									
								</div>
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
												<input type="text" name="il" class="form-control" >
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
											<input type="text" name="ilce" class="form-control " >
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
											<input type="number" name="telefon" class="form-control" >
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
														<input type="text" name="email" class="form-control" >
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
										<textarea rows="4" cols="50" name="acıklama"></textarea>
									</div>
								</div>
							</div>
						</div>
				</div>

                <p>
                    <input  class ="btn btn-success gonder-btn" type="submit"></input><!--?-->
                </p>
                
            </form>
        </div>
        
        <!--<footer>
            <p>Footer</p>
        </footer>-->
        
    </body>
</html>