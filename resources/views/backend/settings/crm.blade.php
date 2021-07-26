<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Settings @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Crm Settings
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Crm Settings</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <form  id="entryForm" action="{{URL::Route('settings.crm')}}" method="post" enctype="multipart/form-data">
                    @csrf
                       
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Application Settings</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="name">Application Name<span class="text-danger">*</span></label>
                                        <input autofocus type="text" name="name" class="form-control" placeholder="Name" value="{{old('name') ? old('name') : (($info) ? $info->name : '')}}" maxlength="255" required />
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label for="short_name">Application Short Name<span class="text-danger">*</span></label>
                                        <input type="text" name="short_name" class="form-control" placeholder="Short Name" value="{{old('short_name') ? old('short_name') : (($info) ? $info->short_name : '')}}" minlength="3" maxlength="255" required />
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('short_name') }}</span>
                                    </div>
                                </div>
								
							
                               
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="logo">Logo<span class="text-danger">[230 X 50 max size]</span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="logo" placeholder="logo image">
                                        @if($info && isset($info->logo))
                                            <span class="logo-mini">
                                            <img style="max-width: 50px; max-height: 50px;" src="{{asset('storage/logo/'.$info->logo)}}" alt="logo">
                                            </span>
                                            <input type="hidden" name="oldLogo" value="{{$info->logo}}">
                                        @endif
                                        <span class="glyphicon glyphicon-open-file form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="form-group has-feedback">
                                        <label for="logo_small">Logo Small<span class="text-danger">[50 X 50 max size]</span></label>
                                        <input  type="file" class="form-control" accept=".jpeg, .jpg, .png" name="logo_small" placeholder="logo image">
                                        @if($info && isset($info->logo_small))
                                        <span class="logo-mini">
                                            <img style="max-width: 50px; max-height: 50px;" src="{{asset('storage/logo/'.$info->logo_small)}}" alt="logo-small">
                                            </span>
                                            <input type="hidden" name="oldLogoSmall" value="{{$info->logo_small}}">
                                        @endif
                                        <span class="glyphicon glyphicon-open-file form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('logo_small') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="favicon">Favicon<span class="text-danger">[only .png, .ico image][32 X 32 exact size ]</span></label>
                                        <input  type="file" class="form-control"  name="favicon" placeholder="favicon image">
                                        @if($info && isset($info->favicon))
                                        <span class="logo-mini">
                                            <img style="max-width: 50px; max-height: 50px;" src="{{asset('storage/logo/'.$info->favicon)}}" alt="fevicon">
                                            </span>
                                            <input type="hidden" name="oldFavicon" value="{{$info->favicon}}">
                                        @endif
                                        <span class="glyphicon glyphicon-open-file form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('favicon') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                     
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="email">Email</label>
                                        <input  type="email" class="form-control" name="email"  placeholder="email address" value="{{old('email') ? old('email') : (($info) ? $info->email : '')}}" maxlength="255">
                                        <span class="fa fa-envelope form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="phone_no">Phone/Mobile No.<span class="text-danger">*</span></label>
                                        <input  type="text" class="form-control" name="phone_no" required placeholder="phone or mobile number" value="{{old('phone_no') ? old('phone_no') : (($info) ? $info->phone_no : '')}}" minlength="8" maxlength="255">
                                        <span class="fa fa-phone form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    </div>
                                </div>
								
								  <div class="col-md-4">
                                    <div class="form-group has-feedback">
                                        <label for="address">Address<span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" required maxlength="500" required>{{old('address') ? old('address') : (($info) ? $info->address : '')}}</textarea>
                                        <span class="fa fa-location-arrow form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                            </div>
                           
                           
                        </div>
                        <!-- /.box-body -->
                    </div>


                           
                    <div class="box">
                        <div class="box-footer">
                            <a href="{{URL::route('user.dashboard')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-check-circle"></i> Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')

	
	<script src="{{ asset('js/pages/settings.js') }}"></script>
@endsection
<!-- END PAGE JS-->
