<?php include "head.php"; ?>
<title>görüşleriniş</title>
<?php include "head2.php"; ?>
<div id="tumicerik">
	<div id="menu_dis" class="blue">
		<ul id="menu">
			<li><a href="index.php">ANASAYFA</a></li>
			<li><a href="konum.php">KONUM</a></li>
			<li><a href="konaklama.php">KONAKLAMA</a></li>
			<li><a href="restaurant.php">RESTAURANT & BAR</a></li>
			<li><a href="aktiviteler.php">AKTİVİTELER</a></li>
			<li><a href="gorusleriniz.php" class="secili">GÖRÜŞLERİNİZ</a></li>
			<li><a href="fotogaleri.php">FOTO GALERİ</a></li>
			<li><a href="hakkimizda.php">HAKKIMIZDA</a></li>
		</ul>
	</div>

	<div id="sayfaicerik">
		
			<h1 class="sayfabaslik">Otelimiz Hakkında Genel Günüşleriniz</h1>
			
				<?php
			session_start();
			
			if($_SESSION['giris'])
			{
				echo'<h2>Hoşgeldiniz sayın:  <font color="0000FF">'.$_SESSION["kullanici_adi"].'</font></h2>';
				echo'<a href="#" data-featherlight="yorumyap.php" class="girislink"style="width:230px; text-align:center;">+Yorum Yap</a>';

				echo'<a href="#" data-featherlight="cikis.php" class="girislink" style="width:230px; text-align:center; margin-top:15px;">Çıkış Yap</a>';
			}
			else
			{
				echo '<a href="#" data-featherlight="yorumgiris.php" class="girislink" style="width:230px; text-align:center; margin-top:15px">+Yorum Yap</a>';
				
			}
			?>


			<div class="icicerik" style="width:900px;">
				
			</div>
	
	
	<div style="clear:both"></div>

	</div>
	<?php include('yorum-goster.php');?>
				
	<div style="clear:both"></div>

</div>

<?php include "footer.php" ?>
</div>
</body>
</html>
		



