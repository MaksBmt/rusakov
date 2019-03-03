<?php
/**
 * Функция-шаблонизатор
 *
 * @param string $template_name Имя PHP-шаблона (без расширения)
 * @param array $data Массив с данными для шаблона
 * @param string $template_file Путь к файлу шаблона
 *
 * @return string $output Итоговый HTML-код из шаблона, где элементы $data заменены их значениями
 */
function include_template($template_name, $data) {
    $template_file = 'templates/' . $template_name . '.php';
    if (file_exists($template_file)) {
        ob_start();
        include($template_file);
        $output = ob_get_clean();
    }
    else {
        $output = '';
    }
    return $output;
}


/*===функция обработки цены =========*/


function format_price($a){ // обращение функции к переменной в цикле
$s = '<b class="rub">р</b>'; // общая переменная знак рубля
$x = ceil($a); // назначение переменной для цены и обьявления ее позднее
$z = number_format($x, 0, ' ', ' ');	// форматирование по условию
if ($x > 1000) { // условие если более 1000 считывает значение из переменной в цикле ниже
return $z . $s; // вывод результата
} else { // если условие не совпадает
return $z . $s; // вывод результата
}} //завершение функции

/* ====установка времени === */



       
        