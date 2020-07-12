$(document).ready(function () {
	
    var u = 1;
	// ADD MORE EDUCATION
    $("#add-more").click(function(e){
		var e = document.getElementById("sel1");
		var strUser = e.options[e.selectedIndex].value;

		if(strUser=="Üniversite"){
			u++;
			$("#dynamic-field").append('<div class="col-sm-4" id="row'+u+'" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-7 control-label">ÜNİVERSİTE</label><div class="col-sm-3"><button id="'+u+'" name="remove" type="button" class="btn btn-danger btn-sm btn_remove">SİL</button></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">UNİVERSİTE</label><div class="col-sm-8"><input type="text" name="uni[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BÖLÜM</label><div class="col-sm-8"><input type="text" name="bol[]" class="form-control " ></div></div></div><input type="hidden" name="derece[]" value="universite"><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">EGİTİM DİLİ</label><div class="col-sm-8"><input type="text" name="yab[]" class="form-control " ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">GİRİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unigiris[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BİTİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unibitis[]" class="form-control" ></div></div></div></div>');
		}else if(strUser=="Yüksek Lisans"){
			u++;
			$("#dynamic-field").append('<div class="col-sm-4" id="row'+u+'" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-7 control-label">YÜKSEK LİSANS</label><div class="col-sm-3"><button id="'+u+'" name="remove" type="button" class="btn btn-danger btn-sm btn_remove">SİL</button></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">UNİVERSİTE</label><div class="col-sm-8"><input type="text" name="uni[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BÖLÜM</label><div class="col-sm-8"><input type="text" name="bol[]" class="form-control " ></div></div></div><input type="hidden" name="derece[]" value="yukseklisans"><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">EGİTİM DİLİ</label><div class="col-sm-8"><input type="text" name="yab[]" class="form-control " ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">GİRİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unigiris[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BİTİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unibitis[]" class="form-control" ></div></div></div></div>');
				
		}else if(strUser=="Doktora"){
			u++;
			$("#dynamic-field").append('<div class="col-sm-4" id="row'+u+'" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-7 control-label">DOKTORA</label><div class="col-sm-3"><button id="'+u+'" name="remove" type="button" class="btn btn-danger btn-sm btn_remove">SİL</button></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">UNİVERSİTE</label><div class="col-sm-8"><input type="text" name="uni[]" class="form-control" ></div></div></div><input type="hidden" name="derece[]" value="doktora"><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">EGİTİM DİLİ</label><div class="col-sm-8"><input type="text" name="yab[]" class="form-control " ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BÖLÜM</label><div class="col-sm-8"><input type="text" name="bol[]" class="form-control " ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">GİRİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unigiris[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">BİTİS TARİHİ</label><div class="col-sm-8"><input type="date" name="unibitis[]" class="form-control" ></div></div></div></div>');
		}
    });
	
	//ADD MORE EXPERIENCE
	$("#add-more-den").click(function(e){
		u++;
		$("#dynamic-field3").append('<div class="col-sm-4" id="row'+u+'" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label">DENEYİM</label></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">ŞİRKET</label><div class="col-sm-8"><input type="text" name="sirket[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">POZİSYON</label><div class="col-sm-8"><input type="text" name="poz[]" class="form-control " ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">GİRİS TARİHİ</label><div class="col-sm-8"><input type="date" name="isgiris[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">ÇIKIŞ TARİHİ</label><div class="col-sm-8"><input type="date" name="isbitis[]" class="form-control" ></div></div></div><div class="col-sm-8"><button id="'+u+'" name="add-more-den" type="button" class="btn btn-danger btn-sm btn_remove">SİL</button></div></div>');
	});
	
	//ADD MORE LANGUAGE
	$("#add-more-lang").click(function(e){
		u++;
		$("#dynamic-field2").append('<div class="col-sm-4" id="row'+u+'" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label"></label></div></div><div class="form-group"><label class="col-sm-3 control-label">YABANCI DİL</label><div class="col-sm-8"><input type="text" name="yabancidil[]" class="form-control " ></div></div><div class="form-group"><label class="col-sm-3 control-label" >SEVİYE</label><div class="col-sm-6"><select class="form-control" id="sel1" name="dilseviye[]"><option value="Baslangic" >Başlangıç</option><option value="Orta" >Orta</option><option value="Iyı" >İyi</option><option value="Ileri" >İleri</option></select></div><button id="'+u+'" name="add-more" type="button" class="btn btn-danger btn-sm btn_remove">SİL</button></div></div>');
	});
	
	//ADD MORE REFERANCE
	$("#add-more-ref").click(function(e){
		u++;
		$("#dynamic-field4").append('<div class="col-sm-4" id="row'+u+'" ><div class="row-sm-4"><div class="form-group"><label class="col-sm-8 control-label">REFERANS</label></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">REF. İSİM</label><div class="col-sm-8"><input type="text" name="refisim[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">REF. SOYİSİM</label><div class="col-sm-8"><input type="text" name="refsoyisim[]" class="form-control " ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">TELEFON</label><div class="col-sm-8"><input type="number" name="reftel[]" class="form-control" ></div></div></div><div class="row-sm-4"><div class="form-group"><label class="col-sm-3 control-label">UNVAN</label><div class="col-sm-8"><input type="text" name="refunvan[]" class="form-control" ></div></div></div><div class="col-sm-8"><button id="'+u+'" name="add-more-ref" type="button" class="btn btn-danger btn-sm btn_remove">SİL</button></div></div>');
	});
	
	//ADD MORE SEARCH CREITERIA
	$("#add-more-lang-search").click(function(e){
		u++;
		$("#dynamic-field2").append('<div id="row'+u+'"><div class="form-group"><label class="col-sm-3 control-label">Yabancı Dil:</label><div class="col-sm-8"><input type="text" name="yabancidilid[]" class="form-control " ></div></div><div class="form-group"><label class=" col-sm-3 control-label" >Seviye: </label><div class="col-sm-6"><select class="form-control" id="sel1" name="dilseviye[]"><option value="Farketmez">Farketmez</option><option value="Baslangic">Başlangıç</option><option value="Orta">Orta</option><option value="Iyı">İyi</option><option value="Ileri">İleri</option></select></div><button id="'+u+'" name="add-more-lang-search" type="button" class=" btn-danger btn-sm btn btn_remove">SİL</button></div></div>');
	});	
	
	//REMOVE
	$(document).on('click','.btn_remove', function(){
		var button_id = $(this).attr("id");
		$('#row'+button_id+'').remove();
	});
	
	//TOP OF THE PAGE
	$(document).on('click','.bul-btn', function(){
		$('html, body').animate({ scrollTop: 0 }, 'fast');
	});
});