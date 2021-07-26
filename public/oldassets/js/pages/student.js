$(function () {
	
	//List student

  
	
	$("#entryForm").validate();

    
	   $(document).on('change','#add-course-id', function () {
            $('.load-overlay').show();
            var course_id = $(this).val();
				var getUrl = $(this).attr('data-url')+ "?course=" + course_id;
				$.get(getUrl, '', function (res) {
					$('#add-edit-subjectlist').html('');
					if ( res.length == 0 ) {
						$('#add-edit-subjectlist').append('<label>No subject found in selected course</label>');
					}else{
					$.each(res, function(i, item){
						$('#add-edit-subjectlist').append('<div class="checkbox"><label><input  name="subjects[]" required=""  type="checkbox" value="'+item.id+'"> '+item.name+'</label></div>');
					});
					}
					$('.load-overlay').hide();
			   });
       });
	   
	   if ($('#state_city_class_change').length ) {
	    $('#state_city_class_change').on('change', function () {
            $('.load-overlay').show();
			 var state_id = $(this).val();
				var getUrl = window.city_list_url + "?state=" + state_id;
				$.get(getUrl, '', function (res) {
					   $('select[name="city"]').empty().prepend('<option selected=""></option>').select2({placeholder: 'Pick City...', data: res});
						$('.load-overlay').hide();
			   });
	
       });
	}
		 

  // Attach Course
	$(document).on('click', '.add-course', function () {
			var th = $(this);
			$('.load-overlay').show();
			$('#modal-placeholder').html('');
			$('#modal-placeholder').load(th.attr('data-url'), '', function () {
				$('.load-overlay').hide();
				$("#horizonatal-modal").modal();
				
				$("#month_from").datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				onClose: function (selectedDate) {
					if (selectedDate.length != 0) {
					$("#month_to").datepicker("option", "minDate", selectedDate);
					}
				}
				});
				
				$("#month_to").datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true,
				changeYear: true,
				onClose: function (selectedDate) {
					$("#month_from").datepicker("option", "maxDate", selectedDate);
				}
				});
	
				$("#store-course").validate({
					submitHandler: function (form) {
						var btn = $('#submit-trigger').loading('set');
						$.ajax({
						url: $('#store-course').attr('action'),
						dataType: "json",
						type: "POST",
						data: new FormData($('#store-course')[0]),
						contentType: false,
						cache: false,
						processData: false,
						success: function (d) {
			             if(d.status =='success'){
							$.alert({title: '', content: d.msg, confirm: function () {
								window.location.reload();
							}});
						 }else{
							 $.alert({title: 'Oops!', content: 'Something going wrong', confirm: function () {
								window.location.reload();
							}});
						 }
						}
						}).always(function () {
						  btn.loading('reset');
						});
						return false;
					}
				});
			});
	 });
	 
	 
	 
	 
	 
	 
  // Attach Course
	$(document).on('click', '.generage-fee', function () {
			var th = $(this);
			$('.load-overlay').show();
			$('#modal-placeholder').html('');
			$('#modal-placeholder').load(th.attr('data-url'), '', function () {
				$('.load-overlay').hide();
				$("#horizonatal-modal").modal();
				
	$(document).on('click', '#add_new_field', function () {
		var th = $(this);
		var rowcount = parseInt(th.attr('data-count'))+1;
		th.closest('thead').prev('tbody').append('<tr><td ><input type="text" class="form-control" required="required" name="extra_fee['+rowcount+'][desc]" label-name="Fee Name" placeholder="Fee Name"></td><td ><input type="text"  class="form-control" required="required" name="extra_fee['+rowcount+'][amount]" label-name="Amount" placeholder="Amount"></td><td ><a class="add_more_content_remove pull-right" tag-type="td" href="javascript:void(0)"><i class="fa fa-times"></i></a></td></tr>');
		th.attr('data-count',rowcount);
    });

	$(document).on('focus', '.payment_date', function () {
		$(this).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat: 'dd-mm-yy'
		});
	});
	
			$("#update_payment").validate({
			rules: {
				 "amount": {currency: true},
			},
			submitHandler: function (form) {
			    var btn = $('.payment-button').loading('set');
			    $.ajax({
				url: $('#update_payment').attr('action'),
				dataType: "json",
				type: "POST",
				data: new FormData($('#update_payment')[0]),
				contentType: false,
				cache: false,
				processData: false,
				success: function (d) {
				    if (d.status == 'success') {
					window.location.href = '';
				    }
				}
			    }).always(function () {
				btn.loading('reset');
			    });
			}
		    });
			});
	 });
	 
	 
	 // Attach Course
	$(document).on('click', '.view-invoice', function () {
			var th = $(this);
			$('.load-overlay').show();
			$('#modal-placeholder').html('');
			$('#modal-placeholder').load(th.attr('data-url'), '', function () {
				$('.load-overlay').hide();
				$("#horizonatal-modal").modal();
				
				$(document).on('focus', '.payment_date', function () {
					$(this).datepicker({
						changeMonth: true,
						changeYear: true,
						dateFormat: 'dd-mm-yy'
					});
				});
	
			$("#update_payment").validate({
			rules: {
				 "amount": {currency: true},
			},
			submitHandler: function (form) {
			    var btn = $('.payment-button').loading('set');
			    $.ajax({
				url: $('#update_payment').attr('action'),
				dataType: "json",
				type: "POST",
				data: new FormData($('#update_payment')[0]),
				contentType: false,
				cache: false,
				processData: false,
				success: function (d) {
				    if (d.status == 'success') {
					window.location.href = '';
				    }
				}
			    }).always(function () {
				btn.loading('reset');
			    });
			}
		    });
			});
	 });
	 
	 
	 
	
	$(document).on('click', '.add_more_content_remove', function () {
		if ($(this).attr('tag-type') == 'td') {
			$(this).parent().parent('tr').remove();
		} else {
			$(this).parent('div').remove()
		}
    });


  });