<?php

/* 
 *  Модель для таблицы продукции (products)
 * 
 */

/**
 * Получаем последние добавленные товары
 * 
 * @param integer $limit Лимит товаров
 * @return array Массив товаров
 */

function getLastProducts($limit = null){
    
    $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
    
    if($limit){
        $sql .= " LIMIT {$limit}";
    }
     
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

function getProductsByCat($itemId){
    
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
    
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Получить данные продукта по ID
 * 
 * @param iteger $itemId ID продукта
 * @return array массив данных продукта
 */

function getProductById($itemId){
    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE id = '{$itemId}'";
    
    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
}
