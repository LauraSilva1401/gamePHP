<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHPGAME</title>
	<link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/main.css">
</head>
<body>
	<?php 
	if (isset($_GET['pagina']) && $_GET['pagina'] == 'login') {
		require_once 'views/login.php';
	}elseif (isset($_GET['pagina']) && $_GET['pagina'] == 'registration') {
		require_once 'views/registration.php';
	}
		
	?>
<script src="public/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/jquery-3.6.4.min.js"></script>
	<?php 
	if (isset($_GET['pagina']) && $_GET['pagina'] == 'login') {
		?>
		<script type="text/javascript" src="public/js/login.js"></script>
		<?php
	}else{
		if (isset($_GET['pagina']) && $_GET['pagina'] == 'registration') {
		?>
		<script type="text/javascript" src="public/js/registration.js"></script>
		<?php
	}else{
		//echo "nada";
	}
	}
	?>
</body>
</html>