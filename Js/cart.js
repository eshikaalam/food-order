document.getElementById('btn-add').addEventListener('click',function(){
    const cartItem = document.getElementById('cartItem');
    const priceTag = document.getElementById('price-tag');
    cartItem.innerText = priceTag;
})