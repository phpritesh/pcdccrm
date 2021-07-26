import Generic from "../Generic";

export default class Crmdata {
    /**
     * academic related codes
     */
    static iclassInit() {
        Generic.initCommonPageJS();
        Generic.initDeleteDialog();
    }
   
   


    static Init() {

           $("#import-crmdata").validate({
        submitHandler: function submitHandler(form) {
          var btn = $('.submit-button').loading('set');
          $.ajax({
            url: $('#import-crmdata').attr('action'),
            dataType: "json",
            type: "POST",
            data: new FormData($('#import-crmdata')[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function success(d) {
              if (d.status == 'success') {
                swal("", d.msg, "success").then(function (value) {
                  window.location.href = d.uri;
                });
              }
            }
          }).fail(function (xhr, status, error) {
            var errorMsg = xhr.status + ': ' + xhr.statusText;
            toastr.error(errorMsg);
            btn.loading('reset');
          });
        }
      });
      $(document).on('click', '.delete-import', function () {
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
        }).then(function (result) {
          if (result.value) {
            axios.get(geturl).then(function (response) {
              if (response.data.status == 'success') {
                swal("", response.data.msg, "success").then(function (value) {
                  window.location.href = "";
                });
              }
            })["catch"](function (error) {
              var status = error.response.statusText;
              toastr.error(status);
              btn.loading('reset');
            });
          } else {
            btn.loading('reset');
          }
        });
      });
      $(document).on('click', '.delete-crmdata', function () {
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
        }).then(function (result) {
          if (result.value) {
            axios.get(geturl).then(function (response) {
              if (response.data.status == 'success') {
                swal("", response.data.msg, "success").then(function (value) {
                  window.location.href = "";
                });
              }
            })["catch"](function (error) {
              var status = error.response.statusText;
              toastr.error(status);
              btn.loading('reset');
            });
          } else {
            btn.loading('reset');
          }
        });
      });
      $("#add-crmdata").validate({
        submitHandler: function submitHandler(form) {
          var btn = $('.submit-button').loading('set');
          $.ajax({
            url: $('#add-crmdata').attr('action'),
            dataType: "json",
            type: "POST",
            data: new FormData($('#add-crmdata')[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function success(d) {
              if (d.status == 'success') {
                swal("", d.msg, "success").then(function (value) {
                  window.location.href = d.uri;
                });
              }
            }
          }).fail(function (xhr, status, error) {
            var errorMsg = xhr.status + ': ' + xhr.responseText;
            toastr.error(errorMsg);
            btn.loading('reset');
          });
        }
      });
      $("#update-crmdata").validate({
        submitHandler: function submitHandler(form) {
          var btn = $('.submit-button').loading('set');
          $.ajax({
            url: $('#update-crmdata').attr('action'),
            dataType: "json",
            type: "POST",
            data: new FormData($('#update-crmdata')[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function success(d) {
              if (d.status == 'success') {
                swal("", d.msg, "success").then(function (value) {
                  window.location.href = d.uri;
                });
              }
            }
          }).fail(function (xhr, status, error) {
            var errorMsg = xhr.status + ': ' + xhr.responseText;
            toastr.error(errorMsg);
            btn.loading('reset');
          });
        }
      });
	  
	   $('input.tableCheckedAll').on('click', function (event) {
                var chkToggle;
                $(this).is(':checked') ? chkToggle = "check" : chkToggle = "uncheck";
                var table = $(event.target).closest('table');
                $('td input:checkbox:not(.tableCheckedAll)',table).iCheck(chkToggle);
            });
			
	  

	}
	
	
	


  

}