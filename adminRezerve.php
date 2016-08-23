<?php
include("baglan.php");
mysql_query("SET NAMES UTF8");
$sql = "select * from rezervasyon Order By id";
$sorgula = mysql_query($sql, $baglanti) or die(mysql_error());
?>
<table width="50%" border="0">
  <tr>
    <center><font size="10" color="red">REZERVASYON İŞLEMLERİ</font></center>
    </tr>
 <tr>
    <td><b><u>ID</u></b></td>
    <td><b><u>Giriş Tarihi</u></b></td>
    <td><b><u>Çıkış Tarihi</u></b></td>
    <td><b><u>yatakID</u></b></td>
    <td><b><u>isim</u></b></td>
    <td><b><u>E-Mail</u></b></td>
    <td><b><u>Telefon</u></b></td>
    <td><b><u>Adres</u></b></td>
    <td><b><u>Mesaj</u></b></td>
    <td><b><u>Silme</u></b></td>
  </tr>
<?php while ($rezervasyon= mysql_fetch_array($sorgula)){ ?>
 <tr>
    <td><?php echo $rezervasyon['id']; ?></td>
    <td><?php echo $rezervasyon['girisTarihi']; ?></td>
    <td><?php echo $rezervasyon['cikisTarihi']; ?></td>
    <td><?php echo $rezervasyon['yatakID']; ?></td>
    <td><?php echo $rezervasyon['isim']; ?></td>
    <td><?php echo $rezervasyon['email']; ?></td>
    <td><?php echo $rezervasyon['telefon']; ?></td>
    <td><?php echo $rezervasyon['adress']; ?></td>
    <td><textarea rows="4" ><?php echo $rezervasyon['mesaj']; ?></textarea></td>

    <td><a href="rezerveSil.php?islem=sil&id=<?php echo $rezervasyon['id']; ?>"><img src="image/sil.png" width="32" height="32" /></a></td>
  </tr>
<?php } ?>
</table>
