<?php include "head.php"; ?>
<title>Rezervasyon</title>
<?php include "head2.php"; ?>
<div id="tumicerik">
	<div id="menu_dis" class="blue">
		<ul id="menu">
			<li><a href="index.php">ANASAYFA</a></li>
			<li><a href="konum.php">KONUM</a></li>
			<li><a href="konaklama.php">KONAKLAMA</a></li>
			<li><a href="restaurant.php">RESTAURANT & BAR</a></li>
			<li><a href="aktiviteler.php">AKTİVİTELER</a></li>
			<li><a href="gorusleriniz.php">GÖRÜŞLERİNİZ</a></li>
			<li><a href="fotogaleri.php">FOTO GALERİ</a></li>
			<li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
		</ul>
	</div>

	<div id="sayfaicerik">
		
			<h1 class="sayfabaslik">Rezervasyon</h1>
            
					
<div id="yataksecim">
	<div id="yataksecimsol">
			<br>Lütfen rezerve etmek istediğiniz yatakları seçiniz.
	</div>
	<div id="yataksecimsag">
		<div id="yataksecimfiyat">
		Toplam Tutar<br>
		<span id="sfiyat_tl">0</span> TL / <span id="sfiyat_usd">0</span> USD
		</div>
		<div id="yataksecimrezerv">
			<div id="form_rezerve_et" class="yataksecimbut" onclick="form_rezerve_et()">Rezerve Et</div>
		</div>
	</div>
</div>

<div style="width:900px;">
	<div class="odasutun sutunbas">Oda</div>
	<div class="odasutun sutunbas sutuntip">Oda Tipi</div>
	<div class="odasutun sutunbas">Kapasite</div>
	<div class="odasutun sutunbas">Yatak Fiyatı (1 Gece)</div>
	<div class="odasutun sutunbas sutunyatak">Yatak Seçimi</div>
	
	
	
	<?php
		$girisTarih = $_POST["giris"];
		$cikisTarih = $_POST["cikis"];
		
		$kacgun = strtotime($cikisTarih) - strtotime($girisTarih);
		
		$kacgun = abs($kacgun / (60 * 60 * 24));
		
		
			?>
		
	<form action="rezerve.php" id="formrezervesi" method="POST">
		<input type="hidden" name="form_kacgun" value="<?php echo $kacgun; ?>">
		<input type="hidden" name="form_yatak" value="">
		<input type="hidden" name="form_sfiyat_tl" value="">
		<input type="hidden" name="form_sfiyat_usd" value="">
		<input type="hidden" name="form_giris" value="<?php echo $girisTarih; ?>">
		<input type="hidden" name="form_cikis" value="<?php echo $cikisTarih; ?>">
	</form>
	<?php


		// döngü başlayış
	

				
				
	include("baglan.php");
	$odasql = mysql_query('SELECT * FROM oda');
	
	while($oda=mysql_fetch_object($odasql))
	{
		ob_start(); // eğer odadaki tüm yataklar doluysa odayı hiç göstermemek için
		
		echo '<div class="odasutun">'.$oda->odano.'. Oda ('.$oda->odakat.'. kat)</div>';

		$odaTipi = mysql_fetch_object(mysql_query('SELECT * FROM odatipleri WHERE id = '.$oda->odaTipi));
		$bosYatak = $odaTipi->yatakSayisi;

		echo '<div class="odasutun sutuntip"><a href="#'.strtolower($odaTipi->odaTipi).'">'.$odaTipi->odaTipi.'</a></div>';
		echo'<div class="odasutun">'.$odaTipi->yatakSayisi.' kişilik</div>';
		echo'<div class="odasutun">'.$odaTipi->tlFiyat.' tl / '.$odaTipi->usdFiyat.' usd</div>';
	#yatakları seç
				
	
		?>
		<div class="odasutun sutunyatak">
			
		<?php 
		
		
		
		$yataksql = mysql_query('SELECT * FROM yatak WHERE odaID = '.$oda->id);
		while($yatak = mysql_fetch_object($yataksql))
		{
			
			$yatak_rezerv=mysql_fetch_object(mysql_query("SELECT * FROM rezervasyon WHERE yatakID = ".$yatak->id." AND (('$girisTarih' BETWEEN girisTarihi AND cikisTarihi) OR ('$cikisTarih' BETWEEN girisTarihi AND cikisTarihi) OR (girisTarihi BETWEEN '$girisTarih' AND '$cikisTarih') OR (cikisTarihi BETWEEN '$girisTarih' AND '$cikisTarih'))"));
			
			
			if(empty($yatak_rezerv)){
				echo '<a id="yyatak_'.$yatak->id.'" class="yatakbuton" onclick="yatakEkle('.$yatak->id.', '.$oda->odano.', '.$oda->odakat.', '.$odaTipi->tlFiyat.', '.$odaTipi->usdFiyat.')"></a>';
			}
			else
			{
				$bosYatak--;
				echo '<a class="yatakbuton dolu"></a>';
			}

		}
		
		
		if($bosYatak <= 0)
		{
			ob_end_clean(); // boş yatak yoksa, oda sütünunu gösterme
		}
		else
		{
			ob_end_flush(); // boş yatak varsa, oda sütünunu göster
			echo '</div>';
		}
		
		
		
	}
	
	?>		  
</div>
<div style="clear:both"></div>		
	</div>
	<div style="clear:both"></div>
	

</div>
<?php include "footer.php" ?>
</div>
</body>
</html>
		



