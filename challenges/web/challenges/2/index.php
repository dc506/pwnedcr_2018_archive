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
	$_SESSION['insession2'] = False;
}
function go_nav(){
	if (isset($_GET['go'])){
		if ($_GET['go'] == "admin"){
			include_once '_inc/admin.php';
			die;
		}elseif ($_GET['go'] == "products"){
			include_once '_inc/products.php';
			die;
		}
	}
}

function login(){
	global $msgs, $msgid;
	$msg = '';
	if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$txt = strtolower($username.$password);
		if (strpos($txt, '=') !== false || strpos($txt, 'drop') !== false || strpos($txt, 'delete') !== false || strpos($txt, 'update') !== false){
			$_SESSION['insession2'] = False;
			$_SESSION['doomguy'] = "failed";
			$msg = '<p class="red">'.$msgs[$msgid].'</p>
					<script>document.getElementById("logo").className = "logo failed";</script>';
		}else{
			$conn = new mysqli("localhost", "root", "root", "playground");
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT id, username, password FROM users WHERE username = '".$username."' AND password = '".$password."'";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// a' or 'a'like'a
				$_SESSION['insession2'] = True;
				$_SESSION['doomguy'] = "success";
				$msg = '<p class="orange">Nombre: Hurt me plenty<br/>PCR{ee9b2df1d20fea2ca0490716e5adadf2}</p>
						<script>document.getElementById("logo").className = "logo success";</script>';
			} else {
				$_SESSION['insession2'] = False;
				$_SESSION['doomguy'] = "failed";
				$msg = '<p class="red">'.$msgs[$msgid].'</p>
					<script>document.getElementById("logo").className = "logo failed";</script>';
			}
			$conn->close();
		}
	}
	return $msg;
}


function search(){
	global $msgs, $msgid;
	if (isset($_POST['search'])){
		// ";alert(1);//
		// ";alert(1);<!--
		// ";eval(String.fromCharCode(97,108,101,114,116,40,49,41));//
		$search = $_POST['search'];
		$txt = strtolower($search);
		$txt = str_replace(" ", "", $txt);
		$msg = "";
		if (strpos($txt, '";') !== false && (strpos($txt, 'alert(') !== false || strpos($txt, 'eval(') !== false) && strpos($txt, ');') !== false && (strpos($txt, '//') !== false || strpos($txt, '<!--') !== false)){
			$msg = '<p>Eso es un DOM based XSS !</p>
					<p class="orange">Nombre: Otro cl&aacute;sico!<br/>PCR{50b7ba533218d1269b0da30b506833da}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			$msg = '<script>document.getElementById("logo").className = "logo failed";</script>
					<p class="red">'.$msgs[$msgid].'</p>';
		}
		if ($search != "" && strpos($txt, 'script') === false && strpos($txt, '<') === false  && strpos($txt, '>') === false){
			$msg = $msg.'<script>document.getElementById("msg").innerHTML="El valor '.$search.' no fue encontrado";</script>';
		}
		return $msg;
	}
}
go_nav();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>PwnedCR 2018 - CTF:2</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
	<div id="logo" class="logo <?php $msg = login(); echo $_SESSION['doomguy']; ?>"></div>
	<div class="header">Hurt me plenty</div>
	<?php ?>
	<div class="content">
		<ul class="panes">
			<li class="left-pane">
			</li>
			<li class="middle-pane">
				<?php 
				if (isset($_SESSION['insession2']) && $_SESSION['insession2'] == True){
					echo '<p><a href="?go=home">Inicio</a> | <a href="?go=products">Productos</a> </p>
						 <p>Bien, lograste entrar</p>
						 <form method="POST">
							<div style="text-align: center;">Buscar:<input type="text" name="search" class="search-box"/><input type="submit" class="button" value="Buscar"/></div>
							<p><b>Resultados:</b></p>
							<hr/>
							<p id="msg" class="red"></p>
							'.search().'
						 </form>
						 <div class="logout"><form method="POST"><input type="submit" class="button" name="logout" value="Log out"/></form></div>';
				}else{
					echo '
				<p><b>Login:</b></p>
				<form method="POST">
					<table>
						<tr><td>Username:</td><td><input type="text" name="username"/></td></tr>
						<tr><td>Password:</td><td><input type="password" name="password"/></td></tr>
					</table>
					<p><input type="submit" name="login" class="button" value="Login"/></p>
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
