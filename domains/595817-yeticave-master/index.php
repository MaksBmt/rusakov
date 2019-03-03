<?php 

include('functions.php'); // подключаем функцию
include('templates/data.php'); //подключаем массив, так как он в папке templates то адрес соответствующий



date_default_timezone_set('Europe/Moscow');
         $ts = time();
        $ts_midnight = strtotime("tomorrow");
        $secs_to_midnight = $ts_midnight - $ts;
        $hours = floor($secs_to_midnight/3600);
        $minutes = floor(($secs_to_midnight % 3600)/60);
        //$lot_time_remaining = "$hours . ':' . $minutes";
        //$index_data['lot_time_remaining'] = $lot_time_remaining ;


// получаем тело страницы (templates/index.php)
$layout_data['content'] = include_template('index', $index_data);
// получаем обертку страницы (templates/layout.php)
$layout = include_template('layout', $layout_data);
//так как у нас в файле functions.php прописаны расширения и адрес то здесь они не нужны
print ($layout);
