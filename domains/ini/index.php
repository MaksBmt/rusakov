<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Документ без названия</title>
</head>
	<?php
	$x = parse_ini_file('config.ini', true);
	$a = $x['P_1']['color'];
	echo($a);
	$b = $x['P_1']['font-size'];
	$a_1 = $x['P_2']['color'];
	$b_2 = $x['P_2']['font-size'];
	?>
<p style="color: <?=$a?>; font-size: <?=$b?>;" >
Этот текст должен быть красного цвета и большим шрифтом</p>
	<p style="color: <?=$a_1?>; font-size: <?=$b_2?>;">А этот текст будет синим и маленького размера</p>
	
<body>
</body>
</html>