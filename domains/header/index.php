<?php
$a = $_POST[ 'page' ];
if ( $a == 'Google' )header( 'Location:  https://google.ru' );
if ( $a == 'VK' )header( 'Location:  https://vk.com' );
if ( $a == 'Сайт автора' )header( 'Location:  https://myrusakov.ru' );
?>





<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Заголовки (редирект)</title>
</head>

<body>
	
	<form method="post" name="zakaz" >
		<input type="text" name="page" list="url" placeholder="выберете из списка">
		<datalist id="url">
			<option value="Google">Google</option>
			<option value="VK">VK</option>
			<option value="Сайт автора">Сайт автора</option>
			
		</datalist>
		<input type="submit"  value="Перейти на сайт">
	</form>
</body>
</html>