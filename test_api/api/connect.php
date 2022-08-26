<?php

$host = 'localhost'; // адрес сервера
$db_name = 'test_api'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль

// создание подключения к базе   
$connect = mysqli_connect($host, $user, $password, $db_name);
