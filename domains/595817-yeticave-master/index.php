<?php 

include('functions.php'); // подключаем функцию
include('templates/data.php'); //подключаем массив, так как он в папке templates то адрес соответствующий


// получаем тело страницы (templates/index.php)
$layout_data['content'] = include_template('index', $index_data);
// получаем обертку страницы (templates/layout.php)
$layout = include_template('layout', $layout_data);
//так как у нас в файле functions.php прописаны расширения и адрес то здесь они не нужны
print ($layout);
