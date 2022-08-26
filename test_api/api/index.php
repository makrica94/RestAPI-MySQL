<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application; charset=utf-8');

require 'connect.php';
require 'functions.php';

$method = $_SERVER['REQUEST_METHOD'];

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];
switch ($method) {
    case "GET":
        if ($type === 'posts') {
            if (isset($id))
                getPost($connect, $id);
            else
                getPosts($connect);
        }
        break;

    case "POST":
        if ($type === 'posts') {

            addPost($connect, $_POST);
        }
        break;

    case "DELETE":
        if ($type === 'posts') {
            if (isset($id))
                deletePost($connect, $id);
            break;
        }
}
