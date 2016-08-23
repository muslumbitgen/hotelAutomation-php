var yataklar = [];
var yatakint = 0;



		
function form_rezerve_et() { 
	
	if(yataklar.length > 0){ 
		$('input[name="form_yatak"]').val(yataklar);
		$('input[name="form_sfiyat_tl"]').val(sonfiyat_tl);
		$('input[name="form_sfiyat_usd"]').val(sonfiyat_usd);
		
		$('#formrezervesi').submit(); 
		
	}else{
	   alert('Lütfen yatak seçiniz');
	}

}

function yatakEkle(yatakID, odaNo, odaKat, tlFiyat, usdFiyat) {
	
	if(jQuery.inArray(yatakID, yataklar) == -1){
		
		
    var kacgun = $('input[name="form_kacgun"]').val();
	
		if(yatakint == 0){$('#yataksecimsol').empty();}
		
		$('#yyatak_'+yatakID).addClass('ysecili');
		$('#yyatak_'+yatakID).attr('onclick', 'yatakSil('+yatakID+', '+odaNo+', '+odaKat+', '+tlFiyat+', '+usdFiyat+')');
		
		yataklar.push(yatakID);
		var ekle = '<div id="yyy_' + yatakID + '"><img src="image/cizgi.png">' + odaNo + '. oda (' + odaKat + '.kat) - 1 yatak - ' + tlFiyat + ' tl / ' + usdFiyat + ' usd - <a style="font-size:12px; color:red; cursor:pointer;" onclick="yatakSil('+yatakID+', '+odaNo+', '+odaKat+', '+tlFiyat+', '+usdFiyat+')">kaldır</a><br>'
		$('#yataksecimsol').append(ekle);
		
		
		var sfiyat_tl = $('#sfiyat_tl').html();
		$('#sfiyat_tl').empty();
		sonfiyat_tl = parseInt(sfiyat_tl) + (parseInt(tlFiyat) * parseInt(kacgun));
		
		$('#sfiyat_tl').append(sonfiyat_tl);
		
		var sfiyat_usd = $('#sfiyat_usd').html();
		$('#sfiyat_usd').empty();
		sonfiyat_usd = parseInt(sfiyat_usd) + (parseInt(usdFiyat) * parseInt(kacgun));
		$('#sfiyat_usd').append(sonfiyat_usd);
		
		yatakint++;
		//alert(yataklar);
	}
}
function yatakSil(yatakID, odaNo, odaKat, tlFiyat, usdFiyat) {
    
	if(jQuery.inArray(yatakID, yataklar) !== -1){
	
    var kacgun = $('input[name="form_kacgun"]').val(); //gün sayısını aldık
	
		yatakint--;
		$('#yyatak_'+yatakID).removeClass('ysecili');
		$('#yyatak_'+yatakID).attr('onclick', 'yatakEkle('+yatakID+', '+odaNo+', '+odaKat+', '+tlFiyat+', '+usdFiyat+')');
		
		if(yatakint == 0){$('#yataksecimsol').empty(); $('#yataksecimsol').append('<br>Lütfen rezerve etmek istediğiniz yatakları seçiniz.');}
		
		$('#yyy_'+yatakID).remove();
		
		yataklar.splice( $.inArray(yatakID, yataklar), 1 );
		
		var sfiyat_tl = $('#sfiyat_tl').html();
		$('#sfiyat_tl').empty();
		sonfiyat_tl = parseInt(sfiyat_tl) - (parseInt(tlFiyat) * parseInt(kacgun));
		$('#sfiyat_tl').append(sonfiyat_tl);
		
		var sfiyat_usd = $('#sfiyat_usd').html();
		$('#sfiyat_usd').empty();
		sonfiyat_usd = parseInt(sfiyat_usd) - (parseInt(usdFiyat) * parseInt(kacgun));
		$('#sfiyat_usd').append(sonfiyat_usd);
		//alert(yataklar);
	}
}