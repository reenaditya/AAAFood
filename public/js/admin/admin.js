$(function() {
	
	$.ajaxSetup({
	   headers: {
	     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	   }
	});

	$("button.change-delivery-boy-status").on("click",function () {
		var user_id = $(this).attr("data-userid");
		
		if (user_id) {
			Swal.fire({
			  	title: 'Are you sure?',
			  	text: "You can change this in future!",
			  	icon: 'warning',
			  	showCancelButton: true,
			  	confirmButtonColor: '#3085d6',
			  	cancelButtonColor: '#d33',
			  	confirmButtonText: 'Yes, Change it !'
			}).then((result) => {
			  if (result.isConfirmed) {

			  	$.ajax({
			        url: base_url+'/admin/user/change-delivery-boy-status',
			        type: 'POST',
			        dataType:'json',
			        cache: false,             
			        data: {'user_id':user_id},
			        success: function(result)
			        {
			          	if (result.status) {
			            	 Swal.fire({
			            	 	title: 'Good job!',
							  	text: "Status changed successfully!",
							  	icon: 'success',
							}).then((result) => {
			  					if (result.isConfirmed) {		
			            			window.location.reload();
			  					}
			  				});
			        	}
			        	else{
				            Swal.fire({
			            	 	title: 'Sorry!',
							  	text: "Something went wrong!",
							  	icon: 'error',
							});
							window.location.reload();
			        	}

			        },
			        error: function(data)
			        {
			            Swal.fire({
		            	 	title: 'Sorry!',
						  	text: "Something went wrong!",
						  	icon: 'error',
						});
			        }
		    	});

			  }else{
			  	window.location.reload();
			  }
			});
		}
	});


	$("button.delivery-verify-email").on("click",function () {
		var user_id = $(this).attr("data-userid");
		
		if (user_id) {
			  	
			  	$.ajax({
			        url: base_url+'/admin/user/delivery-boy-verify-email',
			        type: 'POST',
			        dataType:'json',
			        cache: false,             
			        data: {'user_id':user_id},
			        success: function(result)
			        {
			          	if (result.status) {
			            	 Swal.fire({
			            	 	title: 'Verify your Email!',
							  	text: "Link send to your email address!",
							  	icon: 'success',
							}).then((result) => {
			  					if (result.isConfirmed) {		
			            			window.location.reload();
			  					}
			  				});
			        	}
			        	else{
				            Swal.fire({
			            	 	title: 'Sorry!',
							  	text: "Something went wrong!",
							  	icon: 'error',
							}).then((result) => {
			  					if (result.isConfirmed) {		
			            			window.location.reload();
			  					}
			  				});
			        	}

			        },
			        error: function(data)
			        {
			            Swal.fire({
		            	 	title: 'Sorry!',
						  	text: "Something went wrong!",
						  	icon: 'error',
						});
			        }
		    	});

		}
	});

});