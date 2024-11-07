<?php
require "../app/models/User.php";
require "../app/controllers/UserController.php";
require "../app/models/Post.php";
require "../app/controllers/PostController.php";

use app\controllers\UserController;
use app\controllers\PostController;

//get URI without query string
$url = strtok($_SERVER["REQUEST_URI"], '?');

//split url into array
$uriArray = explode("/", $url);

if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $userController = new UserController();
    $userController->getUsers();
}

if ($uriArray[1] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/users.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController = new UserController();
    $userController->saveUser();
}

if ($uriArray[1] === 'add-users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/add-users.html';
}

$url = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $url);

if ($uriArray[1] === 'api' && $uriArray[2] === 'post' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $postController = new PostController();
    $postController->getPost();
}

if ($uriArray[1] === 'searchingPosts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/searchingPosts.html';
}

if ($uriArray[1] === 'api' && $uriArray[2] === 'post' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $postController = new PostController();
    $postController->savePost();
}

if ($uriArray[1] === 'addingPosts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require './views/addingPosts.html';
}


