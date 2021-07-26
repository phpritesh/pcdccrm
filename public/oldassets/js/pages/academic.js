$(function () {
	
	
	//List
	   $('#student_list_filter').on('change', function () {
            let class_id = $('select[name="class_id"]').val();
            let section_id = $(this).val();
            let urlLastPart = '';
                let ac_year = $('select[name="academic_year"]').val();
                if(ac_year){
                     urlLastPart ="&academic_year="+ac_year;
                }


            if(class_id && section_id){
                let getUrl = window.location.href.split('?')[0]+"?class="+class_id+"&section="+section_id+urlLastPart;
                window.location = getUrl;

            }

        });
	$('#student_list_section_filter').on('change', function () {
            $('.load-overlay').show();
            var class_id = $('select[name="class_id"]').val();
			var section_id = $(this).val();
			if ($('select[name="section_id"]').length ) {
				var getUrl = window.student_list_url + "?class=" + class_id+"&section="+section_id;
				window.location.href=getUrl;
			}
			
       });
	
	$("#entryForm").validate();


     $('#student_add_edit_class_change').on('change', function () {
            $('.load-overlay').show();
            var class_id = $(this).val();
			if ($('select[name="section_id"]').length ) {
				var getUrl = window.section_list_url + "?class=" + class_id;
				$.get(getUrl, '', function (res) {
					   $('select[name="section_id"]').empty().prepend('<option selected=""></option>').select2({placeholder: 'Pick a subject...', data: res});
						$('.load-overlay').hide();
			   });
			}
			
			if ($('select[name="fourth_subject"]').length ) {
				var getUrl = window.subject_list_url + "?class=" + class_id;
				$.get(getUrl, '', function (res) {
					   $('select[name="fourth_subject"]').empty().prepend('<option selected=""></option>').select2({placeholder: 'Pick a subject...', data: res});
						$('.load-overlay').hide();
			   });
			}

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
		 


  });