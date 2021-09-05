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


/* 
* Search restaurant from home 
*/
$(document).on("keyup","input.search11",function () {
	var value = $(this).val();
	var thisData = $(this);
	$(".submit11").val('Search');
	$("ul.suggest").addClass('d-none');
	$("ul.suggest").html('');
	if (value.length >= 3) {
		
		$(".submit11").val('Wait..');
		$.ajax({
		    url: base_url+'/search/suggetion/list',
		    type: 'POST',
		    dataType:'json',
		    cache: false,              
		    data: {'value':value},
		    success: function(result)
		    {
		     	var sugg =  thisData.parent().find("ul.suggest");
			    sugg.addClass('d-none');
			      sugg.html('');
			      if(result.status){
			        var suggest = '';
			        $.each(result.data,function(key , val){
			        	suggest+= '<li class="setData list-group-item" data-type="'+result.type+'" data-slug="'+val.slug+'">'+val.name+'</li>';
			        });
			        sugg.removeClass('d-none');
			        sugg.fadeIn(3000);
			        sugg.html(suggest);
						$(".submit11").val('Search');
			      }else{
			        sugg.removeClass('d-none');
			        sugg.fadeIn(3000);
			        sugg.html('<li class="list-group-item">No Data Found!</li>');
			        $(".submit11").val('Search');
			      }
		    },
		    error: function(data)
		    {
		        
		    }
	  	});

	}else{
		
	}
});


$(document).on("click",".setData", function(){
  
  var name = $(this).text();

  var thisData = $(this).parent().parent();

  var slug = $(this).attr('data-slug');

  var type = $(this).attr('data-type');

  $("input[name='slug']").val(slug);

  $("input[name='type']").val(type);

  thisData.find("input.submit11");

  thisData.find("input.search11").val(name);
  
  var sugg =  thisData.find("ul.suggest");
  sugg.addClass('d-none');
  sugg.html('');

});
