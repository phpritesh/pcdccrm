$(function () {
	
	$(document).on('click', '.create-designation', function () {
		var th = $(this);
		$('.load-overlay').show();
		$('#modal-placeholder').html('');
		$('#modal-placeholder').load(th.attr('data-url'), '', function () {
			$('.load-overlay').hide();
			$("#horizonatal-modal").modal();
			$("#create-designation").validate({
				submitHandler: function (form) {
					var btn = $('#submit-trigger').loading('set');
					$.ajax({
					url: $('#create-designation').attr('action'),
					dataType: "json",
					type: "POST",
					data: new FormData($('#create-designation')[0]),
					contentType: false,
					cache: false,
					processData: false,
					success: function (d) {
						$.alert({title: '', content: d.msg, confirm: function () {
							window.location.reload();
						}});
					}
					}).always(function () {
					  btn.loading('reset');
					});
					return false;
				}
			});
		});
    });
	
	
	
	$("#social-activity-search-form").validate();
	$("#twitter-tag-search-form").validate();
	

  });