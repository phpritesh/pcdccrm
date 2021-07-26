<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') User Permission @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            User Permission
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::route('user.index')}}"><i class="fa fa-user"></i> User</a></li>
            <li class="active"> Permission</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="{{URL::Route('user.permission', $user->id)}}" method="post" enctype="multipart/form-data">
                        <div class="box-header">
                            <div class="callout callout-danger">
                                <p><b>Note:</b> User already got permissions from role. But if this user need extra permission then add it from below list.</p>
                            </div>
                        </div>
                        <div class="box-body">
                            @csrf
                            <h4>Permission for {{$user->name}}</h4>

                            @foreach($permissionList as $group => $modules)
                                <p class="lead section-title">{{$group}}:</p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped table-hover table-responsive">
                                            <thead>
                                             <tr>
                                            <th>
                                                <input type="checkbox" class="checkbox tableCheckedAll">
                                            </th>
                                            <th width="20%">Module Name</th>
											 <th width="70%">Action</th>
                                           
                                        </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($modules as $module => $verbs)
		
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="checkbox rowCheckedAll">
                                                </td>
                                                <td>
                                                    {{$module}}
                                                </td>
                                                <td>
												 @foreach($verbs as $vname => $vids)
												
													 <div class="form-check form-check-inline">
													  <input class="form-check-input" type="checkbox" name="permissions[]" id="inlineCheckbox1" value="{{ implode(',',$vids['ids'])}}" {{($vids['checked'] == 1) ? 'checked' : ''}}>
													  <label class="form-check-label" for="inlineCheckbox1">{{$vname}}</label>
													</div>
												@endforeach
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::route('user.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-refresh"></i> Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')

    <script src="{{ asset('plugins/icheck/icheck.min.js') }}"></script> 
    <script type="text/javascript">
        $(document).ready(function () {
        
            $('input.tableCheckedAll').on('click', function (event) {
                var chkToggle;
                $(this).is(':checked') ? chkToggle = "check" : chkToggle = "uncheck";
                var table = $(event.target).closest('table');
                $('td input:checkbox:not(.tableCheckedAll)',table).iCheck(chkToggle);
            });
            $('input.rowCheckedAll').on('click', function (event) {
				
                var chkToggle;
                $(this).is(':checked') ? chkToggle = "check" : chkToggle = "uncheck";
				
                var row = $(event.target).closest('tr');
				//console.log(row); return false;
                $('td input:checkbox:not(.rowCheckedAll)',row).iCheck(chkToggle);
            });

        });
    </script>
@endsection
<!-- END PAGE JS-->
