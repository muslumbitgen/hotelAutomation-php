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
		
			<h1 class="sayfabaslik">Giriş yap</h1>

			<style>
				.icicerik {
					font:20px/40px 'Roboto Condensed', sans-serif;
					color:#303030;
					text-align:center;
				}
				
			</style>
			<div class="icicerik" style="width:900px;">
	<?php
session_start();
ob_start();

include("baglan.php");

$kullanici_adi = htmlentities(mysql_real_escape_string($_POST["kullanici_adi"]));
$parola = md5(md5(htmlentities(mysql_real_escape_string($_POST["parola"]))));

$sorgula = mysql_query("SELECT * FROM uyeler WHERE kullanici_adi='{$kullanici_adi}' and parola='{$parola}'") or die (mysql_error());

$sonUye = mysql_fetch_row($sorgula);

$uye_varmi = mysql_num_rows($sorgula);
if($uye_varmi > 0)
{

	
$_SESSION["giris"] = "true";
$_SESSION["uyeID"] = $sonUye[0];

$_SESSION["eposta"] = $sonUye[3];
$_SESSION["isim"] = $sonUye[6];
$_SESSION["telefon"] = $sonUye[7];
$_SESSION["adres"] = $sonUye[8];


$_SESSION["kullanici_adi"] = $kullanici_adi;
$_SESSION["parola"] = $parola;

setcookie("kullanici_adi",$kullanici_adi,time()+60*60*24);
setcookie("parola",$parola,time()+60*60*24);

if($sonUye[5] == 1){
	header("Location: anasayfa1.php");
	die();
}

echo str_repeat("<br>", 3)."<center><img src=image/yukleniyor.gif border=0 /> Giriş başarılı, lütfen bekleyiniz..</center>";
header("Refresh: 2; url=gorusleriniz.php");
}



else
{
		
echo str_repeat("<br>", 3)."<center><img src=image/hata.gif border=0 /> Kullanıcı adı veya parola hatalı!</center>";
header("Refresh: 2; url=gorusleriniz.php");
	
}
mysql_close();
ob_end_flush();
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
		



