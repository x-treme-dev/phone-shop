<?php

/* 
 *  categoryController.php
 * 
 * Контроллер страницы (/category/1)
 */

// подключаем модели

include '../models/CategoriesModel.php';
include '../models/ProductsModel.php';

/** 
 * Формирование страницы категории
 * 
 *   @param object $smarty шаблонизатор
 */

function indexAction($smarty){
     $catId = isset($_GET['id']) ? $_GET['id'] : null;
     if($catId == null) exit();
     
     $rsProducts = null;
     $rsChildCats = null;
     $rsCategory = getCatById($catId);
    
     // если главная категория, то показываем дочернии категории
     // иначе показываем товар
     if($rsCategory['parent_id'] == 0){
         $rsChildCats = getChildrenForCat($catId);
     } else {
         $rsProducts = getProductsByCat($catId);
     }
    $rsCategores = getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle', 'Товары категории ' . $rsCategory['name']);
    
    $smarty->assign('rsCategory', $rsCategory);
    $smarty->assign('rsProducts', $rsProducts);
    
    $smarty->assign('rsChildCats', $rsChildCats);
    $smarty->assign('rsCategories', $rsCategores);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}

