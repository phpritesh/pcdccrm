

export default class Generic {
    /**
     * academic related codes
     */
    static initCommonPageJS() {
        $("#entryForm").validate({
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");
                error.insertAfter(element);

            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
            }
        });

        $(".date_picker").datetimepicker({
            format: "DD/MM/YYYY",
            viewMode: 'days',
            ignoreReadonly: true,
        });
        $(".date_picker_with_clear").datetimepicker({
            format: "DD/MM/YYYY",
            viewMode: 'days',
            showClear: true,
            ignoreReadonly: true
        });


        $(".date_picker2").datetimepicker({
            format: "DD/MM/YYYY",
            viewMode: 'years',
            ignoreReadonly: true
        });
        $(".date_picker_month_year").datetimepicker({
            format: "MM-YYYY",
            viewMode: 'months',
            ignoreReadonly: true,
            useCurrent: false
        });

        $(".time_picker").datetimepicker({
            format: 'LT',
            showClear: true,
            ignoreReadonly: true
        });

        $(".date_time_picker").datetimepicker({
            format: "DD/MM/YYYY LT",
            viewMode: 'days',
            ignoreReadonly: true
        });

        $('.date_picker_with_disable_days').datetimepicker({
            format: "DD/MM/YYYY",
            viewMode: 'days',
            ignoreReadonly: true,
            daysOfWeekDisabled: window.disableWeekDays,
            useCurrent: false
        });

        $('.only_year_picker').datetimepicker({
            format: "YYYY",
            viewMode: 'years',
            ignoreReadonly: true,
            useCurrent: false
        });

        //table with out search
        var table = $('#listDataTable').DataTable({
            pageLength: 25,
            lengthChange: false,
            responsive: true
        });

        //table custom
        var table33 = $('#listDataTableOnlyPrint').DataTable({
            lengthChange: false,
            responsive: true,
            paging: false,
            filter: false
        });

        var table2 = $('#listDataTableWithSearch').DataTable({
            pageLength: 25,
            lengthChange: false,
            orderCellsTop: true,
            responsive: true
        });

        var table3 = $('#listDataTableWithSearchNoPaginate').DataTable({
            paging:false,
            lengthChange: false,
            orderCellsTop: true,
            responsive: true,
            info: false
        });

        $('#listDataTableOnlyFilter').DataTable({
            lengthChange: false,
            responsive: true,
            paging: false,
            filter: true,
            info: false,
            order: []
        });

        let stopchange = false;
        $('html #listDataTableWithSearch, html #listDataTable, html #listDataTableWithSearchNoPaginate, html #listDataTableOnlyFilter')
        .on('change', 'input.statusChange', function (e) {
            let that = $(this);
            if (stopchange === false) {
                let isActive = $(this).prop('checked') ? 1 : 0;
                let pk = $(this).attr('data-pk');
                let newpostUrl = postUrl.replace(/\.?0+$/, pk);
                axios.post(newpostUrl, { 'status': isActive })
                    .then((response) => {
                        if (response.data.success) {
                            toastr.success(response.data.message);
                        }
                        else {
                            let status = response.data.message;
                            if (stopchange === false) {
                                stopchange = true;
                                that.bootstrapToggle('toggle');
                                stopchange = false;
                            }
                            toastr.error(status);
                        }
                    }).catch((error) => {
                        // console.log(error.response);
                        let status = error.response.statusText;
                        if (stopchange === false) {
                            stopchange = true;
                            that.bootstrapToggle('toggle');
                            stopchange = false;
                        }
                        toastr.error(status);

                    });
            }
        });

        $(".year_picker").datetimepicker({
            format: "YYYY",
            viewMode: 'years',
            ignoreReadonly: true
        });

        $('input').not('.dont-style').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
        $('.select2').select2();
        // $('.select2-allow-clear').select2({allowClear:true});


    }

    static initDeleteDialog() {
        $('html #listDataTableWithSearch, html #listDataTable, html #listDataTableWithSearchNoPaginate, html #listDataTableOnlyPrint, html #listDataTableOnlyFilter')
        .on('submit', 'form.myAction', function (e) {
            e.preventDefault();
            var that = this;
            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this record!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.value) {
                    that.submit();
                }
            });
        });
    }

 
    static loaderStart(){
        // console.log('loader started...');
        $('.ajax-loader').css('display','block');
    } 
    static loaderStop(){
        // console.log('loader stoped...');
        $('.ajax-loader').css('display','none');
    }

}