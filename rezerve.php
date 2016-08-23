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

			
			<div class="icicerik" style="width:900px;">
				  
				  <?php 
				  
				  if($_GET["rz"]==1)
				  {
					  $yataklar = $_POST["yataklar"];
					  
					  $yataklar_array = explode(',', $yataklar);
					  
					  
					$girisTarih = $_POST["girisTarih"];
					$cikisTarih = $_POST["cikisTarih"];
					
					$isim = $_POST["isim"];
					$email = $_POST["email"];
					$telefon = $_POST["telefon"];
					$adress = $_POST["adress"];
					$mesaj = $_POST["mesaj"];
					
					include("baglan.php");
					foreach($yataklar_array as $_yatakID) 
					{
						   $sql = 'INSERT INTO rezervasyon (girisTarihi,cikisTarihi, yatakID, isim, email, telefon, adress, mesaj) VALUES ( "'.$girisTarih.'", "'.$cikisTarih.'", '.$_yatakID.', "'.$isim.'", "'.$email.'", "'.$telefon.'", "'.$adress.'", "'.$mesaj.'")';
							if(!mysql_query($sql)){
								die("hata");
							}
					}
					echo "Rezervasyonunuz yapılmıştır.";
					echo "<meta http-equiv='refresh' content='2; url=index.php'>";
					
				  }
				  else
				  {
				  
					$yataklar = $_POST["form_yatak"];
					
					$sonfiyat_tl = $_POST["form_sfiyat_tl"];
					$sonfiyat_usd = $_POST["form_sfiyat_usd"];
					$girisTarih = $_POST["form_giris"];
					$cikisTarih = $_POST["form_cikis"];
					 
				  echo 'Toplam fiyat : '.$sonfiyat_tl .' tl / '.$sonfiyat_usd .' usd<br><br>
				  Lütfen formu doldurunuz.<br>';

				  ?>
				  
				  
				  
				  <form action="?rz=1" method="POST">
				  
				  <input type="hidden" name="yataklar" value="<?php echo $yataklar; ?>">
				  
						  <div class="rezerve_input"><b>Giriş Tarihi :</b> <?php echo $girisTarih; ?><input type="hidden" name="girisTarih" value="<?php echo $girisTarih; ?>"></div>
						  <div class="rezerve_input"><b>Çıkış Tarihi :</b> <?php echo $cikisTarih; ?><input type="hidden" name="cikisTarih" value="<?php echo $cikisTarih; ?>"></div>
						  
						  <?php 
						  session_start();
						  if($_SESSION["giris"])
						  { 
						  echo '<div class="rezerve_input"><b>Adınız :</b> '.$_SESSION["isim"].' <input type="hidden" name="isim" value="'.$_SESSION["isim"].'"></div>
						  <div class="rezerve_input"><b>Mail adresiniz :</b> '.$_SESSION["eposta"].' <input type="hidden" name="email" value="'.$_SESSION["eposta"].'"></div>
						  <div class="rezerve_input"><b>Telefon :</b> '.$_SESSION["telefon"].' <input type="hidden" name="telefon" value="'.$_SESSION["telefon"].'"></div>
						  <div class="rezerve_input"><b>Adres :</b> '.$_SESSION["adres"].' <input type="hidden" name="adress" value="'.$_SESSION["adres"].'"></div>'; 
						  
						  }
						  else
						  {
							echo'  <div class="rezerve_input"><b>Adınız :</b> <input type="text" name="isim"></div>
						  <div class="rezerve_input"><b>Mail adresiniz :</b> <input type="email" name="email"></div>
						  <div class="rezerve_input"><b>Telefon :</b> <input type="number" name="telefon"></div>
						  <div class="rezerve_input"><b>Adres :</b> <input type="text" name="adress"></div>';
						  }
						  ?>
						  
						  <div class="rezerve_input"><b>MESAJINIZ :</b><br> <textarea name="mesaj" rows="5" cols="5" style="width:150px; height:100px; display:inline-block" placeholder="mesajınız"></textarea></div>
						  <div class="rezerve_input"><input type="submit" value="Rezerve Et"></div>
				  </form>
						
				  <?php } ?>
			</div>
			<div style="clear:both"></div>
			
		
	
	</div>
	<div style="clear:both"></div>
	

</div>
<?php include "footer.php" ?>
</div>
</body>
</html>
		



