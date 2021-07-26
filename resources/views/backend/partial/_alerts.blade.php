@if (Session::has('alertError'))
<div class="alert alert-danger alert-dismissible"> <a aria-label="Close " data-dismiss="alert" class="closed pull-right fa fa-times"></a>{{ Session::get('alertError') }}</div>
@endif
 
@if (Session::has('alertSuccess'))
<div class="alert alert-success alert-dismissible"><a aria-label="Close " data-dismiss="alert" class="closed pull-right fa fa-times"></a>{{ Session::get('alertSuccess') }}</div>
@endif
 
@if (Session::has('alertWarning'))
<div class="alert alert-info alert-dismissible"><a aria-label="Close " data-dismiss="alert" class="closed pull-right fa fa-times"></a>{{ Session::get('alertWarning') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif