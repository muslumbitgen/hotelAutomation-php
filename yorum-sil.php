<?php

	include('baglan.php');

	$yorum_id=$_GET['id'];
	$yorum_sil = mysql_query("DELETE FROM yorumlar WHERE yorum_id='$yorum_id'");
	echo mysql_error();

?>
