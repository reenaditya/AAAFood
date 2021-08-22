$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	$(".add-wish-list").on("click",function () {
		var auth = $(".check-auth-id").val();
		if (auth) {
			
		}else{
			location.href = base_url+'/login';
		}
	});
});