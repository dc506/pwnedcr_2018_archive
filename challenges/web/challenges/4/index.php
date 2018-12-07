<?php 
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
$_SESSION['err_msg'] = $msgs;
$msgid = rand(0,count($msgs)-1);
$_SESSION['doomguy'] = "normal";
if (isset($_POST['logout'])){
	$_SESSION['insession4'] = False;
}
function go_nav(){
	if (isset($_GET['go'])){
		if ($_GET['go'] == "products"){
			include_once '_inc/products.php';
			die;
		}
	}
}

function login(){
	global $msgs, $msgid;
	$msg = '';
	$failed = '<p class="red">'.$msgs[$msgid].'</p>
			   <script>document.getElementById("logo").className = "logo failed";</script>';
	if (isset($_POST['login']) && isset($_POST['unblock'])){
		if ($_POST['unblock'] == "ghu496"){
			$_SESSION['insession4'] = True;
			$_SESSION['doomguy'] = "success";
			$msg = '<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			$_SESSION['insession4'] = False;
			$_SESSION['doomguy'] = "failed";
			$msg = $failed;
		}
	}
	return $msg;
}


function val_auth_code(){
	global $msgs, $msgid;
	if (isset($_GET['view'])){
		// hjgfk58jv904
		$search = $_GET['view'];
		$msg = "";
		if ($search == 'logs.txt'){
			$msg = '<pre>'.shell_exec('cat logs.txt').'</pre>';
		}elseif ($search == 'logs.txt;ls'){
			$msg = '<pre>'.shell_exec($search).'</pre>
					<p class="red">Vas bien</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}elseif ($search == 'logs.txt;python3 rce.py'){
			$msg = '<pre>'.shell_exec($search).'</pre>
					<p class="red">Eso es!!</p>
					<p class="orange">Nombre: Nighmare! <br/>PCR{99b4914ca9493fc5dcaf731518e25817}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			$attack = explode(" ", $search);
			if (count($attack) == 4){
				if ($attack[0] == "logs.txt;python3" && $attack[1] == "rce.py" && strpos($attack[2], ';') === false && strpos($attack[3], ';') === false ){
					$msg = '<pre>'.shell_exec($search).'</pre>
					<h1 class="red">Eso es !! ha logrado completar el final de este CTF</h1>
					<img src="images/the_end.jpg" width="500px"/>
					<h2>De parte del equipo de WhiteJaguars y PwnedCR le damos las gracias por participar</h2>
					<h1>Espere por las premiaciones</h1>
					<script>document.getElementById("logo").className = "logo success";</script>';
				}else{
					$msg = '<script>document.getElementById("logo").className = "logo failed";</script>
						<p class="red">'.$msgs[$msgid].'</p>';
				}
			}else{
				$msg = '<script>document.getElementById("logo").className = "logo failed";</script>
						<p class="red">'.$msgs[$msgid].'</p>';
			}
		}
		return $msg;
	}
}
function auth(){
	global $msgs, $msgid;
	$msg = '';
	$failed = '<p class="red">'.$msgs[$msgid].'</p>
			   <script>document.getElementById("logo").className = "logo failed";</script>';
	if (isset($_GET['auth']) && $_GET['auth'] == "code"){
		echo 'auth_code = hjgfk58jv904';
		die();
	}
}
function inSession(){
	return (isset($_SESSION['insession4']) && $_SESSION['insession4'] == True);
}
auth();
go_nav();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>PwnedCR 2018 - CTF:4</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<body>
	<div id="logo" class="logo <?php $msg = login(); echo $_SESSION['doomguy']; ?>"></div>
	<div class="header">Nightmare</div>
	<?php ?>
	<div class="content">
		<ul class="panes">
			<li class="left-pane">
			</li>
			<li class="middle-pane">
				<?php 
				if (inSession()){
					echo '<p>Al fin en la recta final</p>
						 <p><a href="?view=logs.txt" class="button">Ver registro de eventos</a></p>
						 <hr/>
						 <p id="msg" class="red"></p>
						 '.val_auth_code().'
						 <div class="logout"><form method="POST"><input type="submit" class="button" name="logout" value="Log out"/></form></div>';
				}else{
					echo '
				<p><b>Para entrar se requiere obtener el pase en el nivel anterior</b></p>
				<form method="POST">
					<table>
						<tr><td>Desbloquear:</td><td><input type="text" name="unblock"/></td></tr>
					</table>
					<p><input type="submit" name="login" class="button" value="Entrar"/></p>
				</form>
					';
				}
				echo $msg;
				
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
