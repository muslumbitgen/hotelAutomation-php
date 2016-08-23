<?php include "head.php"; ?>
<title>Üye ol</title>
</head>
<body>

   <form name="uye_form" method="post" action="uyelik.php">
 <div id="genel">
    <div><img src="image/uye_kart.png" /></div>
     <div>KULLANICI ADINIZ:</div>
    <div><input type="text" name="kullanici_adi" placeholder="Kullanıcı Adınız" class="giris" required/> <font color="#FF0000">*</font></div>
    <div> TAM ADINIZ:</div>
    <div><input type="text" name="tamisim" placeholder="Tam adınız" class="giris" required/> <font color="#FF0000">*</font></div>
    <div>ŞİFRENİZ:</div>
    <div><input type="password" name="parola"placeholder="parola" class="giris" maxlength="8" required /> <font color="#FF0000">*</font></div>
  
    <div>ŞİFRE TEKRAR:</div>
    <div><input type="password" name="parolatekrar" class="giris" maxlength="8" placeholder="Parola Tekrar " required /> <font color="#FF0000">*</font></div>
    <div>E-MAİL:</div>
    <div><input type="text" name="eposta" class="giris" placeholder="E-MAİL" required/> <font color="#FF0000">*</font></div>
     <div>TELEFON:</div>
    <div><input type="number" name="telefon" placeholder="0(---)(---)(--)(--)"class="giris" required/> <font color="#FF0000">*</font></div>
     <div>ADRES:</div>
    <div><textarea name="adres" style="width:150px; height:50px; display:inline-block" placeholder="adresiniz" class="giris"></textarea> <font color="#FF0000">*</font></div>
    <div><input type="submit" id="uyelik" value="Üye Ol" /></div>
  </div>
</form>

<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{

include("baglan.php");

$kullanici_adi = $_POST["kullanici_adi"];
$tamisim=$_POST["tamisim"];
$parola = $_POST["parola"];
$parolatekrar = $_POST["parolatekrar"];
$eposta = $_POST["eposta"];
$telefon=$_POST["telefon"];
$adres=$_POST["adres"];
$button = $_POST["button"];
$tarih = date("y-m-d");


if($kullanici_adi=="" || $parola=="" || $parolatekrar=="" || $eposta=="" || $tamisim=="" || $telefon==""|| $adres=="")
{
	echo "<center><img src=image/hata.gif border=0 /><h1>Lütfen tüm alanları eksiksiz doldurun!</h1></center>";
	header("Refresh: 2; url=uyelik.php");
	return;
}
elseif($parola != $parolatekrar)
{
	echo "<center><img src=image/hata.gif border=0 /><h1>Parola ve Parola Tekrar alanları aynı olmalı!</h1></center>";
	header("Refresh: 2; url=uyelik.php");
	return;	
}

function checkmail($eposta){
  return filter_var($eposta, FILTER_VALIDATE_EMAIL);
}

if(!checkmail($eposta))
{
	echo "<center><img src=image/hata.gif border=0 /> <h1>Yazdığınız e-posta adresi geçersiz!</h1></center>";
	header("Refresh: 2; url=uyelik.php");
	return;	
}

$isim_kontrol = mysql_query("select * from uyeler where kullanici_adi='".$kullanici_adi."'") or die (mysql_error());

$uye_varmi = mysql_num_rows($isim_kontrol);
if($uye_varmi > 0)
{
	echo "<center><img src=image/hata.gif border=0 /> <h1>Kullanıcı adı başka bir üye tarafından kullanılıyor!</h1></center>";
	header("Refresh: 2; url=uyelik.php");
	return;		
}

$eposta_kontrol = mysql_query("select * from uyeler where eposta='".$eposta."'") or die (mysql_error());

$eposta_varmi = mysql_num_rows($eposta_kontrol);
if($eposta_varmi > 0)
{
	echo "<center><img src=image/hata.gif border=0 /><h1> E-Posta baþka bir üye tarafından kullanılıyor!</h1></center>";
	header("Refresh: 2; url=uyelik.php");
	return;		
}

$yenikayit = "INSERT INTO uyeler (kullanici_adi,tamisim, parola, eposta,telefon,adres, tarih)values('".$kullanici_adi."','".$tamisim."', '".md5(md5($parola))."', '".$eposta."','".$telefon."','".$adres."', '$tarih')";

$sorgu = mysql_query($yenikayit);

echo "<center><img src=image/ok.gif border=0 /><h1> Kayıt işlemi tamamlandı, lütfen bekleyiniz.</h1></center>";

header("Refresh: 2; url=index.php");
mysql_close();
}
ob_end_flush();
?>
</form>
</body>
</html>