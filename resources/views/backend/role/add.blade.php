<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Role @endsection
<!-- End block -->


<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Role @if($role) {{$role->name}} @endif
            <small> @if($role) Update @else Add New @endif</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::route('user.role_index')}}"><i class="fa icon-user"></i> Role</a></li>
            <li class="active">@if($role) Update @else Add @endif</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form novalidate id="entryForm" action="@if($role) {{URL::Route('user.role_update', $role->id)}} @else {{URL::Route('user.role_store')}} @endif" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            @csrf
                            @if(!$role)
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <label for="name">Role Name<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="name" value="{{old('name')}}" required minlength="4" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                            </div>
                            @endif
                            <h4>Permissions</h4>

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
                            <a href="{{URL::route('user.role_index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa @if($role) fa-refresh @else fa-plus-circle @endif"></i> @if($role) Update @else Add @endif</button>

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
