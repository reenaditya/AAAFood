$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	productDetails();	
	deliveryType();
	activepayOnAcc();

});

function productDetails() {
	var subTotal = 0.00;

	var prod = JSON.parse(localStorage.getItem('products'));
	
	if (prod && prod.length >=1) 
	{
		$.each(prod,function(key , val)
		{
          	subTotal = subTotal+val.price;
        	
        });
        totalDiscount();
        calculateDeliveryFees(subTotal);
        calculateFeestaxes(subTotal);
        getTotalAmount(subTotal);
        getAllItems();
	}
}

function getAllItems() {
	var prod = JSON.parse(localStorage.getItem('products'));
	if (prod && prod.length >=1) {
		var suggest = '';
		$.each(prod,function(key , val){
          	suggest+= '<input type="hidden" name="items['+key+'][id]" value="'+val.id+'"><input type="hidden" name="items['+key+'][unit]" value="'+val.count+'"><input type="hidden" name="items['+key+'][price]" value="'+val.price+'"><input type="hidden" name="items['+key+'][quantity]" value="'+val.qunt+'">';
        });
        $("div.add-items").html(suggest);
	}

}

function calculateDeliveryFees(subTotal) {
	
	if (localStorage.getItem('delivery_fee') === null) {
		$("span.shiping-charge").text("$0.00");
		$("input[name='shiping']").val('');
	}else{
		$("span.shiping-charge").text('$'+localStorage.getItem('delivery_fee'));
		$("input[name='shiping']").val(localStorage.getItem('delivery_fee'));
	}	
}

function calculateFeestaxes(subTotal) {
	if (localStorage.getItem('tax_amount')===null) {
		$("span.tax-amount").text('$0.00');
		$("input[name='tax']").val('');
	}else{
		$("span.tax-amount").text('$'+localStorage.getItem('tax_amount'));
		$("input[name='tax']").val(localStorage.getItem('tax_amount'));
	}	
}

function getTotalAmount(subTotal) {
	if (localStorage.getItem('total_amt')===null) {
		$("span.sub-total").text('$0.00');
	    $("span.pay-total").text('$0.00');
		$("input[name='sub_total']").val('');
		$("input[name='grand_total']").val('');
	}else{
		$("span.sub-total").text('$'+subTotal);
	    $("span.pay-total").text('$'+localStorage.getItem('total_amt'));
		$("input[name='sub_total']").val(subTotal);
	    $("input[name='grand_total']").val(localStorage.getItem('total_amt'));
	}
}
/*

$(document).on("click",".proceedcheckout-btn",function () {
	$(".cart-totals").addClass('d-none');
	$(".payment-box").removeClass('d-none');
});*/



$(document).on("change","input[name='radio_group']",function () {
	var value = $(this).val();
	$("button.place-order-btn").attr('type','submit');

	if (value=='stripe') 
	{
		$(".card-details").removeClass('d-none');
	}
	else if(value=='cod')
	{
		$(".card-details").addClass('d-none');
	}
	else if(value=='poa')
	{
		$(".card-details").addClass('d-none');
	}
	else
	{
		$("button.place-order-btn").attr('type','button');
	}

});

function deliveryType() {
	var deliveryType = localStorage.getItem('delivery_type');
	$("input[name='delivery_type']").val(deliveryType);
	  
	if (deliveryType==1) {
		$(".other-biling-det").show();
	}
	if (deliveryType==2 || deliveryType==3) {
		$(".other-biling-det").hide();
		deliveryTypeIsPickup();
	}
}

function totalDiscount() {
	var membershipDiscount = localStorage.getItem('ac_max_discount');
	var total = membershipDiscount;
	$(".total-discount").text('-$'+total);
	$("input[name='total_discount']").val(total);
}

function deliveryTypeIsPickup() {
	$("div.card-details").removeClass('d-none');
	$("#card").attr("checked",true);
	$("#cash-on-delivery").parent().addClass('d-none');
	$("button.place-order-btn").attr('type','submit');
}

function activepayOnAcc() {
	
	if (aaadininngMember) {
        $("#poa").attr("disabled",false);
    }else{
        $("#poa").attr("disabled",true);
    }
}