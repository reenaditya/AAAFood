
$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	itemAddToCart();
	let restro_id = $('input.restro_id').val();
	emptyCartRestroMatchFail(restro_id);
});



$(document).on("click",".add-cart-btn",function () {
	var thisdata = $(this);
	thisdata.addClass('d-none');
	thisdata.parent().find('div.cart-add-remove-btn:first').removeClass('d-none');
	addProduct(thisdata);
});

$(document).on("click",".minus",function () {
	var thisdata = $(this);
	var val = thisdata.parent().find('input.count').val();
	plusMinusCart(val,'minus',thisdata);
});

$(document).on("click",".plus",function () {
	var thisdata = $(this);
	var val = thisdata.parent().find('input.count').val();
	plusMinusCart(val,'plus',thisdata);
});

function plusMinusCart(val,type,thisdata) {
	val = parseInt(val);
	var totalCart = 1;
	if (type=='plus' && val >0) {
		totalCart = val+1; 
	}
	if (type=='minus' && val >1) {
		totalCart = val-1;
	}
	thisdata.parent().find('input.count').val(totalCart);
	var data = thisdata.parent().parent();
	addProduct(data);
}

function addProduct(thisdata){
	var base = thisdata.parent();
	item_id = base.find('input.item-id').val();
	dish_name = base.find('a.dish-name').text();
	dish_count = base.find('input.count').val();
	dish_price = dish_count*base.find('input.dish-price').val();
	dish_qunt = base.find('span.dish-qunt').text();
	restro_id = $('input.restro_id').val();

    let products = [];
    if(localStorage.getItem('products')){
    	removeProduct(item_id);
        products = JSON.parse(localStorage.getItem('products'));
    }
    products.push({'id' : item_id, 'name' : dish_name, 'price': dish_price, 'qunt':dish_qunt, 'count':dish_count, 'restro_id' : restro_id});
    localStorage.setItem('products', JSON.stringify(products));
	itemAddToCart();
}

function emptyCartRestroMatchFail(restro_id){
	var prod = JSON.parse(localStorage.getItem('products'));
	$.each(prod,function(key , val){
		if (val.restro_id!=restro_id) {
			$('.empty-cart').click();
		}
	});
}

function removeProduct(productId){
	addCartItemToDB();
    let storageProducts = JSON.parse(localStorage.getItem('products'));
    let products = storageProducts.filter(product => product.id !== productId );
    localStorage.setItem('products', JSON.stringify(products));
}

function itemAddToCart() {
	var subTotal = 0.00;
	var suggest = '';
	var prod = JSON.parse(localStorage.getItem('products'));
	if (prod && prod.length >=1) {
        $.each(prod,function(key , val){
          	suggest+= '<div class="cat-product"><div class="delete-btn mt-1" data-id="'+val.id+'"><a href="javascript:void(0)" class="text-dark-white"> <i class="fa fa-times-circle"></i></a></div><div class="cat-name ml-2 wdt13"><a href="javascript:void(0)"><p class="text-light-green fw-700 tlt">'+val.name+'</p></a></div><div class="pull-none">'+val.qunt+'('+val.count+')</div><div class="price">$'+val.price+'</div></div>';
        	var setData = $("input.item-id"+val.id).parent();
        	setData.find('a.add-cart-btn').addClass('d-none');
        	setData.find('div.cart-add-remove-btn').removeClass('d-none');
        	setData.find('input.count').val(val.count);
        	subTotal = subTotal+val.price;
        });
	}
    $(".sub-total").text(subTotal);
    $(".total-amount").text(subTotal);
    $("input.total-amt").val(subTotal);
    $(".cat-product-box").html(suggest);
	addCartItemToDB()
}

$(document).on('click','.empty-cart',function () {
	emptyCart();
	refreshCart();
});

$(document).on('click','.delete-btn',function () {
	var thisdata = $(this);
	productId  = thisdata.attr('data-id');
	removeProduct(productId);
	refreshSingleCart(thisdata,productId);
	itemAddToCart();
	addCartItemToDB();
});

function emptyCart() {
	localStorage.clear();
	addCartItemToDB();
}

function refreshSingleCart(thisdata,productId) {
	thisdata.parent().remove();
	var data = $('.item-id'+productId);
	data.parent().find('a.add-cart-btn').removeClass('d-none');
	data.parent().find('div.cart-add-remove-btn').addClass('d-none');
	data.parent().find('input.count').val(1);
}

function refreshCart() {
	$('.cat-product').remove();
	$('.cart-add-remove-btn').addClass('d-none');
	$('.add-cart-btn').removeClass('d-none');
	$('input.count').val(1);
}

function addCartItemToDB() {
	var data = localStorage.getItem('products');
	var restro_id = $('input.restro_id').val();
	var user_id = $('input.user_id').val();
	var totalAmt = $("input.total-amt").val();
	
	if(user_id){	
	$.ajax({
	    url: base_url+'/website/add-to-cart',
	    type: 'POST',
	    dataType:'json',
	    cache: false,              
	    data: {'user_id':user_id,'data':data,'restro_id':restro_id,'totalAmt':totalAmt},
	    success: function(result)
	    {
	        console.log(result.status);
	    },
	    error: function(data)
	    {
	        
	    }
  	});
	}
}