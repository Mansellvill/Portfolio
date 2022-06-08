<?php
$connect = mysqli_connect('127.0.0.1', 'Mansell', '356971Vova', 'wiki');

if (!$connect) {
    echo "Ошибка: Невозможно установить соединение с MySQL.";
    echo "Код ошибки errno: " . mysqli_connect_errno();
    echo "Текст ошибки error: " . mysqli_connect_error();
	exit;
	}
	
	session_start();
?>