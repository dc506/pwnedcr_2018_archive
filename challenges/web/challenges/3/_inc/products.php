<?php 
if (isset($_SESSION['insession3']) && $_SESSION['insession3'] == False){
	header("Location: ?go=home");
	die();
}
function doom_img(){
	// open the file in a binary mode
	$name = '_inc/doom.png';
	$fp = fopen($name, 'rb');
	
	// send the right headers
	header("Content-Type: image/png");
	header("Content-Length: " . filesize($name));
	
	// dump the picture and stop the script
	fpassthru($fp);
	exit;
}
function prods(){
	$msgid = rand(0,count($_SESSION['err_msg'])-1);
	if (isset($_GET['id'])){
		$txt = $_GET['id'];
		$msg = "";
		// Calculate the MD5 hash for sequence numbers from 1 to 300
		// for i in {1..300}; do echo -n "$i" | md5sum >> md5list.txt; done
		// Clean the file
		// sed -i -e 's/  -//g' md5list.txt
		if ($txt == "38db3aed920cf82ab059bfccbd02be6a"){
			$msg = '<h2 class="red">Pase para Nightmare</h2>
					<p class="red">Ha conseguido el pase para entrar al &uacute;ltimo reto "Nightmare"</p>
					<p class="red">La mala entrop&iacute;a tambi&eacute;n da paso a la enumeraci&oacute;n</p>
					<p class="orange">Nombre: Pase para Nightmare<br/><div style="background-color: black;"><img src="?go=products&img=d.png"></img></div></p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}elseif ($txt == "c4ca4238a0b923820dcc509a6f75849b"){
			$msg = '<h2 class="red">Granadas de mano</h2>
					<p>Las granadas de mano son de corto alcance pero de alto poder explosivo</p>';
		}elseif ($txt == "34173cb38f07f89ddbebc2ac9128303f"){
			$msg = '<h2 class="red">Lanza cohetes</h2>
					<p>Son de largo alcance y gran poder destructivo, sin embargo son de costo elevado</p>';
		}elseif ($txt == "3ef815416f775098fe977004015c6193"){
			$msg = '<h2 class="red">Arepas voladoras</h2>
					<p>Son de bajo costo y de bajo poder destructivo, sirven como alimento en tiempos de paz</p>';
		}elseif ($txt == "ec5decca5ed3d6b8079e2e7e7bacc9f2"){
			$msg = '<h2 class="red">BFG-9000</h2>
					<p>Es el arma de mayor potencia destructiva. Las siglas BFG oficialmente significan Bio Force Gun (Arma de Biofuerza en español), aunque popularmente es interpretado por los jugadores como Big Fucking Gun (Arma Jodidamente Grande en español), el 9000 sería el modelo del arma</p>';
		}elseif ($txt == "a2557a7b2e94197ff767970b67041697"){
			$msg = '<h2 class="red">Chancletas de uranio</h2>
					<p>El arma de bajo costo mas temida fue transformada por Rusos para obtener el arma definitiva</p>';
		}else{
			$msg = '<p class="red">'.$_SESSION['err_msg'][$msgid].'</p>
					<script>document.getElementById("logo").className = "logo failed";</script>';
		}
		return $msg;
	}
}
if (isset($_GET['img']) && $_GET['img'] == "d.png"){
	doom_img();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>PwnedCR 2018 - CTF:3</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="logo" class="logo normal"></div>
	<div class="header">Ultra-Violence</div>
	<?php ?>
	<div class="content">
		<ul class="panes">
			<li class="left-pane">
			</li>
			<li class="middle-pane">
				<p><a href="?go=home">Inicio</a> | <a href="?go=products">Productos</a> </p>
				<p><b>Lista de productos</b></p>
				<table class="productos">
					<tr class="magenta"><td>Cantidad</td><td>Nombre</td><td>Acci&oacute;n</td></tr>
					<tr><td>157</td><td>Granada de mano</td><td><a href="?go=products&id=c4ca4238a0b923820dcc509a6f75849b">Detalles</a></td></tr>
					<tr><td>215</td><td>Lanza cohetes</td><td><a href="?go=products&id=34173cb38f07f89ddbebc2ac9128303f">Detalles</a></td></tr>
					<tr><td>5</td><td>Arepas voladoras</td><td><a href="?go=products&id=3ef815416f775098fe977004015c6193">Detalles</a></td></tr>
					<tr><td>1</td><td>BFG-9000</td><td><a href="?go=products&id=ec5decca5ed3d6b8079e2e7e7bacc9f2">Detalles</a></td></tr>
					<tr><td>16</td><td>Chancleta de uranio</td><td><a href="?go=products&id=a2557a7b2e94197ff767970b67041697">Detalles</a></td></tr>
				</table>
				<?php echo prods(); ?>
				
			</li>
			<li class="right-pane">
			</li>
		</ul>
	</div>
	<div class="footer">
		<p>Sponsored by WhiteJaguars Cyber Security, Costa Rica 2018 | www.whitejaguars.com | info@whitejaguars.com</p>
	</div>
	</body>
</html>
