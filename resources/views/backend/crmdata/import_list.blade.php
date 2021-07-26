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
            Import 
            <small>List</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Import List</li>
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
						  @can('dataimport.create')
                            <a class="btn btn-info btn-sm " href="{{ URL::route('dataimport.create') }}"  ><i class="fa fa-plus-circle"></i> Import New</a>
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
                                <th width="25%" style="text-align:left">Name</th>
                                <th width="15%" style="text-align:left">Success</th>
								<th width="15%" style="text-align:left">Failior</th>
								<th width="15%" style="text-align:left">Date</th>
                                <th class="notexport" width="25%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $row)
                                <tr>
								<td></td>
                                    <td style="text-align:left">{{ $row->name }}</td>
                                     <td style="text-align:left">{{ $row->import_success }}</td>
									  <td style="text-align:left">{{ $row->import_fail }}</td>
									  <td style="text-align:left">{{ $row->created_at }}</td>
                                    <td>
									   
										 
										 @can('dataimport.destroy')
                                        <div class="btn-group">
										 <a title="Delete Industry" href="javascript:void(0)" data-url="{{URL::route('dataimport.destroy', $row->id)}}" class="btn btn-danger btn-sm delete-import"><i class="fa fa-fw fa-trash"></i></a>
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
                                <th width="25%" style="text-align:left">Name</th>
                                <th width="15%" style="text-align:left">Success</th>
								<th width="15%" style="text-align:left">Failior</th>
								<th width="15%" style="text-align:left">Date</th>
                                <th class="notexport" width="25%">Action</th>
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
