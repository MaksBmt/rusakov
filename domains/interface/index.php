<?php

function __autoload($classname) {
        require_once "lib/{$classname}.php";
    }
$car = new Car();
$car -> move();

set_include_path(get_include_path().PATH_SEPARATOR.'lib');
    spl_autoload_extensions('.php');
    spl_autoload_register();
	
	$air = new Aircraft();
	$air -> fly();
echo '<br>';




$time_1 =  date('d.m.Y H:i:s',mt_rand());
$time_2 =  date('d.m.Y H:i:s',mt_rand());

$date_1 = new DateTime($time_1);
echo $date_1->format('d.m.Y H:i:s').'<br>';

$date_2 = new DateTime($time_2);
echo $date_2->format('d.m.Y H:i:s').'<br>';

$date = $date_1 -> diff($date_2);
//print_r($interval);
echo 'дней : '.$date->days.'<br>';
echo 'часов : '.$date->h.'<br>';
echo 'минут : '.$date->i.'<br>';
echo 'секунд : '.$date->s.'<br>';

$interval = new DateInterval('P1Y');


$period = new DatePeriod($date_1, $interval, $date->days);
foreach($period as $datetime) echo $datetime->format('d.m.Y H:i:s').'<br>';
