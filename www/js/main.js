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