<!doctype html>
<html lang="tr">
<head>
	<meta charset="utf8">
	<title>Sercan Yorum Scripti</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="js/scripts.js"></script>
</head>

<?php

	include('baglan.php');

	$sql		= "SELECT * FROM yorumlar";
	$result		= mysql_query($sql);
	
	$sayfa		=	@$_GET["s"];
	if(empty($sayfa) || !is_numeric($sayfa)){
		$sayfa	=	1;
	}
	$kacar		=	5;
	$ksayisi	=	mysql_num_rows(mysql_query("select yorum_id from yorumlar"));
	$ssayisi	=	ceil($ksayisi/$kacar);
	$nereden	=	($sayfa*$kacar)-$kacar;
	$result		=	mysql_query("select * from yorumlar order by yorum_id DESC limit $nereden,$kacar");
	
	?>
	<table border="1" cellpadding="10">
		<thead style="font-weight: bold;">
			<td width="5%">ID</td>
			<td width="20%">İsim</td>
			<td width="50%">Yorum</td>
			<td width="20%">Tarih</td>
			<td width="5%">Sil</td>
		</thead>
	
	<?php while($rows=mysql_fetch_array($result)){
			extract($rows); ?>

		<tr>
			<td><?php echo $rows['yorum_id']; ?></td>
			<td><?php echo $rows['kullanici_adi']; ?></td>
			<td><textarea cols="65" rows="4" ><?php echo $rows['yorum_yorum']; ?></textarea></td>
			<td><?php echo $rows['yorum_tarih']; ?></td>
			<td><a class="yorum-sil" id="<?php echo $rows['yorum_id']; ?>" href="yorum-sil.php"><img src="image/sil.png" width="32" height="32" /></a></td>
		</tr>
	
	<?php
		}
		mysql_close();
	?>
	
	</table>
	
	<h3 style="display: inline-block;">Sayfalar</h3>
	<?php
		
		for ($i=1; $i<=$ssayisi; $i++){
		echo "<a style='padding: 4px 8px; margin-right: 8px; border:1px solid #c2c2c2; background: #ff9900; color: #fff; font-weight: bold;' href='?s={$i}'";
		if($i == $sayfa){
			echo "class='aktif'";
		}
		echo ">{$i}</a>";
	}
		
	?>
	</body>
</html>