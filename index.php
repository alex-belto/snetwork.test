<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbName = 'test';

    $link = mysqli_connect($host, $user, $password, $dbName);
    mysqli_query($link, "SET NAMES 'utf-8'");

    $uri = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI']), '/');
    var_dump($uri);

    if(empty($uri)){
        $uri = '/'; 
    }
    
    var_dump($_SERVER['REQUEST_URI']);
    $query = "SELECT * FROM pages WHERE url = '$uri'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    $page = mysqli_fetch_assoc($result);

    
    if(!$page){
        $query = "SELECT * FROM pages WHERE url = '404'";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $page = mysqli_fetch_assoc($result); 
        header("HTTP/1.0 404 Not Found");
    }
        $title = $page['title'];
        $content = $page['text'];
   

    include 'layout.php';
