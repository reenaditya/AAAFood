$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	$(".add-wish-list").on("click",function () {
		var auth = $(".check-auth-id").val();
		if (auth) {
			var user_id = $("input.user-id").val();
			var restro_id = $(this).parent().find("input.restaurant-id").val();
			var type = "RESTRO";
			$.ajax({
			    url: base_url+'/website/add-wish-list',
			    type: 'POST',
			    dataType:'json',
			    cache: false,              
			    data: {'user_id':user_id,'restro_id':restro_id,'type':type},
			    success: function(result)
			    {
			        console.log(result.status);
			    },
			    error: function(data)
			    {
			        
			    }
		  	});
		}else{
			location.href = base_url+'/login';
		}
	});
});