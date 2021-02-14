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
            $imgName = $_FILES['user_img']['name'];
            $imgTmpName = $_FILES['user_img']['tmp_name'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $confirm = $_POST['confirm'];
            $imgPath = '/Applications/MAMP/htdocs/snetwork.test/imgsn/'.$_FILES['user_img']['name'];//путь к файлу
            
            $query = "SELECT login FROM users WHERE login = '$login'";
            $result = mysqli_fetch_assoc(mysqli_query($link, $query));
            
            if(empty($result)){//не логин

                if($password == $confirm AND preg_match('#^[A-Za-z0-9]{6,}$#', $_POST['password']) == 1){//на пароль
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    if(preg_match('#^[A-Za-z0-9].+\@[a-z]{3,5}\.[a-z]{2,3}$#', $_POST['email']) == 1){//email
                        if(preg_match('#^\+?[0-9]{9,12}$#', $_POST['tel']) == 1){//tel

                            move_uploaded_file($imgTmpName, $imgPath);//загрузка файла на диск

                            $query = "INSERT INTO users (name, age, gender, img, email, tel, login, password) VALUES ('$name', '$age', '$gender', '$imgName', '$email', '$tel', '$login', '$password')";
                            mysqli_query($link, $query) or die(mysqli_error($link));
                            $_SESSION['message'] = 'Запись успешно добавлена!';

                            move_uploaded_file($imgTmpName, $imgPath);

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

    function auth($link){
        if(isset($_POST['login']) AND isset($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $query = "SELECT * FROM users WHERE login = '$login'";
            $user = mysqli_fetch_assoc(mysqli_query($link, $query));

            if(!empty($user)){
                $hash = $user['password'];
                if(password_verify($password, $hash)){
                    $_SESSION['auth'] = true;
                    $_SESSION['userId'] = $user['id'];
                    $_SESSION['userName'] = $user['name'];


                    $_SESSION['message'] = 'Вход произведен успешно!';
                    header('Location: /');
                }else{
                    $_SESSION['message'] = 'Данные входа указаны неверно!';
                }
            }else{
                $_SESSION['message'] = 'Такого пользователя не существует!';
            }
        }
    }

    function logout($matches){
        
        if(!empty($matches[1][0]) AND $matches[1][0] == 'logout'){
            unset($_SESSION['auth']);
            header('Location: /');
        }
    }

    function profile($link, $uri){
        if($uri == '/' AND !empty($_SESSION['auth'])){
           
            $userId = $_SESSION['userId'];

            $query = "SELECT * FROM users WHERE id = '$userId'";
            $user = mysqli_fetch_assoc(mysqli_query($link, $query));

            $userImg = '/imgsn/'.$user['img'];
            $userName = $user['name'];
            $userAge = $user['age'];
            $userGender = $user['gender'];
            $userEmail = $user['email'];
            $userTel = $user['tel'];
            
            return $content = "
            <table>
                <tr>
                    <td><img src='$userImg' width='200' height='111'></td>
                </tr>
                <tr>
                    <td>$userName</td>
                </tr>
                <tr>
                    <td>$userAge</td>
                </tr>
                <tr>
                    <td>$userGender</td>
                </tr>
                <tr>
                    <td>$userEmail</td>
                </tr>
                <tr>
                    <td>$userTel</td>
                </tr>
               
            </table>";

          
        }
    }

    $content = profile($link, $uri);
    registration($link);
    auth($link);
    logout($matches);
    include 'layout.php';
