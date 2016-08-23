<?php 
include "baglan.php";
$islem=$_GET["islem"];
$id = $_GET["id"];
$sorgula = mysql_query("SELECT * FROM rezervasyon WHERE id='".$id."'") or die (mysql_error());
$rezervasyon = mysql_fetch_array($sorgula);

if($islem=="sil")
{

$rezervasyon_sil = "DELETE FROM rezervasyon WHERE id='$id'";
$sil_sonuc = mysql_query($rezervasyon_sil);	
echo str_repeat("<br>",8)."<center><img src=image/ok.gif border=0 /> rezervasyon Silindi.</center>";
header("Refresh: 1; url= admin.php");
return;
}
if(isset($_POST['coklu']))
{
    foreach($_POST  as $a=>$v)
    {
        if($v=="secsil")
        {
            $sql="delete from rezervasyon where id=$a";
            mysql_query($rezervasyon_sil,$baglanti);
        }
    } 
}
?>