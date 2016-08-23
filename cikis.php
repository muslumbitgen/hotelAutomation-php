<?php
ob_start();
session_start();
session_destroy(); //session silmek

setcookie ("kullanici_adi", "", time() - 3600);//tarayıcıda kalma süresi
setcookie ("parola", "", time() - 3600);

echo "<center><img src='image/yukleniyor.gif' border='0' /> Çıkış işlemi tamamlanıyor, lütfen bekleyiniz..</center>";
//header("Refresh: 2; url=index.php");
echo '<meta http-equiv="refresh" content="1; url=index.php">';
ob_end_flush();
?>