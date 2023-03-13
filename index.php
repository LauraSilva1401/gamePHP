<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHPGAME</title>
	<link href="public/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="public/css/main.css">
</head>
<body>
	<header>
		<?php
		require_once  'views/header.php';
		?>
	</header>
	<?php 
	if (isset($_GET['pagina']) && $_GET['pagina'] == 'login') {
		if (!isset($_SESSION['LOGIN_STATUS'])) {
			require_once 'views/login.php';
		}else{
	?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?pagina=game">
 	<?php
		}
	}elseif (isset($_GET['pagina']) && $_GET['pagina'] == 'registration') {
		if (!isset($_SESSION['LOGIN_STATUS'])) {
			require_once 'views/registration.php';
		}else{
	?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?pagina=game">
 	<?php
		}
		
	}elseif (isset($_GET['pagina']) && $_GET['pagina'] == 'game') {
		if (isset($_SESSION['LOGIN_STATUS'])) {
			require_once 'views/game.php';
		}else{
	?>
			<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php?pagina=login">
 	<?php
		}
	}
		
	?>
<script src="public/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="public/js/jquery-3.6.4.min.js"></script>
<script type="text/javascript" src="public/js/logout.js"></script>
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
			if (isset($_GET['pagina']) && $_GET['pagina'] == 'game') {
			?>
			
			<?php
			}else{
				//echo "nada";
			}
		}
	}
	?>
</body>
</html>