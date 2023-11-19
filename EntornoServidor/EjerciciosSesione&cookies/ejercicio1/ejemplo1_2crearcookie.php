<?php
 setcookie("ejemplocookie", $_GET['nombre'], time()+3600,"/","");	//Parámetros rellenados: nombre, valor, expiración, ruta y dominio
/*	Se crea la cookie a partir del valor enviado desde el formulario.

	Al igual que otras cabeceras, las cookies deben ser enviadas antes de que el script genere
ninguna salida (es una restricción del protocolo). Esto implica que las llamadas a esta función
se coloquen antes de que se genere cualquier salida, incluyendo las etiquetas <html> y <head>,
al igual que cualquier espacio en blanco.

	La cookie enviada se almacenará en el equipo cliente, dónde depende del navegador:
- En Firefox en archivo,
	C:\Users\nombre_usuario\AppData\Roaming\Mozilla\Firefox\Profiles\nyiq0guv.default\cookies.sqlite

- En Chrome,
	C:\Users\nombre-usuario\AppData\Local\Google\Chrome\User Data\Default\cookies
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ejemplo cookies</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Ejemplo de uso de cookie</h1>
	<p>Se ha establecido una cookie de nombre <b>ejemplocookie</b> con el valor:
	<b><?php print $_GET['nombre']; ?></b>, que será válida durante 1 hora.</p>
	<p>Puedes comprobar el valor almacenado en este <a href="ejemplo1_3consultarcookie.php">enlace</a>.</p>
</body>
</html>