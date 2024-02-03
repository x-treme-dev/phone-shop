<?php

/* 
 * Контроллер функций пользователя
 * 
 */

// подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';


/**
 * AJAX регистрация пользователя.
 * Инициализация сессионной переменной ($_SESSION['user'])
 * 
 * @return json массив данных нового пользователя
 */

// Смотрим, пришла ли переменная GET- или POST- параметром
// Если пришла то, запишем. Если нет, то запишем null
function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    
    // Проверим обязательные поля для заполнения
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);
    
    if(! $resData && checkUserEmail($email)){
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email('{$email}') уже зарегистрирован";
    }
    
    if(! $resData){
        $pwdMD5 = md5($pwd1);
        
        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);
        
        if($userData['success']){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;
            
            $userData = $userData[0];
            $resData['userName'] = $userData['name']? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name']? $userData['name']: $userData['email'];
            } else {
                $resData['success'] = 0;
                $resData['message'] = 'Ошибка регистрации';
            }
    }
   echo json_encode($resData); 
}


/*
 * Разлогинивание пользователя
 * Суть разлогинивания - удалить сессионные переменные и тогда сайт забудет о пользователе
 */

function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    
    redirect('/');
}


