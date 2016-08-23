<?php include "head.php"; ?>
<title></title>
</head>
<body>
<form name="giris_form" method="post" action="yorumdenetim.php">
   <div>
   <div style="margin:auto; color:#00a8bf;"><h1>Giriş Yapın</h1></div>
      <div><input type="text" class="giris" name="kullanici_adi" placeholder="kullanici adi" required/></div>
      <div><input type="password" class="giris" name="parola" placeholder="parola" required/></div>
      <div><input type="checkbox" id="beniHatirla"/>Beni hatırla.
      <input type="submit" name="giris" value="Giriş" id="btngiris"/>
	  </div>
   </div>
</form>
</body>
</html>