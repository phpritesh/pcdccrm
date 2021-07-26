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
            Sub Industry
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Sub Industry</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-tools pull-right">
						  @can('subindustry.create')
                            <a class="btn btn-info btn-sm new-subindustry" href="javascript:void(0)" data-url="{{ URL::route('subindustry.create') }}" ><i class="fa fa-plus-circle"></i> Add New</a>
						@endcan
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body margin-top-20">
                        <div class="table-responsive">
                        <table id="listDataTable" class="table table-bordered table-striped list_view_table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="70%" style="text-align:left">Name</th>
                         
                                <th class="notexport" width="25%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subindustry as $row)
                                <tr>
								<td></td>
                                    <td style="text-align:left">{{ $row->name }}</td>
                                   
                                    <td>
									     @can('subindustry.update')
                                        <div class="btn-group">
                                            <a title="Edit Sub Industry" href="javascript:void(0)" data-url="{{URL::route('subindustry.update',$row->id)}}" class="btn btn-info btn-sm new-subindustry"><i class="fa fa-edit"></i></a>
                                            </a>
                                        </div>
										 @endcan
										 
										 @can('subindustry.destroy')
                                        <div class="btn-group">
										 <a title="Delete Sub Industry" href="javascript:void(0)" data-url="{{URL::route('subindustry.destroy', $row->id)}}" class="btn btn-danger btn-sm delete-subindustry"><i class="fa fa-fw fa-trash"></i></a>
                                            </a>
                                        </div>
										@endcan

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="5%">#</th>
                                <th width="70%" style="text-align:left">Name</th>
                              
                                <th class="notexport" width="25%">Action</th>
                            </tr>
                            </tfoot>
                        </table>
						{{ $subindustry->links() }}
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
            Masters.subIndustryInit();
			//Generic.initCommonPageJS();
            //Generic.initDeleteDialog();
        });

    </script>
@endsection
<!-- END PAGE JS-->
