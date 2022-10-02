function addItem(id) {
    document.getElementById('hidden-cart-box-' + id).style.display = 'block';
    try{
        document.getElementById('item-' + id).style.display = 'none';
    }
    catch{}
    try{
        cartCountnav(1);
    }
    catch{}
    try {
        updateItemsForCheckOUt(id)
    } catch (error) {

    }


    document.getElementById('total-item-' + id).innerHTML = 1;
    document.getElementById('total-item-' + id).setAttribute('data-total-item',1);
    var inputs = document.getElementById('dynamic-inputs');
     inputs.innerHTML += '<input type="hidden" value = "'+1+'"name="'+id+'"id="item-to-cart-'+id+'">'


}
function addMoreItem(id) {
    let count = Number(document.getElementById('total-item-' + id).getAttribute('data-total-item'));
    update = count+1;
    document.getElementById('total-item-' + id).innerHTML = count + 1;
    document.getElementById('total-item-' + id).setAttribute('data-total-item', count + 1)
    try{
        price= Number(document.getElementById('total-cost-for-item-'+id).getAttribute('data-price'));
       document.getElementById('total-cost-for-item-'+id).innerHTML= price* update;
       totalCost(price);
       totalItems(1)
    }
    catch{}
    try{document.getElementById('item-to-cart-'+id).value=count + 1;}
    catch{}
    try{
        cartCountnav(1)
    }
    catch{}
    try {
        updateItemsForCheckOUt(id)
    } catch (error) {

    }





}
function addLessItem(id) {
    let count = Number(document.getElementById('total-item-' + id).getAttribute('data-total-item'));
    if (count <= 1) {
        document.getElementById('hidden-cart-box-' + id).style.display = 'none';

        try{
            document.getElementById('item-' + id).style.display = 'block';
            document.getElementById('total-item-' + id).setAttribute('data-total-item',0);
           var elem = document.querySelector('#item-to-cart-'+id);
           elem.parentNode.removeChild(elem);
        }
        catch{}
        try{
            document.getElementById('item-in-the-cart-' + id).style.display = 'none';
            price= Number(document.getElementById('total-cost-for-item-'+id).getAttribute('data-price'));
            total = -price;
            totalCost(total)
            totalItems(-1)
        }
        catch{}
        try{
            cartCountnav(-1)
        }
        catch{}
        try {
           var elem = document.querySelector('#item-id-'+id);
           elem.parentNode.removeChild(elem);
        } catch (error) {

        }

    }
    else {
        let update = count - 1;
        document.getElementById('total-item-' + id).innerHTML = update;
        document.getElementById('total-item-' + id).setAttribute('data-total-item', update);
        try {
            price= Number(document.getElementById('total-cost-for-item-'+id).getAttribute('data-price'));
            document.getElementById('total-cost-for-item-'+id).innerHTML= price* update ;
            total = -price;
            totalCost(total)
            totalItems(-1)
        }
        catch {

        }
        try {
            document.getElementById('item-to-cart-'+id).value=update;
        }
        catch {

        }
        try{
            cartCountnav(-1)
        }
        catch{}
        try {
            updateItemsForCheckOUt(id)
        } catch (error) {

        }



    }
}
function totalCost(total){
    old = Number (document.getElementById('total-cost').getAttribute('data-total-cost'));
    document.getElementById('total-cost').setAttribute('data-total-cost',old+total);
    // console.log(document.getElementById('total-cost').getAttribute('data-total-cost'));
    document.getElementById('total-cost').innerHTML=old+total ;
}
function totalItems(update){
    old = Number (document.getElementById('total-items').getAttribute('data-total-items'));
    document.getElementById('total-items').setAttribute('data-total-items',old+update);
    // console.log(document.getElementById('total-cost').getAttribute('data-total-cost'));
    document.getElementById('total-items').innerHTML=old+update ;
    document.getElementById('count-cart').innerHTML=old+update ;
}
function cartCount (){

    try {
        update = document.getElementById('total-items').getAttribute('data-total-items');
        document.getElementById('count-cart').setAttribute('data-count-cart',update);
        document.getElementById('count-cart').innerHTML=document.getElementById('total-items').getAttribute('data-total-items');
    } catch (error) {

    }


}

cartCount ()
function cartCountnav(update){
    old =Number( document.getElementById('count-cart').getAttribute('data-count-cart'));
    document.getElementById('count-cart').setAttribute('data-count-cart',old+update);
    document.getElementById('count-cart').innerHTML = old+update;

}
function navBtn(){
    document.getElementById('nav-btn').addEventListener('click',function(){
        // console.log('done');
    })
}
function updateItemsForCheckOUt(id) {
    let count = Number(document.getElementById('total-item-' + id).getAttribute('data-total-item'));
    console.log(id,count);
 }

