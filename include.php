<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbName = 'test';

    $link = mysqli_connect($host, $user, $password, $dbName);
    mysqli_query($link, "SET NAMES 'utf-8'");