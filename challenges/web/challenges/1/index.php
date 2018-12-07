<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
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
function login(){
	global $msgs, $msgid;
	$msg = '';
	if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$txt = strtolower($username.$password);
		if (strpos($txt, 'select') !== false || strpos($txt, 'drop') !== false || strpos($txt, 'delete') !== false || strpos($txt, 'update') !== false){
			$_SESSION['insession'] = False;
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
				$_SESSION['insession'] = True;
				$_SESSION['doomguy'] = "success";
				//Nombre: No es lo que parece! PCR{581711b136ddbf293b7049e7b271d729}
				setcookie("JSESSIONID", 'Tm9tYnJlOiBObyBlcyBsbyBxdWUgcGFyZWNlISBQQ1J7NTgxNzExYjEzNmRkYmYyOTNiNzA0OWU3YjI3MWQ3Mjl9');
				setcookie("uid", '846509');
				$msg = '<p class="orange">Nombre: El inicio en Web Hacking<br/>PCR{e1b8300b5bed3f4c5d4a61bce5878bc1}</p>
						<script>document.getElementById("logo").className = "logo success";</script>';
			} else {
				$_SESSION['insession'] = False;
				$_SESSION['doomguy'] = "failed";
				$msg = '<p class="red">'.$msgs[$msgid].'</p>
					<script>document.getElementById("logo").className = "logo failed";</script>';
			}
			$conn->close();
		}
	}
	return $msg;
}
if (isset($_POST['logout'])){
	$_SESSION['insession'] = False;
}
function auth(){
	global $msgs, $msgid;
	if (isset($_COOKIE['uid'])) {
		if ($_COOKIE['uid'] == '846505'){
			return '<p class="orange">Nombre: Esa es la ruta de escalada!<br/>PCR{6525dc63fabe74e833c92a8d99e82a8c}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}
	}
}
function search(){
	global $msgs, $msgid;
	if (isset($_POST['search'])){
		$search = $_POST['search'];
		$txt = strtolower($search);
		$txt = str_replace(" ", "", $txt);
		$msg = "";
		if (strpos($txt, '<script>') !== false && strpos($txt, 'alert(') !== false && strpos($txt, ')') !== false && strpos($txt, '</script>') !== false){
			$msg = '<p class="orange">Nombre: Todo un cl&aacute;sico!<br/>PCR{a12d9c8d4a1b4392facb723eeb09c046}</p>
					<script>document.getElementById("logo").className = "logo success";</script>';
		}else{
			$msg = '<script>document.getElementById("logo").className = "logo failed";</script>';
		}
		if ($search != ""){
			$msg = $msg.'<p class="red"><b> El valor '.$search.' no fue encontrado</b></p>';
		}
		return $msg.'<p class="red">'.$msgs[$msgid].'</p>';
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
	<div id="logo" class="logo <?php $msg = login(); echo $_SESSION['doomguy']; ?>"></div>
	<div class="header">Hey, not too rough</div>
	<div class="content">
		<ul class="panes">
			<li class="middle-pane">
				<?php 
				if (isset($_SESSION['insession']) && $_SESSION['insession'] == True){
					echo '<p><b>Welcome</b></p>
						 <p>Bien, lograste entrar</p>
						 <form method="POST">
							<div style="text-align: center;">Buscar:<input type="text" name="search" class="search-box"/><input type="submit" class="button" value="Buscar"/></div>
							<p><b>Resultados:</b></p>
							<hr/>
							<p></p>
							'.search().'
						 </form>
						 <div class="logout"><form method="POST"><input type="submit" class="button" name="logout" value="Log out"/></form></div>';
					echo auth();
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
				<p><a href="redirect.php?p=/index.php">Go back to challenges</a></p>
					';
				}
				echo $msg;
				
				?>
				
			</li>
		</ul>
	</div>
	<div class="footer">
		<p>Sponsored by WhiteJaguars Cyber Security, Costa Rica 2018 | www.whitejaguars.com | info@whitejaguars.com</p>
	</div>
	</body>
</html>
