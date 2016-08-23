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
	<h2>Mevcut Yorumlar</h2>
	
			
	
	
	<?php while($rows=mysql_fetch_array($result)){
			extract($rows); ?>

	<div>
			
			<div id="ana_div"><font color="#0000FF"><?php echo $rows['kullanici_adi']; ?></font>&nbsp;&nbsp;&nbsp;<?php echo $rows['yorum_tarih']; ?><br/>
			<textarea cols="65" rows="4" disabled><?php echo $rows['yorum_yorum']; ?></textarea></div>
		
			
	
	
	<?php
		}
		mysql_close();
	?>
	 
	</div>
	<div style="clear:both"></div>
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
	