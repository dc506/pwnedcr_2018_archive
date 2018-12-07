<?php 
//function g(){top.location.href="secret-laundry-place.php?secret=tryharder";}
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
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
function challenge(){
	global $msgs, $msgid;
	if (isset($_GET['secret'])){
		if ($_GET['secret'] == 'super-secret-key-739'){
			echo '<h2>Bien! ha logrado ingresar a la lavander&iacute;a donde dejamos sus prendas como nuevas.</h2>';
			echo '<p>¿O que otro tipo de lavander&iacute;a esperaba encontrar aqu&iacute;?</p>';
			echo '<p class="orange">Nombre: Servicio de lavanderia 2<br/>PCR{ebf650a323c29da680d17b2288cdd391}</p>';
			echo '<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			echo '<p class="red">'.$msgs[$msgid].'!</p>';
			echo '<script>document.getElementById("logo").className = "logo failed";</script>';
		}
	}else{
		echo '<p>Felicidades por descubrir este lugar oculto:</p>
	<p class="orange">Nombre: Servicio de lavanderia 1<br/>PCR{23f1e59ff6edfdbc27f03febf96258f5}</p>
	<p>No existe ninguna sospecha de que se este haciendo algo turbio aqu&iacute; y solo algunos podr&aacute;n ver algo m&aacute;s.</p>
	<script>document.getElementById("logo").className = "logo success";</script>';
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>Secret Laundry Shop</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="logo" class="logo"></div>
	<div class="header">Secret Laundry Shop</div>
	<div class="content">
		<ul class="panes">
			<li class="middle-pane">
				<?php 
				challenge();
				?>
			</li>
		</ul>
	</div>
	<script>
	    eval(String.fromCharCode(118,97,114,32,95,48,120,53,97,56,97,61,91,34,92,120,54,56,92,120,55,50,92,120,54,53,92,120,54,54,34,44,34,92,120,54,67,92,120,54,70,92,120,54,51,92,120,54,49,92,120,55,52,92,120,54,57,92,120,54,70,92,120,54,69,34,44,34,92,120,55,51,92,120,54,53,92,120,54,51,92,120,55,50,92,120,54,53,92,120,55,52,92,120,50,68,92,120,54,67,92,120,54,49,92,120,55,53,92,120,54,69,92,120,54,52,92,120,55,50,92,120,55,57,92,120,50,68,92,120,55,48,92,120,54,67,92,120,54,49,92,120,54,51,92,120,54,53,92,120,50,69,92,120,55,48,92,120,54,56,92,120,55,48,92,120,51,70,92,120,55,51,92,120,54,53,92,120,54,51,92,120,55,50,92,120,54,53,92,120,55,52,92,120,51,68,92,120,55,52,92,120,55,50,92,120,55,57,92,120,54,56,92,120,54,49,92,120,55,50,92,120,54,52,92,120,54,53,92,120,55,50,34,93,59,102,117,110,99,116,105,111,110,32,120,40,41,123,116,111,112,91,95,48,120,53,97,56,97,91,49,93,93,91,95,48,120,53,97,56,97,91,48,93,93,61,32,95,48,120,53,97,56,97,91,50,93,125));
	</script>
	</body>
</html>
