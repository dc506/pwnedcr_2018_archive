# CTF Web challenges, PwnedCR 2018
Retos extraídos del Hacking Playground donado por WhiteJaguars Cyber Security® a la comunidad PwnedCR 2018 para la competencia CTF realizadad el 1ro de Diciembre de 2018.

## Disclaimer:
Este sitio no debe ser utilizado en servidores expuestos a internet o fuera de entornos controlados debido a que esta desarrollado de forma insegura intencionalmente, WhiteJaguars Cyber Security® No se hace responsable por el mal uso o los daños ocasionados por el uso de este proyecto.
El contenido de este proyecto no prodrá ser utilizado para fines comerciales sin una aprobacion explicita por parte de WhiteJaguars Cyber Security, su uso esta permitido solo en actividades sin fines de lucro.

## Descripción
Este proyecto consta de cuatro niveles de dificultad y diferentes retos por cada nivel. Sin embargo aún así los niveles más dificiles estás desarrollados con una dificultad no muy elevada con la finalidad de poder ser resuelto en por lo menos un lapso de 5 horas como máximo en su totalidad.
### Hey, not too rough
1. El inicio en Web Hacking
2. Todo un clásico!
3. No es lo que parece!
4. Esa es la ruta de escalada!
5. Piece of cake
6. Hacia donde ir!
7. Siempre hay algo mas
8. Casi casi pero no!
9. Servicio de lavanderia 1
10. Servicio de lavanderia 2
### Hurt me plenty
1. Hurt me plenty
2. Fácil no?
3. Lista de compras
4. Otro clásico!
5. No compre esto
### Ultra-Violence
1. Ultra-Violence
2. Claro como el agua
3. Pase para Nightmare
### Nightmare!
1. Nightmare!
2. Nightmare 2!

##Proceso de instalación
## Prerequisitos
* Se debe tener instalado PHP en Apache o NGinX
* MySQL configurado intencionalmente de forma insegura con el usuario: root y password: root

## Pasos de instalación:
1. Copiar el contenido del proyecto al directorio raíz web (/var/www por ejemplo en Apache)
``` index.php challenges/ ```
2. Restaurar la base de datos:
```bash
sudo mysql --user=root -p < playground.sql
```
3. Probar el sitio: http://[ip_address]/
4. Diviértase!