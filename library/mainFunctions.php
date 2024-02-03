<?php

/* 
 *  Общие функции для всего сайта
 */

/**
 * Формирование запрашиваемой страницы
 * 
 * @param type $smarty
 * @param type $controllerName
 * @param type $actionName
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
    include_once PathPrefix . $controllerName . PathPostfix;
    
    $function = $actionName.'Action';
    $function($smarty);
}

/**
 * Загрузка шаблона
 * 
 * @param type $smarty объект шаблонизатора
 * @param type $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName){
    $smarty->display($templateName . TemplatePostfix);
}

function d($value = null, $die = 1){
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if($die) die; 
}

/*
 * Преобразование результата работы функции выборки в ассоциативный массив
 * 
 * @param recordset $rs набор строк - результат работы SELECT
 * @return array
 */

function createSmartyRsArray($rs){
    
    if (! $rs) {
        return false;
    }

    $smartyRs = array();
    while ($row = mysql_fetch_assoc($rs)){
        $smartyRs[] = $row;
     }
    
     return $smartyRs;
}

/**
 * Редирект
 * @param string $url адрес для перенаправления
 */


function redirect($url){
    if(! $url) $url = '/';
    header("Location: {$url}");
    exit;
}