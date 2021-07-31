/*$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	$("select[name='restaurant_id']").on("change",function () {
		
		var restaurant_id = $(this).val();
		var thisData = $(this);
		$.ajax({
	        url: base_url+'/admin/menu-item/menugroup',
	        type: 'POST',
	        dataType:'json',
	        cache: false,             
	        data: {'restaurant_id':restaurant_id},
	        success: function(result)
	        {
	          	var sugg =  thisData.parent().parent().find("select.menu_group_id");
	          	sugg.html('<option value="">Select</option>');
	        	if (result.status) {
	            	var suggest = '';
	            
	            	$.each(result.data.menugroup,function(key , val){
	              	suggest+= '<option value="'+val.id+'">'+val.name+'</option>';
	            	});

	            	sugg.html(suggest);
	        	}
	        	else{
	            	sugg.html('<option value="">Select</option>');
	        	}
	        },
	        error: function(data)
	        {
	          
	        }
    	});
	});
});*/