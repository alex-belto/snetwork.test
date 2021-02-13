<?php
    
    function createLink($href, $text, $uri){
       
      if($href == $uri){
        $class = 'class="active"';
      }else{
        $class = ''; 
      }

      if($href != '/'){
        $href = "/$href/";
      }
     
        echo "<a href=\"$href\" $class>$text</a>";
    }

    if(isset($_SESSION['auth']) AND $_SESSION['auth'] == true){
      $noList = "NOT IN ('404', 'registration', 'login')";
    }else{
      $noList = "NOT IN ('404', 'logout')";
    }
    


    $query = "SELECT * FROM pages WHERE url $noList";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for($arr=[]; $step = mysqli_fetch_assoc($result); $arr[] = $step);

    //var_dump($arr);

    foreach($arr as $value){
      
      createLink($value['url'], $value['title'], $uri);
    }


