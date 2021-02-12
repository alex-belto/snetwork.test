<?php

function resgistrForm($link){
    return $formContent = "
    <form action='' method='POST'>
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
        <input type='password' name='confirm'></br>
        <input type='submit' name='submit' value='Отправить'>
       
    </form>";
}