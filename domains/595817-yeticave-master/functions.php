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
        
        