$(document).ready(function(){
    $('#yorum-ekle').submit(function(){
	
        $.ajax({
            type: 'POST',
            url: 'yorum-ekle.php', 
            data: $(this).serialize()
        })
		
        .done(function(data){
		
            location.reload();	// iþlem baþarý ile tamamlanýnca sayfayý yeniden yüklüyor
             
        })
		
        .fail(function() {

            alert( "Yorum eklenemedi." );	// iþlem hatalı olursa uyarı veriyor
             
        });

        return false;
 
    });
});

$(document).ready(function(){
    $('.yorum-sil').click(function(){
	
		var element = $(this);
		var sil_id = element.attr("id");	// yorum-sil classına sahip elementin id değerini alıyoruz
		var info = 'id=' + sil_id;			// aldığımız id değerini id= verisinin sonuna ekletiyoruz
	
        $.ajax({
            type: 'GET',
            url: 'yorum-sil.php', 
            data: info,
        })
		
        .done(function(data){
		
            location.reload();	// işlem başarı ile tamamlanınca sayfayı yeniden yüklüyor
             
        })
		
        .fail(function() {

            alert( "Yorum eklenemedi." );	// işlem hatalı olursa uyarı veriyor
             
        });

        return false;
 
    });
});