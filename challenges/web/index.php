
<html lang="en-US">
    <head>
      <meta charset="utf-8">
      <title>PwnedCR CON 2018</title>
<style type="text/css">
body {
  background: black;
  margin: 60px 0 0 30px;
  color: white;
  font-weight: 400;
  font-size: 10px;
  font-family: monospace;
}
a { color: lime; }
a:hover { color: orange; }
.glitch {
  color: lime;
  font-size: 20px;
  position:relative;
  white-space: pre;
  display:inline-block;
  line-height: 80%;
  margin: 0 auto;
}

@keyframes noise-anim {
  0% {
    clip: rect(83px, 9999px, 23px, 0);
  }
  5% {
    clip: rect(20px, 9999px, 74px, 0);
  }
  10% {
    clip: rect(70px, 9999px, 77px, 0);
  }
  15.0% {
    clip: rect(83px, 9999px, 85px, 0);
  }
  20% {
    clip: rect(50px, 9999px, 18px, 0);
  }
  25% {
    clip: rect(36px, 9999px, 59px, 0);
  }
  30.0% {
    clip: rect(38px, 9999px, 14px, 0);
  }
  35% {
    clip: rect(92px, 9999px, 41px, 0);
  }
  40% {
    clip: rect(20px, 9999px, 22px, 0);
  }
  45% {
    clip: rect(44px, 9999px, 7px, 0);
  }
  50% {
    clip: rect(88px, 9999px, 50px, 0);
  }
  55.0% {
    clip: rect(78px, 9999px, 89px, 0);
  }
  60.0% {
    clip: rect(42px, 9999px, 73px, 0);
  }
  65% {
    clip: rect(91px, 9999px, 17px, 0);
  }
  70% {
    clip: rect(59px, 9999px, 64px, 0);
  }
  75% {
    clip: rect(55px, 9999px, 61px, 0);
  }
  80% {
    clip: rect(85px, 9999px, 42px, 0);
  }
  85.0% {
    clip: rect(100px, 9999px, 24px, 0);
  }
  90% {
    clip: rect(56px, 9999px, 45px, 0);
  }
  95% {
    clip: rect(86px, 9999px, 62px, 0);
  }
  100% {
    clip: rect(86px, 9999px, 47px, 0);
  }
}
.glitch:after {
  content: attr(data-text);
  position: absolute;
  left: 2px;
  text-shadow: -1px 0 blue;
  top: 0;
  /*color: white;
  background: black;*/
  overflow: hidden;
  clip: rect(0, 1000px, 0, 0);
  animation: noise-anim 1s infinite linear alternate-reverse;
}

@keyframes noise-anim-2 {
  0% {
    clip: rect(50px, 9999px, 70px, 0);
  }
  5% {
    clip: rect(80px, 9999px, 10px, 0);
  }
  10% {
    clip: rect(1px, 9999px, 62px, 0);
  }
  15.0% {
    clip: rect(82px, 9999px, 40px, 0);
  }
  20% {
    clip: rect(32px, 9999px, 63px, 0);
  }
  25% {
    clip: rect(63px, 9999px, 31px, 0);
  }
  30.0% {
    clip: rect(15px, 9999px, 39px, 0);
  }
  35% {
    clip: rect(17px, 9999px, 52px, 0);
  }
  40% {
    clip: rect(66px, 9999px, 59px, 0);
  }
  45% {
    clip: rect(3px, 9999px, 58px, 0);
  }
  50% {
    clip: rect(56px, 9999px, 28px, 0);
  }
  55.0% {
    clip: rect(90px, 9999px, 91px, 0);
  }
  60.0% {
    clip: rect(94px, 9999px, 97px, 0);
  }
  65% {
    clip: rect(18px, 9999px, 79px, 0);
  }
  70% {
    clip: rect(59px, 9999px, 37px, 0);
  }
  75% {
    clip: rect(35px, 9999px, 83px, 0);
  }
  80% {
    clip: rect(51px, 9999px, 57px, 0);
  }
  85.0% {
    clip: rect(28px, 9999px, 63px, 0);
  }
  90% {
    clip: rect(98px, 9999px, 55px, 0);
  }
  95% {
    clip: rect(69px, 9999px, 94px, 0);
  }
  100% {
    clip: rect(56px, 9999px, 1px, 0);
  }
}
.glitch:before {
  content: attr(data-text);
  position: absolute;
  left: -2px;
  text-shadow: 1px 0 lime;
  top: 0;
  /*color: white;
  background: black;*/
  overflow: hidden;
  clip: rect(0, 900px, 0, 0);
  animation: noise-anim-2 3s infinite linear alternate-reverse;
}
.magenta { color: magenta; }
.red { color: red; }
.center { text-align: center;}
.header { width: fit-content; }
.header p{ text-align: center; }
#content { font-size: 13px; }
#title { font-size: 25px; }
tr { vertical-align: initial; }
table { margin-top: 30px; width: 100%; }
td { border-bottom-style: dashed; }
b {
  color: lightgreen !important;
}
</style>
    </head>
    <body>
<div class="header">
<pre class="glitch" data-text="      :::::::::  :::       ::: ::::    ::: :::::::::: :::::::::   ::::::::  :::::::::
     :+:    :+: :+:       :+: :+:+:   :+: :+:        :+:    :+: :+:    :+: :+:    :+:
    +:+    +:+ +:+       +:+ :+:+:+  +:+ +:+        +:+    +:+ +:+        +:+    +:+
   +#++:++#+  +#+  +:+  +#+ +#+ +:+ +#+ +#++:++#   +#+    +:+ +#+        +#++:++#:
  +#+        +#+ +#+#+ +#+ +#+  +#+#+# +#+        +#+    +#+ +#+        +#+    +#+
 #+#         #+#+# #+#+#  #+#   #+#+# #+#        #+#    #+# #+#    #+# #+#    #+#
###          ###   ###   ###    #### ########## #########   ########  ###    ###      ">      :::::::::  :::       ::: ::::    ::: :::::::::: :::::::::   ::::::::  :::::::::
     :+:    :+: :+:       :+: :+:+:   :+: :+:        :+:    :+: :+:    :+: :+:    :+:
    +:+    +:+ +:+       +:+ :+:+:+  +:+ +:+        +:+    +:+ +:+        +:+    +:+
   +#++:++#+  +#+  +:+  +#+ +#+ +:+ +#+ +#++:++#   +#+    +:+ +#+        +#++:++#:
  +#+        +#+ +#+#+ +#+ +#+  +#+#+# +#+        +#+    +#+ +#+        +#+    +#+
 #+#         #+#+# #+#+#  #+#   #+#+# #+#        #+#    #+# #+#    #+# #+#    #+#
###          ###   ###   ###    #### ########## #########   ########  ###    ###
</pre><br>
<p style="float:right;margin-right:75px;">UNDERGROUND COSTA RICA CON 2018</p>
</div>
<div id="content" style="width: 80%;margin-bottom:50px;">
<br>
<pre>
  .---------------------------------------------------------------------------------------------------------------------------------.
.´ <b>Encargados:</b> cedric & rottenpie.
|  <b>Reglas: </b>
|        Scoreboard e infraestructura de PwnedCR están fuera de objectivo y se descalifica a cualquiera que intente atacarlos.
|        Queda excluido cualquier forma de ataque de denegación de servicios (DoS) o hacia los otros integrantes.
|        Se puede trabajar en equipo pero molestar y compartir flags está prohibido ya que los premios son individuales.
|        En caso de empate, PwnedCR staff avaluará una forma de desempate.
|
`+---------------------------------------------------------------------------------------------------------------------------------´
</pre>
<pre>
,+------------------+.
| <pre id="title" class="glitch" data-text="CH4113NG35">CHALLENGES</pre>
`+------------------+´
</pre>
<table>
	<tbody>
	<tr>
		<td><b>[ Tipo ]</b></td><td class="magenta">[ Nivel ]</td><td>[ Descripci&oacute;n ]</td><td class="red center">[ Flags ]</td><td class="center">[ Enlace ]</td> 
	</tr>
	<tr>
		<td><b>[WEB]</b></td><td class="magenta">Fácil</td><td>Hey, not too rough</td><td class="red center">10</td><td class="center"><a href="challenges/1/" target="_blank">ABRIR</a></td>
	</tr>
	<tr>
		<td><b>[WEB]</b></td><td class="magenta">Medio</td><td>Hurt me plenty</td><td class="red center">5</td><td class="center"><a href="challenges/2/" target="_blank">ABRIR</a></td> 
	</tr>
	<tr>
		<td><b>[WEB]</b></td><td class="magenta">Dificil</td><td>Ultra-Violence</td><td class="red center">3</td><td class="center"><a href="challenges/3/" target="_blank">ABRIR</a></td> 
	</tr>
	<tr>
		<td><b>[WEB]</b></td><td class="magenta">Ninja</td><td>Nightmare!</td><td class="red center">2</td><td class="center"><a href="challenges/4/" target="_blank">ABRIR</a></td> 
	</tr>
	</tbody>
</table><br><br>

</div>
    </body>
</html>
