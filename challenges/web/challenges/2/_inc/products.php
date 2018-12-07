<?php 
if (isset($_SESSION['insession2']) && $_SESSION['insession2'] == False){
	header("Location: ?go=home");
	die();
}
function prods(){
	$msgid = rand(0,count($_SESSION['err_msg'])-1);
	if (isset($_GET['id'])){
		$txt = $_GET['id'];
		$msg = "";
		if ($txt == "581"){
			$msg = '<h2 class="red">Riñones en descuento</h2>
					<p>De calidad latinoamericana y provenientes de personas saludables, se entregan con completo anonimato y garantía de un mes a partir de la implantación</p>
					<p class="red">Eso es! nada como usar un poco de automatizaci&oacute;n para enumerar las cosas</p>
					<p class="orange">Nombre: No compre esto<br/>PCR{21a593027aa5092725ebe4c52c358c14}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}elseif ($txt == "123"){
			$msg = '<h2 class="red">Granadas de mano</h2>
					<p>Las granadas de mano son de corto alcance pero de alto poder explosivo</p>';
		}elseif ($txt == "254"){
			$msg = '<h2 class="red">Lanza cohetes</h2>
					<p>Son de largo alcance y gran poder destructivo, sin embargo son de costo elevado</p>';
		}elseif ($txt == "756"){
			$msg = '<h2 class="red">Arepas voladoras</h2>
					<p>Son de bajo costo y de bajo poder destructivo, sirven como alimento en tiempos de paz</p>';
		}elseif ($txt == "845"){
			$msg = '<h2 class="red">BFG-9000</h2>
					<p>Es el arma de mayor potencia destructiva. Las siglas BFG oficialmente significan Bio Force Gun (Arma de Biofuerza en español), aunque popularmente es interpretado por los jugadores como Big Fucking Gun (Arma Jodidamente Grande en español), el 9000 sería el modelo del arma</p>';
		}elseif ($txt == "172"){
			$msg = '<h2 class="red">Chancletas de uranio</h2>
					<p>El arma de bajo costo mas temida fue transformada por Rusos para obtener el arma definitiva</p>';
		}else{
			$msg = '<p class="red">'.$_SESSION['err_msg'][$msgid].'</p>
					<script>document.getElementById("logo").className = "logo failed";</script>';
		}
		return $msg;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>PwnedCR 2018 - CTF:2</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="logo" class="logo normal"></div>
	<div class="header">Hurt me plenty</div>
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
					<tr><td>157</td><td>Granada de mano</td><td><a href="?go=products&id=123">Detalles</a></td></tr>
					<tr><td>215</td><td>Lanza cohetes</td><td><a href="?go=products&id=254">Detalles</a></td></tr>
					<tr><td>5</td><td>Arepas voladoras</td><td><a href="?go=products&id=756">Detalles</a></td></tr>
					<tr><td>1</td><td>BFG-9000</td><td><a href="?go=products&id=845">Detalles</a></td></tr>
					<tr><td>16</td><td>Chancleta de uranio</td><td><a href="?go=products&id=172">Detalles</a></td></tr>
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
