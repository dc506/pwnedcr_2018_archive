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
	$_SESSION['insession3'] = False;
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
	if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$txt = strtolower($username.$password);
		if (strpos($txt, 'drop') !== false || strpos($txt, 'delete') !== false || strpos($txt, 'update') !== false){
			$_SESSION['insession3'] = False;
			$_SESSION['doomguy'] = "failed";
			$msg = $failed;
		}else{
			$conn = new mysqli("localhost", "root", "root", "playground");
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			// admin  mysupersecurepassword
			// username=asd&password=asd' OR IF(1=2,sleep(2),sleep(0)) = NULL AND 'a' = 'a&login=Login
			// username=asd&password=asd' OR IF((SELECT username from users where username = 'admin')='admin',sleep(2),sleep(0)) = NULL AND 'a' = 'a&login=Login
			// username=asd&password=asd' OR IF((SELECT SUBSTR((SELECT password from users where username = 'admin'),1,1))='m',sleep(2),sleep(0)) = NULL AND 'a' = 'a&login=Login
			$sql = "SELECT id, username, password FROM users WHERE username = '".$username."' AND password = '".$password."'";
			$result = $conn->query($sql);
			if ($result->num_rows == 1) {
				$result->data_seek(0);
				$row = $result->fetch_assoc();
				if ($row["username"] != "" && $row["password"] != "" && $row["username"] == $username && $row["password"] == $password){
					$_SESSION['insession3'] = True;
					$_SESSION['doomguy'] = "success";
					$msg = '<p class="red">Brutal, sos un monstruo en SQL Injection</p>
							<p class="orange">Nombre: Ultra-Violence<br/>PCR{782a010c2fdeaf42f7f2ffed27bd67b9}</p>
							<script>document.getElementById("logo").className = "logo success";</script>';
				}else{
					$_SESSION['insession3'] = False;
					$_SESSION['doomguy'] = "failed";
					$msg = $failed;
				}
			} else {
				$_SESSION['insession3'] = False;
				$_SESSION['doomguy'] = "failed";
				$msg = $failed;
			}
			$conn->close();
		}
	}
	return $msg;
}


function val_auth_code(){
	global $msgs, $msgid;
	if (isset($_POST['search'])){
		// hjgfk58jv904
		$search = $_POST['search'];
		$txt = strtolower($search);
		$txt = str_replace(" ", "", $txt);
		$msg = "";
		if ($txt == 'hjgfk58jv904'){
			$msg = '<p>Esta volando en JavaScript !</p>
					<p class="orange">Nombre: Claro como el agua <br/>PCR{48f0e0511fd5edd06bb72ed6107d0a39}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			$msg = '<script>document.getElementById("logo").className = "logo failed";</script>
					<p class="red">'.$msgs[$msgid].'</p>';
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
	return (isset($_SESSION['insession3']) && $_SESSION['insession3'] == True);
}
auth();
go_nav();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
	<title>PwnedCR 2018 - CTF:3</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/jquery.js"></script>
	</head>
	<body>
	<div id="logo" class="logo <?php $msg = login(); echo $_SESSION['doomguy']; ?>"></div>
	<div class="header">Ultra-Violence</div>
	<?php ?>
	<div class="content">
		<ul class="panes">
			<li class="left-pane">
			</li>
			<li class="middle-pane">
				<?php 
				if (inSession()){
					echo '<p><a href="?go=home">Inicio</a> | <a href="?go=products">Productos</a> </p>
						 <p>Bien, lograste entrar</p>
						 <form method="POST">
							<div style="text-align: center;">C&oacute;digo de autorizaci&oacute;n:<input type="text" name="search" class="search-box"/><input type="submit" class="button" value="Buscar"/></div>
							<!-- Pista: No lo va a encontrar por bruteforcing -->
							<hr/>
							<p id="msg" class="red"></p>
							'.val_auth_code().'
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
