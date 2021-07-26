<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') User @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Data 
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add New</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        
						{!! Form::open(['route' => 'CrmData.list', 'method'=>'get']) !!}
						<div class="row mt20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Unique Code Contacts</label>
                                        <input  type="text" class="form-control" name="unique_code_contacts" value="{{request()->get('unique_code_contacts') ? request()->get('unique_code_contacts') : '' }}" placeholder="Unique Code Contacts"   >
                                       
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Partner Name</label>
                                        <input  type="text" class="form-control" name="partner_name" value="{{request()->get('partner_name') ? request()->get('partner_name') : '' }}" placeholder="Partner Name"   >
                                       
                                    </div>
                                </div>
								 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Organization Name</label>
                                        <input  type="text" class="form-control" name="organization_name" value="{{request()->get('organization_name') ? request()->get('organization_name') : '' }}" placeholder="Organization Name"   >
                                       
                                    </div>
                                </div>
								
								 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Domain</label>
                                        <input  type="text" class="form-control" name="domain" value="{{request()->get('domain') ? request()->get('domain') : '' }}" placeholder="Domain"   >
                                       
                                    </div>
                                </div>
						</div>
						<div class="row mt10">
						 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Cloud Provider</label>
                                        <input  type="text" class="form-control" name="cloud_provider" value="{{request()->get('cloud_provider') ? request()->get('cloud_provider') : ''}}" placeholder="Cloud Provider"   >
                                      
                                    </div>
                                </div>
						   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Industry Vertical</label>
										 {!! Form::select('industry_vertical', $industry, request()->get('industry_vertical') ? request()->get('industry_vertical') : '' , ['placeholder' => 'Pick Industry Vertical','class' => 'form-control select2']) !!}
                                       
                                    </div>
                          </div>
						  
						   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Sub Vertical</label>
										 {!! Form::select('sub_vertical', $sub_vertical, request()->get('sub_vertical') ? request()->get('sub_vertical') : '' , ['placeholder' => 'Pick Sub Vertical Vertical','class' => 'form-control select2' ]) !!}
                                       
                                    </div>
                          </div>
						  
						   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Turnover</label>
										 {!! Form::select('turnover', $incomegroup, request()->get('turnover') ? request()->get('turnover') : '' , ['placeholder' => 'Pick Turnover','class' => 'form-control select2']) !!}
                                       
                                    </div>
                          </div>
						   
						 
						</div>
						<div class="row ">
						 @can('CrmData.create')
						 
						<div class="col-md-1 pull-right">
						  <a class="btn btn-info btn-sm pull-right mb5" href="{{ URL::route('CrmData.create') }}"  ><i class="fa fa-plus-circle"></i> Add New</a>
						 </div>
						 @endcan
						
						 <div class="col-md-1 pull-right">
						  
						 <button type="submit" class="btn btn-info pull-right "><i class="fa fa-search"></i>Search</button>
						 
						 </div>
						 
						  <div class="col-md-1 pull-right">
						  <a href="{{URL::route('CrmData.list')}}" class="btn btn-default">Reset</a>
						 </div>
						   </div>
						{!! Form::close() !!}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body margin-top-20">
                        <div class="table-responsive">
                        <table id="listDataTable" class="table table-bordered table-striped list_view_table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th width="5%"><input type="checkbox" class="checkbox tableCheckedAll">  </th>
                                <th width="15%" style="text-align:left">Unique Code Contacts</th>
                                <th width="15%" style="text-align:left">Partner Name</th>
								<th width="15%" style="text-align:left">Pcdcid</th>
								<th width="10%" style="text-align:left">Full Name</th>
								<th width="15%" style="text-align:left">Industry Vertical</th>
								<th width="10%" style="text-align:left">Date</th>
                                <th class="notexport" width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $row)
						
                                <tr>
								<td> <input type="checkbox" class="checkbox rowCheckedAll"></td>
                                    <td style="text-align:left">{{ $row->unique_code_contacts }}</td>
                                     <td style="text-align:left">{{ $row->partner_name }}</td>
									  <td style="text-align:left">{{ $row->pcdcid }}</td>
									  <td style="text-align:left">{{ $row->first_name }} {{ $row->last_name }}</td>
									  <td style="text-align:left">{{ $row->industry ? $row->industry->name : ''}}</td>
									  <td style="text-align:left">{{ $row->created_at }}</td>
                                    <td>
									   
									    @can('CrmData.edit')
                                        <div class="btn-group">
										 <a title="Edit Industry"  href="{{URL::route('CrmData.edit', $row->id)}}" class="btn btn-info btn-sm delete-industry"><i class="fa fa-fw fa-edit"></i></a>
                                            </a>
                                        </div>
										@endcan
										 
										 @can('CrmData.destroy')
                                        <div class="btn-group">
										 <a title="Delete Industry" href="javascript:void(0)" data-url="{{URL::route('CrmData.destroy', $row->id)}}" class="btn btn-danger btn-sm delete-crmdata"><i class="fa fa-fw fa-trash"></i></a>
                                            </a>
                                        </div>
										@endcan

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="5%"></th>
                                <th width="15%" style="text-align:left">Unique Code Contacts</th>
                                <th width="15%" style="text-align:left">Partner Name</th>
								<th width="15%" style="text-align:left">Pcdcid</th>
								<th width="10%" style="text-align:left">Organization Name</th>
								<th width="15%" style="text-align:left">Industry Vertical</th>
								<th width="10%" style="text-align:left">Date</th>
                                <th class="notexport" width="15%">Action</th>
                            </tr>
                            </tfoot>
                        </table>
						{{ $results->links() }}
                    </div>
                    </div>
                    <!-- /.box-body -->
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
           Crmdata.Init();
        });

    </script>
@endsection
<!-- END PAGE JS-->
