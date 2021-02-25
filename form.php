<?php

    function registrForm(){
        return $formContent = "
        <form action='' method='POST' enctype='multipart/form-data'>
            <p>Имя</p>
            <input type='text' name='name'>
            <p>Пол</p>
            <input type='text' name='gender'>
            <p>Возраст</p>
            <input type='text' name='age'>
            <p>Email</p>
            <input type='email' name='email'>
            <p>Номер телефона</p>
            <input type='tel' name='tel'>
            <p>Логин</p>
            <input type='text' name='login'>
            <p>Пароль</p>
            <input type='password' name='password'></br>
            <p>Повтор Пароль</p>
            <input type='password' name='confirm'>
            <p>Добавьте свое фото</p>
            <input type='file' name='user_img'><br><br>
            <input type='submit' name='regSubmit' value='Отправить'>
        
        </form>";
    }

    function loginForm(){
        return $formContent = "
        <form action='' method='POST'>
            <p>Введите логин:</p>
            <input type='text' name='login'> 
            <p>Введите пароль:</p>
            <input type='password' name='password'></br></br>
            <input type='submit' name='loginSubmit'> 
        </form>";
    }

    function wallForm(){
        if(isset($_POST['sub_coment_submit']) OR isset($_POST['subComentSubmit'])){
            $submitName = "name='subComentSubmit'";
        }else{
            $submitName = "name='postToWallSubmit'";
        }
        return $formContent = "
        <form action='' method='POST'>
            <p>Вы можете оставить запись на стене:</p>
            <input type='text' name='text'></br></br>
            <input type='submit' $submitName value='Оставить запись'> 
        </form>";
    }

    function chatForm(){
        return $formContent = "
        <form action='' method='POST'>
            
            <textarea name='message' placeholder='ваше сообщение...' autofocus></textarea></br></br>
            <input type='submit' name='messageSubmit'> 
        </form>";
    }



