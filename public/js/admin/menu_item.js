$(function() {
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	$("select[name='menu_group_id']").on("change",function () {
		
		var menu_group_id = $(this).val();
		$.ajax({
	        url: base_url+'/admin/menu-item/menu-group-quantity',
	        type: 'POST',
	        dataType:'json',
	        cache: false,             
	        data: {'menu_group_id':menu_group_id},
	        success: function(result)
	        {
	          	$(".append-menu-group-quantity").html('');
	        	if (result.status) {
	            	var suggest = '';
	            	console.log(result.data);
	            	$.each(result.data,function(key , val){
	              	suggest+= '<div class="mb-4 col-md-4"><input type="hidden" name="mqg_id[]" value="'+val.id+'"><label class="form-label">'+val.name+' price</label><input type="number" name="price[]" class="form-control"></div>';
	            	});
	          		$(".append-menu-group-quantity").html(suggest);
	        	}
	        	else{
	          		$(".append-menu-group-quantity").html('');
	        	}
	        },
	        error: function(data)
	        {
	          
	        }
    	});
	});
});