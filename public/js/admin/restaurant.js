$(function(){

	/*=====  AAAding & Birthday Clud =======*/
	$("input[name='birthday_club']").on('click',function(){
		if($(this).val()==1){
			$("input[name='bc_offer_type']").val(1);
			$(".birthday_club_offer").removeClass('d-none');
		}else{
			$("input[name='bc_offer_type']").val('');
			$(".birthday_club_offer").addClass('d-none');
		}
	});
	$("input[name='aaadining_club']").on('click',function(){
		if($(this).val()==1){
			$("input[name='ac_offer_type']").val(1);
			$(".aaading_club_offer").removeClass('d-none');
		}else{
			$("input[name='ac_offer_type']").val('');
			$(".aaading_club_offer").addClass('d-none');
		}
	});

	$("input[name='ac_max_discount']").on('change',function(){
		var val = $(this).val();
		$(".append-max-discount-price span").html('$'+val);
	});
	
});