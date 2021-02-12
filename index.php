<?php 
    include 'include.php';


    $uri = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI']), '/');
    //var_dump($uri);

    if(empty($uri)){
        $uri = '/'; 
    }

    if(!empty($uri)){
        preg_match_all('#/(A-Za-z0-9){3,16}(/)?.*#', $_SERVER['REQUEST_URI'], $matches);
        $fromName = $matches[1][0];
        //echo $fromName;
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


    function registration($link){

    }

    include 'layout.php';
