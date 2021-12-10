$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});
	
	$("input[name='search']").on("keyup",function () {
		var thisData = $(this);
		var search = thisData.val();
		var sugg =  thisData.parent().find("ul.suggest");
		$("input[name='email']").val('');
		if(search.length >= 3){

		$.ajax({
	        url: base_url+'/admin/customer_detail/search',
	        type: 'POST',
	        dataType:'json',
	        cache: false,             
	        data: {'search':search},
	        success: function(result)
	        {
	          	sugg.addClass('d-none');
			    sugg.html('');
			    if(result.status){
			        var suggest = '';
			        $.each(result.data,function(key , val){
			        	suggest+= '<li class="setData list-group-item" data-usercode="'+val.user.user_code+'">'+val.user.name+'- '+val.user.user_code+'</li>';
			    	});
			        sugg.removeClass('d-none');
			        sugg.fadeIn(3000);
			        sugg.html(suggest);
			    }else{
			        sugg.removeClass('d-none');
			        sugg.fadeIn(3000);
			        sugg.html('<li class="list-group-item">No Data Found!</li>');
			    }
	        },
	        error: function(data)
	        {
	          
	        }
    	});

		}else{
	         sugg.addClass('d-none');
		}

	});
});

$(document).on("click",".setData",function () {
	$("input[name='search']").val($(this).text());
	$("input[name='usercode']").val($(this).attr("data-usercode"));
	$(".suggest").addClass("d-none");
});