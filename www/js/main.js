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
