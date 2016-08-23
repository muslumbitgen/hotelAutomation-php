<?php
error_reporting(false);
			$db="hotel";

		$baglanti=mysql_connect("localhost","root","");
		mysql_select_db($db,$baglanti);
		mysql_query("SET NAMES UTF8");

?>