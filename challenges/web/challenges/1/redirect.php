<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
// session_start();
$msgs = array("NOPE NOPE NOPE!",
            "Eso es un flag? Pfff!",
            "Sigue intentando...",
            "Wrong. NEXT!",
            "Mi abuelita lo haria mejor.",
            "No se pele el nance, siga intentando...",
            "Esta mas perdido qu'el chiquito de la Llorona",
            "Flag??? NPI");
$msgid = rand(0,7);
$_SESSION['doomguy'] = "normal";
$or = False;
if (isset($_GET['p'])){
	$location = $_GET['p'];
	if ($location == "/index.php"){
		header("Location: /");
		die();
	}elseif ($location == "admin.php"){
		header("Location: admin.php");
		header("WhiteJaguars: Nombre: Siempre hay algo mas PCR{8964690d4242921c7de07b9172b78f77}");
		die();
	}else{
		if ((strlen($location) >= 7 && substr($location, 0, 7) === "http://") || (strlen($location) >= 8 && substr($location, 0, 8) === "https://") || (strlen($location) >= 2 && substr($location, 0, 2) === "//")){
			$or = True;
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>PwnedCR 2018 - CTF:1</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="logo" class="logo <?php if($or){ echo "success";}else{echo "failed";}?>"></div>
	<div class="header">Hey, not too rough</div>
	<div class="content">
		<ul class="panes">
			<li class="middle-pane">
				<?php
				if($or){ 
					echo '
					<p>Felicidades, as&iacute se descubren potenciales vulnerabilidades de tipo Open Redirect</p>
					<p class="orange">Nombre: Hacia donde ir!<br/>PCR{ca515c3296e667df006e4b5a14f5c8fb}</p>
					<p class="red">Prueba algo diferente!</p>';
				}else{
					echo '<p class="red">'.$msgs[$msgid].'</p>';
				}
				?>
			</li>
		</ul>
	</div>
	<div class="footer">
		<p>Sponsored by WhiteJaguars Cyber Security, Costa Rica 2018 | www.whitejaguars.com | info@whitejaguars.com</p>
	</div>
	</body>
</html>
