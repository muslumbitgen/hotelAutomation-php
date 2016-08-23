<?php include "head.php"; ?>
<div id="tumicerik">
	<div id="sayfaicerik">
		
			<h1 class="sayfabaslik">Otelimiz Hakkında Genel Günüşleriniz</h1>
<form id="yorum-ekle" name="yorum-ekle" method="post" action="yorum-ekle.php">
	<div id="yorum">
		<ul><?php 
						  session_start();
						  if($_SESSION["giris"])
						  { 
						  echo '<div class="rezerve_input"><b>Adınız :</b> '.$_SESSION["kullanici_adi"].' <input type="hidden" name="kullanici_adi" value="'.$_SESSION["kullanici_adi"].'"></div>
			<textarea name="yorum_yorum" placeholder="Yorum" rows="10" cols="70"></textarea></li>';?>
			<li><button type="submit" id="btngiris">Gönder</button></li>
		</ul>
	</div>
</form>
						  <?php }?>
	<div style="clear:both"></div>

</div>
</div>
<?php include('yorum-goster.php');?>
</body>
</html>
		







