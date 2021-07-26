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
            Industry
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Industry</li>
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
						  @can('industry.create')
                            <a class="btn btn-info btn-sm new-industry" href="javascript:void(0)" data-url="{{ URL::route('industry.create') }}" ><i class="fa fa-plus-circle"></i> Add New</a>
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
                            @foreach($industry as $row)
                                <tr>
								<td></td>
                                    <td style="text-align:left">{{ $row->name }}</td>
                                   
                                    <td>
									     @can('industry.update')
                                        <div class="btn-group">
                                            <a title="Edit Industry" href="javascript:void(0)" data-url="{{URL::route('industry.update',$row->id)}}" class="btn btn-info btn-sm new-industry"><i class="fa fa-edit"></i></a>
                                            </a>
                                        </div>
										 @endcan
										 
										 @can('industry.destroy')
                                        <div class="btn-group">
										 <a title="Delete Industry" href="javascript:void(0)" data-url="{{URL::route('industry.destroy', $row->id)}}" class="btn btn-danger btn-sm delete-industry"><i class="fa fa-fw fa-trash"></i></a>
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
						{{ $industry->links() }}
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
            Masters.industryInit();
			//Generic.initCommonPageJS();
            //Generic.initDeleteDialog();
        });

    </script>
@endsection
<!-- END PAGE JS-->
