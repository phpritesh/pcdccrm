<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Reset User Password @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Main content -->
    <section class="content-header">
        <h1>
            Data Import
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data import</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
              
            <div class="col-md-6 col-md-offset-3">
                <!-- Change password -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Import Crm Data</h3>
                         <a class="btn btn-info btn-sm pull-right" download href="{{ asset('sample/crm-data-sample.xlsx') }}"  ><i class="fa fa-plus-circle"></i>Download Sample XLSX File</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form novalidate id="import-crmdata" action="{{URL::route('dataimport.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
							<div class="row">
		<div class="col-md-12 mt15">
		    <label for="userfile">Upload crmdata Excel File :</label>
		    <input style="display: inline " type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" name="crmdatafile" id="usersfile">
		    <div class="text-danger">( Excel Size must be less than 10 mb)</div>
		</div>
		</div>
                         
                            <br>
                     
                            <button type="submit" class="btn btn-info pull-right submit-button"><i class="fa fa-upload"></i> Import</button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
                <div class="col-md-3"></div>

                <!-- /.box -->
        </div>
        <!-- /.row -->
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
