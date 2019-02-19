<?php 

include('functions.php');
include('data.php');



$content = connection_page('templates/index.php', $lots);
$layout = connection_page('templates/layout.php', $categories);

print($layout);
?>