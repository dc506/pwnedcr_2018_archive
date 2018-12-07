<?php 
function key_val(){
	$msgid = rand(0,count($_SESSION['err_msg'])-1);
	if (isset($_POST['key'])){
		$search = $_POST['key'];
		$txt = strtolower($search);
		$txt = str_replace(" ", "", $txt);
		$msg = "";
		if ($txt == "100%biker"){
			$msg = '<p class="orange">Nombre: Lista de compras<br/>PCR{a910dff636125ff35e727c9a3b4fe7b8}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			$msg = '<p class="red">'.$_SESSION['err_msg'][$msgid].'</p>
					<script>document.getElementById("logo").className = "logo failed";</script>';
		}
		return $msg;
	}
}
function auth(){
	if (isset($_SESSION['insession2']) && $_SESSION['insession2'] == False){
		$_SESSION['doomguy'] = "success";
		echo '<p>Bien, lograste descubrir un problema de autorizaci&oacute;n</p>
			  <p class="orange">Nombre: F&aacute;cil no?<br/>PCR{6c7bc170af9ee68ba99e2114db20075e}</p>
			  <script>document.getElementById("logo").className = "logo success";</script>';
	}elseif (isset($_SESSION['insession2']) && $_SESSION['insession2'] == True){
		echo '<p class="orange">Naa esa es muy facil, pero es un bueno comienzo, hay almenos dos cosas mas aqu&iacute;</p>';
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
				<p><b>Consola de administraci&oacute;n</b></p>
				<?php 
				auth(); 
				if (isset($_SESSION['insession2']) && $_SESSION['insession2'] == True){
					echo '<form method="POST" action="?go=admin">
					<div style="text-align: center;">Palabra de paso:<input type="text" name="key"/><input type="submit" class="button" value="Validar"/></div>
					<p><b>Resultado:</b></p>
					<hr/>
					'.key_val().'
				</form>';
				}
				?>
				
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
