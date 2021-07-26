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
             });;
                  }
                }
              }).fail(function(xhr, status, error) {
					  var errorMsg = xhr.status + ': ' + xhr.statusText
					  toastr.error(errorMsg);
                      btn.loading('reset');
				});
            }
          });
        });
      });
	  
	  
	   $(document).on('click', '.delete-industry', function () {
		   var btn = $(this).loading('set');
		  var geturl = $(this).attr('data-url');
		  	swal.fire({
			  title: 'Are you sure?',
			  text: "delete this record!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
            axios.get(geturl)
                .then((response) => {
                   if (response.data.status == 'success') {
                   swal("", response.data.msg, "success").then((value) => {
                    window.location.href="";
                  });
                  }
                    Generic.loaderStop();
                }).catch((error) => {
                let status = error.response.statusText;
                toastr.error(status);
               btn.loading('reset');
            });
	   }else{
				   btn.loading('reset');
			}
	  });
	  
	  });

	}
	
	
	static subIndustryInit() {
      // Attach Course
$(document).on('click', '.new-subindustry', function () {
        var th = $(this);
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        $('#modal-placeholder').load(th.attr('data-url'), '', function () {
          $('.load-overlay').hide();
          $("#horizonatal-modal").modal();
          $("#add-subindustry").validate({
            submitHandler: function submitHandler(form) {
              var btn = $('.submit-button').loading('set');
              $.ajax({
                url: $('#add-subindustry').attr('action'),
                dataType: "json",
                type: "POST",
                data: new FormData($('#add-subindustry')[0]),
                contentType: false,
                cache: false,
                processData: false,
                success: function success(d) {
                  if (d.status == 'success') {
                   swal("", d.msg, "success").then((value) => {
                  window.location.href="";
             });;
                  }
                }
              }).fail(function(xhr, status, error) {
					  var errorMsg = xhr.status + ': ' + xhr.statusText
					  toastr.error(errorMsg);
                      btn.loading('reset');
				});
            }
          });
        });
      });
	  
	  
	   $(document).on('click', '.delete-subindustry', function () {
		   var btn = $(this).loading('set');
		  var geturl = $(this).attr('data-url');
		  swal.fire({
			  title: 'Are you sure?',
			  text: "delete this record!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
            axios.get(geturl)
                .then((response) => {
                   if (response.data.status == 'success') {
                   swal("", response.data.msg, "success").then((value) => {
                    window.location.href="";
                  });
                  }
                    Generic.loaderStop();
                }).catch((error) => {
                let status = error.response.statusText;
                toastr.error(status);
               btn.loading('reset');
            });
	   }else{
				   btn.loading('reset');
			}
	  });
	  });

	}
	
	
	static incomeGroupInit() {
      // Attach Course
$(document).on('click', '.new-incomegroup', function () {
        var th = $(this);
        $('.load-overlay').show();
        $('#modal-placeholder').html('');
        $('#modal-placeholder').load(th.attr('data-url'), '', function () {
          $('.load-overlay').hide();
          $("#horizonatal-modal").modal();
          $("#add-incomegroup").validate({
            submitHandler: function submitHandler(form) {
              var btn = $('.submit-button').loading('set');
              $.ajax({
                url: $('#add-incomegroup').attr('action'),
                dataType: "json",
                type: "POST",
                data: new FormData($('#add-incomegroup')[0]),
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
              }).fail(function(xhr, status, error) {
					  var errorMsg = xhr.status + ': ' + xhr.statusText
					  toastr.error(errorMsg);
                      btn.loading('reset');
				});
            }
          });
        });
      });
	  
	  
	   $(document).on('click', '.delete-incomegroup', function () {
		   var btn = $(this).loading('set');
		  var geturl = $(this).attr('data-url');
		  	swal.fire({
			  title: 'Are you sure?',
			  text: "delete this record!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
			  if (result.value) {
            axios.get(geturl)
                .then((response) => {
                   if (response.data.status == 'success') {
                   swal("", response.data.msg, "success").then((value) => {
                    window.location.href="";
                  });
                  }
                    Generic.loaderStop();
                }).catch((error) => {
                let status = error.response.statusText;
                toastr.error(status);
               btn.loading('reset');
            });
	   }else{
				   btn.loading('reset');
			}
	  });
	  });

	}


  

}