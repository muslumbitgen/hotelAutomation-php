<?php

	include('baglan.php');
	
	$kullanici_adi= htmlspecialchars(addslashes(trim($_POST["kullanici_adi"])));
	$yorum_yorum	= htmlspecialchars(addslashes(trim($_POST["yorum_yorum"])));

	if ($kullanici_adi == "" || $yorum_yorum == "") {
	
		echo "Lütfen formu tam doldurunuz.";
		mysql_close();
		
		} else {
		
				$sql = "INSERT INTO yorumlar(kullanici_adi, yorum_yorum)VALUES('$kullanici_adi', '$yorum_yorum')";
				$result=mysql_query($sql);
				
				if($result){
						echo "Yorumunuz eklendi.";
						} else {
								echo "Yorumunuz eklenemedi.";
								}
						mysql_close();
				}

?>
