<?php
$a = $_POST[ 'page' ];
if ( $a == 'Google' )header( 'Location:  https://google.ru' );
if ( $a == 'VK' )header( 'Location:  https://vk.com' );
if ( $a == 'Сайт автора' )header( 'Location:  https://myrusakov.ru' );
?>