<?php include "head.php"; ?>
<title>Yönetim Paneli</title>
<?php
session_start();
ob_start();//depolama yapıp kontrol yapılmasını sağlıyor
if(!isset($_SESSION["yetki"]))
{
echo str_repeat("<br>", 8)."<center><img src=image/hata.gif border=0 /> Yönetim Paneli sadece yetkili kullanıcılara açıktır!</center>";//parametre tekrarı sağlar
header("Refresh: 2; url= index.php");
return;
}
include("baglan.php");
$sql = "select * from uyeler Order By id";
$sorgula = mysql_query($sql, $baglanti) or die(mysql_error());
?>
<body>
<div id="tumicerik">
<form name="guncelle" method="post" action="admin_islem.php?id=<?php echo $uyeler['id']; ?>">
<table align="center" width="800" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td height="62" colspan="2"><img src="image/uye.png" width="32" height="32" /><b> Yönetici:</b> <a href="cikis.php">Çıkış</a></td>
    </tr>
 <tr>
    <td><b><u>ID</u></b></td>
    <td><b><u>Kullanıcı Adı</u></b></td>
    <td><b><u>Parola (Md5)</u></b></td>
    <td><b><u>E-Posta</u></b></td>
    <td><b><u>Yetki</u></b></td>
     <td><b><u>Düzenle</u></b></td>
      <td><b><u>Silme</u></b></td>
  </tr>
<?php while ($uyeler = mysql_fetch_array($sorgula)){ ?>
 <tr>
    <td><?php echo $uyeler['id']; ?></td>
    <td><?php echo $uyeler['kullanici_adi']; ?></td>
    <td><?php echo $uyeler['parola']; ?></td>
    <td><?php echo $uyeler['eposta']; ?></td>
    <td><?php if($uyeler['yetki'] =="0")
	echo "Üye";
	elseif($uyeler['yetki'] =="1")
	echo "Admin";
	?></td>
    <td><a href="admin_islem.php?islem=duzenle&id=<?php echo $uyeler['id']; ?>"><img src="image/dezen.png" width="32" height="32" /></a></td>
    <td><a href="admin_islem.php?islem=sil&id=<?php echo $uyeler['id']; ?>"><img src="image/delete.png" width="32" height="32" /></a></td>
  </tr>
<?php } ?>

</table>
</form>
<hr/>
<?php include "adminRezerve.php"; ?>
<?php include "adminyorumSil.php"; ?>
</div>
</body>
</html>
<?php 
mysql_close();
ob_end_flush();	//kontrol edip gönderiyor
?>
</body>
</html>