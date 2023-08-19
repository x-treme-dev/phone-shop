{*страница продукта*}

<div id='centerColumn'>
    
<h3>{$rsProduct['name']}</h3>

<img width='575' src="/images/products/{$rsProduct['image']}">
Стоимость: {$rsProduct['price']}

<a id ="addCart_{$rsProduct['id']}" href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину">Добавить в корзину</a>
<p> Описание <br />{$rsProduct['description']}</p>

</div>