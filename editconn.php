<?php
	
	//CONNECTION INFO
	$servername = "localhost";
	$username = "root";
	$password  = "";
	$dbname = "sv";
	
	//CONNECT
	$conn4 = new mysqli($servername, $username, $password, $dbname);
	
	//function delete_cv($id) {
		$id_n = $_REQUEST['idhere'];
		
		$delete_deneyim = "DELETE FROM deneyim WHERE id = '".$id_n."' ";
		$delete_iletisim = "DELETE FROM iletisim WHERE id = '".$id_n."' ";
		$delete_dil = "DELETE FROM dil WHERE id = '".$id_n."' ";
		$delete_egitim = "DELETE FROM egitim WHERE id = '".$id_n."' ";
		$delete_referans = "DELETE FROM referans WHERE id = '".$id_n."' ";
		$delete_profil = "DELETE FROM profil WHERE id = '".$id_n."' ";
		
		if ($conn4->query($delete_deneyim) === TRUE) {
			echo "DENEYIM Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_iletisim) === TRUE) {
			echo "ILETISIM Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_dil) === TRUE) {
			echo "DIL Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_egitim) === TRUE) {
			echo "EGITIM Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_referans) === TRUE) {
			echo "REFERANS Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}
		
		if ($conn4->query($delete_profil) === TRUE) {
			echo " PROFÄ°L Record deleted successfully<br>";
		} else {
			echo "Error deleting record: " . $conn4->error;
		}

	//}
//GET PERSONAL VARIABLES
		$isim = $_POST["isim"];
		$soyisim = $_POST["soyisim"];
		$aciklama = $_POST["acıklama"];
		$cinsiyet = $_POST["cinsiyet"];
		$dogum = $_POST["dogum"];
		
		//FIRST INSERT INTO PROFIL
		$sql = "INSERT INTO profil
				SET 	ad = '". $isim. "',
						soyad = '". $soyisim. "',
						aciklama = '". $aciklama. "',
						cinsiyet = '". $cinsiyet. "',
						dogutarihi = '". $dogum. "',
						id = '".$id_n."'";

		if (mysqli_query($conn4, $sql)) {
			echo "New record for <b>PROFIL</b> table created <b>SUCCESSFULLY</b><br>";
		} else {
			echo "Error in PROFIL: " . $sql . "<br>" . mysqli_error($conn4);
		}		
		
		//THEN INSERT UNIVERSITY INFORMATION
		if(is_array($_POST["uni"])){
			
			$uninumber = count($_POST["uni"]);
			
			if($uninumber > 1){
				
				for($i=0; $i<$uninumber; $i++){
					
					$universite = $_POST["uni"][$i];
					$bolum = $_POST["bol"][$i];
					$unigiris = $_POST["unigiris"][$i];
					$unibitis = $_POST["unibitis"][$i];
					$yabanci_dil = $_POST["yab"][$i];
					$derece_bil = $_POST["derece"][$i];
					
					$sql3="INSERT INTO egitim 
					SET universite = 		'". $universite ."',
						bolum = 			'". $bolum ."',
						baslangic_tarihi = 	'". $unigiris ."',
						bitis_tarihi = 		'". $unibitis ."',
						yabanci_dil = 		'". $yabanci_dil ."',
						egitimderecesi =	'". $derece_bil ."',
					id = '".$id_n."'";
					
					if (mysqli_query($conn4, $sql3)) {
						echo "New record for <b>EGITIM</b> table created <b>SUCCESSFULLY</b><br>";
					} else {
						echo "Error in EGITIM: " . $sql3 . "<br>" . mysqli_error($conn4);
					}
					
				}
			}
		}else{
			
			$universite = $_POST["uni"];
			$bolum = $_POST["bol"];
			$unigiris = $_POST["unigiris"];
			$unibitis = $_POST["unibitis"];
			$yabanci_dil = $_POST["yab"];
			$derece_bil = $_POST["derece"];
			
			$sql3="INSERT INTO egitim 
			SET universite = 		'". $universite ."',
				bolum = 			'". $bolum. "',
				baslangic_tarihi = 	'". $unigiris. "',
				bitis_tarihi = 		'". $unibitis. "',
				yabanci_dil = 		'". $yabanci_dil ."',
				egitimderecesi =	'". $derece_bil ."',
			id = '".$id_n."'";
			
			if (mysqli_query($conn4, $sql3)) {
				echo "New record for <b>EGITIM</b> table created <b>SUCCESSFULLY</b><br>";
			} else {
				echo "Error in EGITIM: " . $sql3 . "<br>" . mysqli_error($conn4);
			}
		}
		//END OF UNIVERSITY
		
		//THEN INSERT LANGUAGE INFORMATION
		if(is_array($_POST["yabancidil"])){
			
			$dilnumber = count($_POST["yabancidil"]);
			
			if($dilnumber > 1){
				
				for($i=0; $i<$dilnumber; $i++){
					
					$diladi = $_POST["yabancidil"][$i];
					$dilseviye = $_POST["dilseviye"][$i];
					
					$sql7="INSERT INTO dil 
					SET dil_adi = 			'". $diladi ."',
						seviye = 			'". $dilseviye ."',
					id = '".$id_n."'";
					
					if (mysqli_query($conn4, $sql7)) {
						echo "New record for <b>DİL</b> table created <b>SUCCESSFULLY</b><br>";
					} else {
						echo "Error in EGITIM: " . $sql7 . "<br>" . mysqli_error($conn4);
					}
				}
			}else{
					$diladi = $_POST["yabancidil"];
					$dilseviye = $_POST["dilseviye"];
					
					$sql7="INSERT INTO dil 
					SET dil_adi = 			'". $diladi ."',
						seviye = 			'". $dilseviye ."',
					id = '".$id_n."'";
					
					if (mysqli_query($conn4, $sql7)) {
						echo "New record for <b>DİL</b> table created <b>SUCCESSFULLY</b><br>";
					} else {
						echo "Error in EGITIM: " . $sql7 . "<br>" . mysqli_error($conn4);
					}				
			}
		}
		//END OF LANGUAGE
		
		//THEN INSERT DENEYIM INFORMATION
		if(is_array($_POST["sirket"])){
			
			$sirketnumber = count($_POST["sirket"]);
			
			if($sirketnumber > 1){
				
				for($i=0; $i<$sirketnumber; $i++){
					
					$sirket_adi = $_POST["sirket"][$i];
					$pozisyon = $_POST["poz"][$i];
					$baslangic_tarihi = $_POST["isgiris"][$i];
					$bitis_tarihi = $_POST["isbitis"][$i];
					
					$sql4="INSERT INTO deneyim
					SET sirket_adi = 		'". $sirket_adi ."',
						pozisyon = 			'". $pozisyon. "',
						baslangic_tarihi = 	'". $baslangic_tarihi ."',
						bitis_tarihi = 		'". $bitis_tarihi ."',
					id = '".$id_n."'";
					
					if (mysqli_query($conn4, $sql4)) {
						echo "New record for <b>DENEYIM</b> table created <b>SUCCESSFULLY</b><br>";
					} else {
						echo "Error in DENEYIM: " . $sql4 . "<br>" . mysqli_error($conn4);
					}
					
				}
			}
		}else{
			
			$sirket_adi = $_POST["sirket"];
			$pozisyon = $_POST["poz"];
			$baslangic_tarihi = $_POST["isgiris"];
			$bitis_tarihi = $_POST["isbitis"];
			
			$sql4="INSERT INTO deneyim
			SET sirket_adi = 		'". $sirket_adi ."',
				pozisyon = 			'". $pozisyon. "',
				baslangic_tarihi = 	'". $baslangic_tarihi ."',
				bitis_tarihi = 		'". $bitis_tarihi ."',
			id = '".$id_n."'";
			
			if (mysqli_query($conn4, $sql4)) {
				echo "New record for <b>DENEYIM</b> table created <b>SUCCESSFULLY</b><br>";
			} else {
				echo "Error in DENEYIM: " . $sql4 . "<br>" . mysqli_error($conn4);
			}
		}//END OF DENEYIM
		
		//THEN INSERT REFERANS INFORMATION
		if(is_array($_POST["refisim"])){
			
			$refnumber = count($_POST["refisim"]);
			
			if($refnumber > 1){
				
				for($i=0; $i<$refnumber; $i++){
					
					$refad = $_POST["refisim"][$i];
					$refsoyad = $_POST["refsoyisim"][$i];
					$reftelefon = $_POST["reftel"][$i];
					$refunvan = $_POST["refunvan"][$i];					
					
					$sql5="INSERT INTO referans
					SET refad = 		'". $refad ."',
						refsoyad = 		'". $refsoyad ."',
						reftelefon = 	'". $reftelefon ."',
						unvan = 		'". $refunvan ."',
					id = '".$id_n."'";
					
					if (mysqli_query($conn4, $sql5)) {
						echo "New record for <b>REFERANS</b> table created <b>SUCCESSFULLY</b><br>";
					} else {
						echo "Error in REFERANS: " . $sql5 . "<br>" . mysqli_error($conn4);
					}					
				}
			}
		}else{
			
			$refad = $_POST["refisim"];
			$refsoyad = $_POST["refsoyisim"];
			$reftelefon = $_POST["reftel"];
			$refunvan = $_POST["refunvan"];
			
			$sql5="INSERT INTO referans
			SET refad = 		'". $refad ."',
				refsoyad = 		'". $refsoyad ."',
				reftelefon = 	'". $reftelefon ."',
				unvan = 		'". $refunvan ."',
			id = '".$id_n."'";
			
			if (mysqli_query($conn4, $sql5)) {
				echo "New record for <b>REFERANS</b> table created <b>SUCCESSFULLY</b><br>";
			} else {
				echo "Error in REFERANS: " . $sql5 . "<br>" . mysqli_error($conn4);
			}
			
		}
		//END OF REFERANS
		
		//GET ILETISIM INFO
		$il = $_POST["il"];
		$ilce = $_POST["ilce"];
		$telefon = $_POST["telefon"];
		$email = $_POST["email"];
		
		//INSERT INTO ILETISIM
		$sql6="INSERT INTO iletisim
		SET il = 		'". $il ."',
			ilce = 		'".	$ilce ."',
			telefon = 	'".	$telefon ."',
			email = 	'".	$email ."',
		id = '".$id_n."'";
		
		if (mysqli_query($conn4, $sql6)) {
			echo "New record for <b>ILETISIM</b> table created <b>SUCCESSFULLY</b><br>";
		} else {
			echo "Error in ILETISIM: " . $sql6 . "<br>" . mysqli_error($conn4);
		}
		
		//UPLOAD PICTURE
	if(isset($_FILES['dosya'])){
		   $hata = $_FILES['dosya']['error'];
		   if($hata != 0) {
			  echo 'Yüklenirken bir hata gerçekleşmiş.';
		   } else {
			  $boyut = $_FILES['dosya']['size'];
			  if($boyut > (1024*1024*3)){
				 echo 'Dosya 3MB den büyük olamaz.';
			  } else {
				  
				 $tip = $_FILES['dosya']['type'];
				 $isim = $_FILES['dosya']['name'];
				 $uzanti = explode('.', $isim);
				 $uzanti = $uzanti[count($uzanti)-1];
				 
				 if($tip != 'image/jpeg' || $uzanti != 'jpg') {
					echo 'Yanlızca JPG dosyaları gönderebilirsiniz.';
				 } else {
					
					$dizin = 'upload/';
					$yuklenecek_dosya = $dizin.basename($_FILES['dosya']['name']);
					
					if (move_uploaded_file($_FILES['dosya']['tmp_name'], $yuklenecek_dosya))
					{
						echo "Dosya geçerli ve başarıyla yüklendi.<br>";
					} else {
						echo "Dosya yükleme hatası!<br>";
					}
					
					$sqlphoto = "UPDATE profil 
						SET fotograf = '". $yuklenecek_dosya. "'
						WHERE id='".$id_n."'";
					
					if(mysqli_query($conn4, $sqlphoto)){
						echo 'Dosya bilgileri <b>yerleştirildi ! </b>';
					}else{
						echo 'Dosya bilgileri <b>yerleştirilemedi !</b>';
				 }
			  }
		   }
		}
	}
	//UPLOAD CV
		if(isset($_FILES['cvdosya'])){
		   $hata = $_FILES['cvdosya']['error'];
		   if($hata != 0) {
			  echo 'Yüklenirken bir hata gerçekleşmiş.';
		   } else {
			  $boyut = $_FILES['cvdosya']['size'];
			  if($boyut > (1024*1024*3)){
				 echo 'Dosya 3MB den büyük olamaz.';
			  } else {
				  
				 $tip = $_FILES['cvdosya']['type'];
				 $isim = $_FILES['cvdosya']['name'];
				 $uzanti = explode('.', $isim);
				 $uzanti = $uzanti[count($uzanti)-1];
				 
				 if($uzanti != 'pdf') {
					echo 'Yanlızca PDF dosyaları gönderebilirsiniz.';
				 } else {
					
					$dizin = 'cvupload/';
					$yuklenecek_dosya = $dizin.basename($_FILES['cvdosya']['name']);
					
					if (move_uploaded_file($_FILES['cvdosya']['tmp_name'], $yuklenecek_dosya))
					{
						echo "Dosya geçerli ve başarıyla yüklendi.<br>";
					} else {
						echo "Dosya yükleme hatası!<br>";
					}
					
					$sqlcv = "UPDATE profil 
						SET cvdosyasi = '". $yuklenecek_dosya. "'
						WHERE id='".$id_n."'";
					
					if(mysqli_query($conn4, $sqlcv)){
						echo 'CV Dosya bilgileri <b>yerleştirildi ! </b>';
					}else{
						echo 'CV Dosya bilgileri <b>yerleştirilemedi !</b>';
				 }
			  }
		   }
		}
	}
?>