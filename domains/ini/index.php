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
	
	<?php echo '<br>';
   $intlcod = IntlChar::ord('N');
   echo $intlcod;
   echo '<br>';
   ?>
	<div style="margin: 10px 200px; display: flex; flex-direction: column; background-color: blue;">
   <table style="margin: 0 auto; background-color: #FDF9F9;">
	   <caption>Значение и Символ</caption>
	   <tr>
	   <td style="width: 180px; border: 1px solid #000000; text-align: center; color: red; font-size: 26px;">Символ</td>
	   <td style="width: 180px; border: 1px solid #000000; text-align: center; color: red; font-size: 26px;">Значение</td>
		   <?php for($i=0; $i<40; $i++): ?>
		   <tr>
			   <td style=" border: 1px solid #000000; text-align: center; color: #083BA2; font-size: 18px;"><?php echo $i; ?></td>
			   <td style=" border: 1px solid #000000; text-align: center; color: #083BA2; font-size: 18px;"><?php echo (Intlchar :: chr($i)); ?></td>
	   </tr>
	   <?php endfor; ?>

	</table>
		</div
		   
	
	
<body>
</body>
</html>