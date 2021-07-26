import Generic from "../Generic";

export default class Masters {
    /**
     * academic related codes
     */
    static iclassInit() {
        Generic.initCommonPageJS();
        Generic.initDeleteDialog();
    }
   
   


    static industryInit() {
      // Attach Course
$(document).on('click', '.new-industry', function () {
        var th = $(this);
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        $('#modal-placeholder').load(th.attr('data-url'), '', function () {
          $('.load-overlay').hide();
          $("#horizonatal-modal").modal();
          $("#add-industry").validate({
            submitHandler: function submitHandler(form) {
              var btn = $('.submit-button').loading('set');
              $.ajax({
                url: $('#add-industry').attr('action'),
                dataType: "json",
                type: "POST",
                data: new FormData($('#add-industry')[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function success(d) {
                  if (d.status == 'success') {
                   swal("", d.msg, "success").then((value) => {
                  window.location.href="";
                  });
                  }
                }
              }).always(function () {
                btn.loading('reset');
              });
            }
          });
        });
      });
	  
	  $(document).on('click', '.delete-industry', function () {
		   Generic.loaderStart();
		  var geturl = $(this).attr('data-url');
            axios.get(geturl)
                .then((response) => {
                   if (response.status == 'success') {
                   swal("", response.msg, "success").then((value) => {
                    window.location.href="";
                  });
                  }
                    Generic.loaderStop();
                }).catch((error) => {
                let status = error.response.statusText;
                toastr.error(status);
                Generic.loaderStop();
            });
	  });
	  
	  

        $('#tabAttendance').click(function () {
            let id = $(this).attr('data-pk');
            let geturl = window.attendanceUrl + '?student_id=' + id;
            Generic.loaderStart();
            $('#attendanceTable tbody').empty();
            axios.get(geturl)
                .then((response) => {
                    // console.log(response);
                    if (response.data.length) {
                        response.data.forEach(function (item) {
                            let color = item.present == "Present" ? 'bg-green' : 'bg-red';
                            let trrow = ' <tr>\n' +
                                '  <td class="text-center">' + item.attendance_date + '</td>\n' +
                                '  <td class="text-center"> <span class="badge ' + color + '">' + item.present + '</span></td>\n' +
                                '</tr>';

                            $('#attendanceTable tbody').append(trrow);
                        });
                    }

                    Generic.loaderStop();
                }).catch((error) => {
                let status = error.response.statusText;
                toastr.error(status);
                Generic.loaderStop();
            });
        });

	}


  

}