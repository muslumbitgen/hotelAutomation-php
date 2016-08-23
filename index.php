<?php include "head.php"; ?>
<title>Anasayfa</title>
<?php include "head2.php"; ?>
<div id="tumicerik">
	<div id="menu_dis" class="blue">
		<ul id="menu">
			<li><a href="index.php" class="secili">ANASAYFA</a></li>
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
		<div id="anagiris">
			<h2>Otelimize Hoşgeldiniz</h2>
			
			<br><br>
			<a href="konaklama.php" class="girislink">Otelimizi İnceleyin</a> <span class="gyd">ya da</span> <a href="fotogaleri.php" class="girislink">Galeriye Gidin</a>
		</div>
		<form action="rezervasyon.php" method="post" id="rezerveform">
        <div class="rezerve">
			<h2>Rezervasyon Yapınız</h2>
			<div>
				<div class="rezinput">Giriş tarihi : <input type="date" name="giris" value="<?php echo date("Y-m-d"); ?>"><br></div>
				<div class="rezinput">Çıkış tarihi : <input type="date" name="cikis" value="<?php echo date("Y-m-d"); ?>"><br></div>
				<a href="#" class="girislink" style="width:230px; text-align:center;" onclick="document.getElementById('rezerveform').submit();" >Odaları Listele</a>
				
			</div>
		</div>
		<div style="clear:both"></div>
		
		<div class="rezerve" style="margin-top:20px">
			<?php
			session_start();
			
			if($_SESSION['giris'])
			{
				echo'<h2>Hoşgeldiniz sayın:  <font color="0000FF">'.$_SESSION["kullanici_adi"].'</font></h2>';

				echo'<a href="#" data-featherlight="uyepanel.php" class="girislink" style="width:230px; text-align:center;">Üye Paneli</a>';

				echo'<a href="#" data-featherlight="cikis.php" class="girislink" style="width:230px; text-align:center; margin-top:15px;">Çıkış Yap</a>';
			}
			else
			{
				echo '<a href="#" data-featherlight="giris.php" class="girislink" style="width:230px; text-align:center; margin-top:15px">Üye Girişi</a>';
				echo '<a href="#" data-featherlight="uyelik.php" class="girislink" style="width:230px; text-align:center; margin-top:15px">Yeni Üye</a>';
			}
			?>
		</div>
		


        </form>
	</div>
	<div style="clear:both"></div>

</div>
<?php include "footer.php" ?>


</div>
</body>
</html>
		



