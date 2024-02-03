 /**
 * Функция добавления товаров в корзину
 * 
 * @param integer itemId Id продукта
 * @return в случае успеха обновятся данные корзины на странице
 * 
 */

function addToCart(itemId){
    console.log("js - addToCart()");
    $.ajax({
       type: 'POST',
       async: false,
       url: "/cart/addtocart/" + itemId + '/',
       dataType: 'json',
       success: function(data){
           if(data['success']){
               $('#cartCntItems').html(data['cntItems']);
               $('#addCart_' + itemId).hide();
               $('#removeCart_' + itemId).show();
           }
       }
    });
}

/**
 * Удаление продукта из корзины
 * 
 * @param integer itemId ID продукта
 * @returns в случае успеха обновятся данные корзины на странице
 */

function removeFromCart(itemId){
    console.log("js - removeFromCart("+itemId+")");
    $.ajax({
       type: 'POST',
       async: false,
       url: "/cart/removefromcart/" + itemId + '/',
       dataType: 'json',
       success: function(data){
           if(data['success']){
               $('#cartCntItems').html(data['cntItems']);
               $('#addCart_' + itemId).show();
               $('#removeCart_' + itemId).hide();
           }
       }
    });
}

/**
 * Подсчет стоимости купленного товара
 * 
 * @param integer itemId ID продукта
 */

function conversionPrice(itemId){
    var newCnt = $('#itemCnt_' + itemId).val();
    var itemPrice = $('#itemPrice_' + itemId).attr('value');
    var itemRealPrice = newCnt * itemPrice;
    
    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}

/**
 * Получение данных с формы
 * 
 * @param {type} obj_form - объект формы, какой-то индентификатор
 * формы с полями данных от пользователя
 * при помощи функции each() из jquery пробегаем по всем input, textarea, select
 * объекта obj_form и берем имя и значение полей
 * Далее, смотрим в консоли, как это работает
 */
function getData(obj_form){
    var hData = {};
    $('input, textarea, select', obj_form).each(function(){
        if(this.name && this.name !=''){
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}


/**
 * 
 * Регистрация нового пользователя
 * 
 */
function registerNewUser(){
    // получили данные из блока registerBox, который находится в leftcolum.tpl
    var postData = getData('#registerBox');
    
    $.ajax({
       type: 'POST',
       async: false,
       url: "/user/register/",
       data: postData,
       dataType: 'json',
       success: function(data){
           if(data['success']){
               alert('Регистрация прошла успешно');
               
               //> блок в левом столбце
               $('#registerBox').hide();
               
               $('#userLink').attr('href', '/user/');
               $('#userLink').html(data['userName']);
               $('#userBox').show();
               
           }else {
               alert(data['message']);
           }
       }
       
       
    });
}

function logout(){
   $.getScript('/user/logout/');
}
