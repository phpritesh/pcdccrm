<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Dashboard @endsection
<!-- End block -->
@section('extraStyle')
    <style>
        .notification li {
            font-size: 16px;
        }
        .notification li.info span.badge {
            background: #00c0ef;
        }
        .notification li.warning span.badge {
            background: #f39c12;
        }
        .notification li.success span.badge {
            background: #00a65a;
        }
        .notification li.error span.badge {
            background: #dd4b39;
        }
        .total_bal {
            margin-top: 5px;
            margin-right: 5%;
        }
    </style>
@endsection
<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Main content -->
    <section class="content">
        @if($userRoleId == AppHelper::USER_ADMIN)
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box ">
                        <a class="small-box-footer bg-orange-dark" href="{{URL::route('student.index')}}">
                            <div class="icon bg-orange-dark" style="padding: 9.5px 18px 8px 18px;">
                                <i class="fa icon-student"></i>
                            </div>
                            <div class="inner ">
                                <h3 class="text-white">{{$admin}} </h3>
                                <p class="text-white">
                                    Admin </p>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-xs-6">
                    <div class="small-box ">
                        <a class="small-box-footer bg-teal-light" href="{{URL::route('academic.subject')}}">
                            <div class="icon bg-teal-light" style="padding: 9.5px 18px 8px 18px;">
                                <i class="fa icon-subject"></i>
                            </div>
                            <div class="inner ">
                                <h3 class="text-white">
                                    {{$partner}} </h3>
                                <p class="text-white">
                                    Partner </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif

       


    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
   

@endsection
<!-- END PAGE JS-->
