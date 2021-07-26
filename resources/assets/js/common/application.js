$(function () {
    'use strict'
/**
     * Fetch User unread notifications
     */
    function fetchNotifications() {

            //call notification in every 5 minutes
            //so check it and call the api
            var oldTime = localStorage.getItem('notiCallTime');
            var fetchNotificaton = true;

            if(typeof (oldTime) !== 'undefined') {
                var timeDiff = parseInt((new Date() - new Date(oldTime))/1000/60);
                // console.log(timeDiff);
                if(timeDiff <= 5){
                    fetchNotificaton = false;
                }
            }

            if(fetchNotificaton){
                $.ajax({
                    url: '/lms/public/notification/unread?limit=5',
                    success: function (response) {
                        localStorage.setItem('notiCallTime', new Date());
                        localStorage.setItem('notifications', JSON.stringify(response));
                        renderNotification();
                    }
                });
            }
            else{
                renderNotification();
            }


    }
    
    function renderNotification() {
        var notifications = (localStorage.getItem('notifications')) ? JSON.parse(localStorage.getItem('notifications')) : [];
        // console.log(notifications);
        $('.notificaton_header').text('You have '+notifications.length+' recent notifications');
        $('.notification_badge').text(notifications.length);
        $('ul.notification_top').empty();
        var notiIcon = "fa-times-circle text-danger";
        notifications.forEach(function(notification, index){
            switch (notification.type){
                case "info":
                    notiIcon = "fa-info-circle text-info";
                    break;
                case "warning":
                    notiIcon = "fa-warning text-warning";
                    break;
                case "success":
                    notiIcon = "fa-check-circle text-success";
                    break;
                default:
                    break;
            }

            var li = '<li>\n' +
                '<a href="#">\n' +
                '    <div class="pull-left">\n'+
                '    <i class="fa '+ notiIcon +'"></i>\n' +
                '</div>\n' +
                '    <h4 class="notification_title">'+ notification.message +'</h4>\n' +
                '   <p><small class="pull-right"><i class="fa fa-clock-o"></i> '+ notification.created_at +'</small></p>\n' +
                '</a>\n' +
                '</li>';
            $('ul.notification_top').append(li);
        })
    }

    fetchNotifications();
});

$(function () {

$.validator.setDefaults({
    errorElement: 'span',
    errorPlacement: function (error, element) {
	element.parent('').addClass('has-error');
	(element.parent('.input-group').length) ? error.insertAfter(element.parent()) : ((((element.parent().parent('.in-radio').length)) || ((element.parent().parent('.checkbox').length))) ? error.insertAfter(element.parent().parent().parent()) : ((element.parent().parent().parent('.in-radio2').length) ? error.insertAfter(element.parent().parent().parent()) : error.insertAfter(element)));
    },
    unhighlight: function (element) {
	$(element).parent().removeClass('has-error').addClass('has-success');
	$(element).removeClass('error').addClass('success');
    }
});

$.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
}, "Only letters and numbers allowed");

$.validator.addMethod("currency", function (value, element) {
    return this.optional(element) || /^\d{0,8}(\.\d{0,2})?$/.test(value);
}, "Please specify a valid amount");

$.validator.addMethod("noSpace", function (value, element) {
    return (value.indexOf(" ") < 0) ? true : false;
}, "Space are not allowed");

$.validator.addMethod("sizeCheck", function (value, element, size) {
    var result = true;
    var files = element.files;
    var size_byte = 1048576 * parseFloat(size);
    for (var i = 0; i < files.length; i++) {
	var file = files[i];
	if (file.size > size_byte) {
	    result = false;
	}
    }
    return result;
}, 'File Size must be less than fixed size');

$.validator.addMethod("phoneNumber", function (value, element) {
    return this.optional(element) || /^([0-9-+]{10,15})+$/.test(value);
}, 'Not a valid Phone Number');

$.validator.addMethod("alphabets", function (value, element) {
    return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
}, 'Please enter only alphabets');

$.validator.addMethod("email", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9_.-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
}, 'Please enter a valid email address');

$.validator.addMethod("required", function (value, element) {
    var result = true;
    if (!$.trim(value)) {
	var enter = ($(element).get(0).tagName == 'SELECT') ? 'select' : ($(element).attr('type') == 'file') ? 'upload' : 'enter';
	result = false;
	var label_name = ($(element).attr('label-name')) ? $(element).attr('label-name') : 'field';
	if (label_name != 'field')
	    $.validator.messages.required = "Please " + enter + ' ' + label_name;
	else
	    $.validator.messages.required = "Please " + enter + " in this field";
    } else
	result = true;
    return result;
});

$.validator.addMethod("mobile", function (value, element) {
    return this.optional(element) || /^([0-9]{10})+$/.test(value);
}, 'Please enter 10 digit mobile number');

$.validator.addMethod("validDewiId", function (value, element) {
    return this.optional(element) || /^([0-9]{10})+$/.test(value);
}, 'Please enter valid DEWI-ID');

$.validator.addMethod("urlChars", function (value, element) {
    return this.optional(element) || /^[a-zA-Z0-9_]+$/.test(value);
}, "Only letters,numbers and and underscores allowed");

$.validator.addMethod("dateFormat", function (value, element) { //dd-mmm-YYYY, dd/mmm/YYYY, dd.mmm.YYYY 
    return this.optional(element) || /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/.test(value);
}, "Please enter a date in the format dd/mm/yyyy.");

var uniq_xhr = null;
$.validator.addMethod("uniqueCheck", function (value, element, wh) {
    if (uniq_xhr != null) {
	uniq_xhr.abort();
	uniq_xhr = null;
    }
    var dbid = ($(element).attr('data-dbid')) ? $(element).attr('data-dbid') : '';
    var data_coll = $(element).attr('data-coll');
    var r = true;
    if (value != '') {
	var d = {coll: data_coll, key: wh, val: value, dbid: dbid};
	$(element).after('<span class="checking"></span>');
	uniq_xhr = $.ajax({
	    type: "GET", async: false, url: base_url + 'xhr/unique_check', data: d,
	    success: function (o) {
		r = (o == 'e') ? false : true;
	    }
	}).done(function () {
	    $(element).parent().children('.checking').remove();
	});
    }
    return r;
}, 'this is already registered with us');

$.validator.addClassRules("alphabets", {alphabets: true});
$.validator.addClassRules("phoneNumber", {phoneNumber: true});
$.validator.addClassRules("currency", {currency: true});



$(document).on('keyup', '.onlyNumeric', function () {
    if (/\D/g.test(this.value))
	this.value = this.value.replace(/\D/g, "")
});

var text = '';
$.fn.loading = function (r) {
    var d = 'disabled';
    var th = $(this);
    if (r == 'set') {
	text = th.html();
	th.prop(d, d).addClass(d).html(text + ' <i class="fa fa-spinner fa-spin"></i>');
	return th;
    } else if (r == 'reset')
	th.prop(d, false).removeClass(d).html(text);
};

/*view_uploaded_img Strat  */
function view_uploaded_img(t) {
    if ($(t).parent().children().is('div.show_images')) {
	$(t).parent().children('.show_images').html('');
    } else {
	$(t).after('<div class="show_images"></div>');
    }
    var files = t.files;
    for (var i = 0; i < files.length; i++) {
	var file = files[i];
	var imageType = /image.*/;
	if (!file.type.match(imageType)) {
	    continue;
	}
	var imgId = 'show_img_' + Math.random() + i;
	$(t).parent().children('.show_images').append('<img id="' + imgId + '" src="">');
	var img = document.getElementById(imgId);
	img.file = file;
	var reader = new FileReader();
	reader.onload = (function (aImg) {
	    return function (e) {
		aImg.src = e.target.result;
	    };
	})(img);
	reader.readAsDataURL(file);
    }
}
$(document).on('change', '.view_photo', function () {
    view_uploaded_img(this);
});
/*view_uploaded_img End  */

/**
 * 
 * 
 * To Open Image or PDF In POP Up 
 * 
 * <img height="100" data-title="Data Title" data-content="<?= htmlspecialchars('<table class=""><thead><tr><th style="width:3%">#</th><th style="width:25%">Flats</th><th style="width:20%">User\'s Info</th><th style="width:12%">Status</th><th style="width:60%">Action</th></tr></thead></table>') ?>" class="zoom_in" src="http://192.168.1.81/dewi/dewi-app/upload_form/_1475586824doga.jpg">
 * 
 * 
 <img height="100" class="zoom_in" data-ext='pdf' data-content="<?= htmlspecialchars($a) ?>"  data-src='http://www.tutorialspoint.com/php/php_tutorial.pdf' src="http://192.168.1.81/dewi/dewi-app/upload_form/_1475586824doga.jpg">
 * 
 */
$(document).on('click', '.zoom_in', function () {
    var th = $(this);
    var html = '';
    if (th.attr('data-title'))
	var title = (th.attr('data-title')) ? th.attr('data-title') : null;

    (title) ? $('#zoom_loadModal .modal-header h4').show().text(title) : $('#zoom_loadModal .modal-header h4').hide();
    $('#zoom_loadModal .modal-body .zoom_content').remove();
    if (th.attr('data-content')) {
	html += '<div class="zoom_content p10">' + th.attr('data-content') + '</div>';
    }
    var path = (th.attr('data-src')) ? th.attr('data-src') : th.attr('src');

    if (th.attr('data-ext') == 'pdf') {
	html += '<object data="' + path + '" type="application/pdf" width="100%" height="499"></object>';
    } else {
	html += '<img class="img-responsive" src="' + path + '">';
    }
    $('#zoom_loadModal .modal-body').css('padding', '0px').html(html);
    $('#zoom_loadModal').modal({
//	keyboard: false,
//	backdrop: 'static'
    });
});


if ($('.dataTable').length)
    $('.dataTable').DataTable();

if ($('.confirm_a').length)
    $('.confirm_a').confirm();



if ($('.date_picker').length) {
    /**
     * data-max_date Format :: YYYY,MM,DD  || number  :::: Ex : 2016,09,19  ::or:: 5
     * data-min_date Format :: YYYY,MM,DD  || number  :::: Ex : 2016,09,19 ::or:: 6
     * data-date_format :: dd/mm/yy  this format will be the js date format
     * 
     * Example :- 
     * <input type="text" data-max_date="2011,10,25" class="date_picker" name="dob" placeholder="dd/mm/yyyy" >
     */
    $(document).on('focus', '.date_picker', function () {
	var th = $(this);
	var maxDate = (th.attr('data-max_date')) ? (($.isNumeric(th.attr('data-max_date'))) ? th.attr('data-max_date') : new Date(th.attr('data-max_date'))) : null;
	var minDate = (th.attr('data-min_date')) ? (($.isNumeric(th.attr('data-min_date'))) ? th.attr('data-min_date') : new Date(th.attr('data-min_date'))) : null;
	var dateFormat = (th.attr('data-date_format')) ? th.attr('data-max_date') : 'dd/mm/yy';
	th.datepicker({changeMonth: true, changeYear: true, maxDate: maxDate, minDate: minDate, dateFormat: dateFormat});
    });
}

if ($('#from_date').length && $('#to_date').length) {
   	
	 $("#from_date").datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,
	changeYear: true,
	onClose: function (selectedDate) {
	    if (selectedDate.length != 0) {
		$("#to_date").datepicker("option", "minDate", selectedDate);
	    }
	}
    });
	
    $("#to_date").datepicker({
	dateFormat: 'yy-mm-dd',
	changeMonth: true,
	changeYear: true,
	onClose: function (selectedDate) {
	    $("#from_date").datepicker("option", "maxDate", selectedDate);
	}
    });
}

if ($('.date_timepicker').length ) {
   	 $('.date_timepicker').datetimepicker(
                {
                    changeMonth: true,
                    changeYear: true,
                    dateFormat:'yy-mm-dd ',
                    separator: ''
      });

}
if ($('.select2').length ) {
   $('.select2').select2();
 }
if ($('.time_picker ').length ) {
	 $('.time_picker').timepicker();
   	
}
  
});


