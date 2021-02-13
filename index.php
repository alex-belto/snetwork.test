<?php 
    include 'include.php';
    include 'form.php';


    $uri = trim(preg_replace('#(\?.*)?#', '', $_SERVER['REQUEST_URI']), '/');
   

    if(empty($uri)){
        $uri = '/'; 
    }
    //var_dump($_SERVER['REQUEST_URI']);
    if(!empty($uri)){
        preg_match_all('#/([A-Za-z]{3,16})/#', $_SERVER['REQUEST_URI'], $matches);
        //var_dump($matches);
        if(empty($matches[1][0])){
            $formName = 'index';
        }else{
            $formName = $matches[1][0];
        }
        
       
        switch($formName){//link for Form
            case 'registration':
                $formContent = registrForm();
                break;
            case 'login':
                $formContent = loginForm();
                break;
        }
    }
    
    
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
        if(isset($_POST['name']) AND isset($_POST['age']) AND isset($_POST['gender']) AND isset($_POST['email'])
            AND isset($_POST['tel']) AND isset($_POST['login']) AND isset($_POST['password']) AND isset($_POST['confirm'])){

            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            
            
            $query = "SELECT login FROM users WHERE login = '$login'";
            $result = mysqli_fetch_assoc(mysqli_query($link, $query));
            
            if(empty($result)){//не логин

                if($password == $confirm AND preg_match('#^[A-Za-z0-9]{6,}$#', $_POST['password']) == 1){//на пароль
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    if(preg_match('#^[A-Za-z0-9].+\@[a-z]{3,5}\.[a-z]{2,3}$#', $_POST['email']) == 1){//email
                        if(preg_match('#^\+?[0-9]{9,12}$#', $_POST['tel']) == 1){//tel

                            $query = "INSERT INTO users (name, age, gender, email, tel, login, password) VALUES ('$name', '$age', '$gender', '$email', '$tel', '$login', '$password')";
                            mysqli_query($link, $query) or die(mysqli_error($link));
                            $_SESSION['message'] = 'Запись успешно добавлена!';

                        }else{
                            $_SESSION['message'] = 'проблема с номером телефона';//email
                        }
                    }else{
                        $_SESSION['message'] = 'проблема с email, подходящий формат test@gmail.com';//email
                    }
                    
                }else{
                    $_SESSION['message'] = 'проблема в логине или пароле';//не пароль
                }

            }else{
                $_SESSION['message'] = 'этот логин занят';//не логин
            }
        
        }else{
            if(isset($_POST['regSubmit'])){$_SESSION['message'] = 'Заполните все поля!';}
        }
    }

    registration($link);
    include 'layout.php';
