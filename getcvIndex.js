$(document).ready(function () {

		$("#get-cvs").click(function(e){

			//CLEAR PAGE
			var div = document.getElementById('dynamic-field-grid');
			
			while(div.firstChild){
				div.removeChild(div.firstChild);
			}
			
			//GET PERSONAL INFORMATION VARİABLES//
			var isim = document.getElementById('isimid').value;
			var soyisim = document.getElementById('soyisimid').value;
			var cinsiyet;
			if (document.getElementById('Erkekinputid').checked) {
					cinsiyet = document.getElementById('Erkekinputid').value;
				}
			else if(document.getElementById('Kadıninputid').checked){
					cinsiyet = document.getElementById('Kadıninputid').value;
			}
			else if(document.getElementById('Farkinputid').checked){
					cinsiyet = document.getElementById('Farkinputid').value;
			}			
			var yasmin = document.getElementById('yasminid').value;
			var yasmax = document.getElementById('yasmaxid').value;
			
			//GET LOCATION VARIABLES//
			var il = document.getElementById('ilid').value;
			
			/*
			var yaka;
			if (document.getElementById('avrupa').checked) {
				yaka = document.getElementById('avrupa').value;
			}
			else if(document.getElementById('anadolu').checked){
				yaka = document.getElementById('anadolu').value;
			}
			*/
			
			var ilce = document.getElementById('ilceid').value;
			
			//GET EDUCATION VARIABLES//
			var uni = document.getElementById('uniid').value;
			
			/*
			var yuklis;
			if (document.getElementById('yuklis').checked) {
				yuklis = 1;
			}else {
				yuklis = 0;
			}
			
			var dok;
			if (document.getElementById('doktor').checked) {
				dok = 1;
			}else {
				dok = 0;
			}
			*/
			
			var bolum = document.getElementById("bolumid").value;
			var uniegitimdili = document.getElementById("unidilid").value;
			
			//GET LANGUAGE INFORMATIONS//
			var yabancidil = document.getElementById("yabancidilid").value;
			
			//var yabancidil = $("input[name='yabancidilid[]']").map(function(){return $(this).val();}).get();
			//var yabancidilseviye = $("input[name='dilseviye[]']").map(function(){return $(this).val();}).get();

			//GET EXPERIENCE INFORMATIONS//
			var sirdeneyim = document.getElementById("sirketid").value;
			var pozdeneyim = document.getElementById("pozisyonid").value;
			var mindeneyim = document.getElementById("deneyiminid").value;
			var maxdeneyim = document.getElementById("deneyimmaxid").value;
			
			/*
			var topmindeneyim = document.getElementById("topdeneyiminid").value;
			var topmaxdeneyim = document.getElementById("topdeneyimmaxid").value;
			*/
			
			var tarih = new Date();
			tarih = tarih.getFullYear();
			
			var ajax = new XMLHttpRequest();
			var method = "POST";
			var url = "getdata.php?isim="+isim+"&soyisim="+soyisim+"";
			var asynchronous = true;
			
			ajax.open(method, url, asynchronous);
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send();
			
			ajax.onreadystatechange = function(){
				
				if(this.readyState==4 && this.status == 200)
				{
					
					var datas = JSON.parse(this.responseText);
					var id_list = [];
					
					for(var a = 0; a<datas.length; a++){
																		
							var id = datas[a].id;
							
							var firstName = datas[a].ad;
							var lastName = datas[a].soyad;
							var fotoLink = datas[a].fotograf;
							var cins = datas[a].cinsiyet;
							var birthDate = datas[a].dogutarihi;
							
							var sirketAdi = datas[a].sirket_adi;
							var pozisyon = datas[a].pozisyon;
							var pozGiris = datas[a].baslangic_tarihi;
							var pozCıkıs = datas[a].bitis_tarihi;
							
							var il_adi = datas[a].il;
							var ilce_adi = datas[a].ilce;
							
							var uniAdi = datas[a].universite;
							var egitimAdi = datas[a].egitimderecesi;
							var dilAdi = datas[a].yabanci_dil;
							var bolumAdi = datas[a].bolum;
							
							var lang_name= datas[a].dil_adi;
							
							var dogum_tar = birthDate.slice(0,4);
							var dogum_tar = parseInt(dogum_tar, 10);
							var yas = tarih - dogum_tar;
							
							var isgiris_tarihi = pozGiris.slice(0, 4);
							var isgiris_tarihi = parseInt(isgiris_tarihi);
							
							var iscikis_tarihi = pozCıkıs.slice(0, 4);
							var iscikis_tarihi = parseInt(iscikis_tarihi);
							var pozisyon_deneyim = iscikis_tarihi - isgiris_tarihi;
							
							if( ((isim == firstName) || (isim == "" || isim == null)) && //isim//
								((soyisim == lastName) || (soyisim == "" || soyisim == null)) && //soyisim//
								((cinsiyet == cins) || (cinsiyet == "Fark") || (cinsiyet == "" || cinsiyet == null)) && //cinsiyet//
								(((yas >= yasmin) && (yas <= yasmax)) || ( yas >= yasmin && yasmax == "") || ( yasmin == "" && yasmax >= yas) || ( yasmin == "" && yasmax == "") ) && //yas//
								
								((ilce == ilce_adi) || (ilce == "" || ilce == null)) && //il//
								((il == il_adi) || (il == "" || il == null)) && //ilce//
								
								((uni == uniAdi) || (uni == "" || uni == null)) && //universite//
								((bolum == bolumAdi) || (bolum == "" || bolum == null)) && //bolum//
								((uniegitimdili == dilAdi) || (uniegitimdili == "" || uniegitimdili == null)) && //egitim dili//
								/*(
								
								(egitimAdi == "yukseklisans" && yuklis == 1 ) ||
								
								(egitimAdi == "doktora" && dok == 1 ) ||
								
								((egitimAdi == "universite" && yuklis == 0 &&  dok == 0) || (egitimAdi == "" && yuklis == 0 &&  dok == 0))
								
								) && */
								((yabancidil == lang_name) || (yabancidil == "" || yabancidil == null)) && //dil//
								((sirdeneyim == sirketAdi) || (sirdeneyim == "" || sirdeneyim == null)) && //sirket ismi//
								((pozdeneyim == pozisyon) || (pozdeneyim == "" || pozdeneyim == null)) && //pozisyon ismi//
								(((pozisyon_deneyim >= mindeneyim) && (pozisyon_deneyim <= maxdeneyim)) || ( pozisyon_deneyim >= mindeneyim && maxdeneyim == "") || ( mindeneyim == "" && maxdeneyim >= pozisyon_deneyim) || ( mindeneyim == "" && maxdeneyim == "") )&&
								(!id_list.includes(id))
								
							){
								
									$("#dynamic-field-grid").append('<a href="cv.php?id='+id+'" target="_blank" ><div class="col-sm-3"><img src="'+fotoLink+'" height="250" width="250"><h4 class="row-sm-4">'+firstName+' '+lastName+'</h4><h4 class="row-sm-4"> '+cins+' '+yas+'</h4></div></a>');
									id_list[a] = id;
								
							}
					}
				}
			}			
		});		
});