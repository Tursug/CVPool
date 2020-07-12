<?php

	//CONNECTION INFO
	//Creating HTML: PHP server-side vs. jQuery client-side
	
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "sv";
	$result;
	
	//CONNECT
	$conn2 = new mysqli($servername, $username, $password, $dbname);
	
	//REQUEST VARIABLES
	$getisim = $_REQUEST['isim'];
	$getsoyisim = $_REQUEST['soyisim'];
	
	
	//QUERY HERE 
	//OR IF ANY OF THEM EMPTY
	$result = mysqli_query($conn2, "SELECT ad, soyad, fotograf, dogutarihi 
									FROM profil 
									WHERE ad = '".$getisim."' 
															OR soyad = '".$getsoyisim."'
									");
									
	
	$resultbasic = mysqli_query($conn2, "SELECT ad, soyad, fotograf, dogutarihi FROM profil");
	
	
	$result2 = mysqli_query($conn2, "SELECT 
											profil.id,
											profil.ad, profil.soyad, profil.fotograf, profil.cinsiyet, profil.dogutarihi,
											deneyim.sirket_adi, deneyim.pozisyon, deneyim.baslangic_tarihi, deneyim.bitis_tarihi,
											egitim.universite, egitim.bolum, egitim.yabanci_dil, egitim.egitimderecesi,
											iletisim.il, iletisim.ilce,
											dil.dil_adi
											
											
									FROM profil 
											INNER JOIN deneyim ON profil.id= deneyim.id
											INNER JOIN egitim ON profil.id= egitim.id
											INNER JOIN iletisim ON profil.id= iletisim.id
											INNER JOIN dil ON profil.id= dil.id
											
									");
	
	$datas = array();
	
	while($row = mysqli_fetch_assoc($result2))
	{
		$datas[] = $row;
	}
		
	echo json_encode($datas);
?>