
<style>
.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>
<div class="modal fade in" id="horizonatal-modal" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="createCompanyLabel" class="modal-title bold text-center">@if($incomegroup) Update Income Group @else Add Income Group @endif</h4>          
				</div>
            <div class="modal-body">
                <span class="errmsgg"></span>
				  
   
                    <form novalidate id="add-incomegroup" action="@if($incomegroup) {{URL::Route('incomegroup.update', $incomegroup->id)}} @else {{URL::Route('incomegroup.store')}} @endif" method="post" enctype="multipart/form-data">
					
                      
                        <div class="box-body">
                            @csrf
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            @if($incomegroup)  {{ method_field('PATCH') }} @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group has-feedback">
                                        <label for="name">Name<span class="text-danger">*</span></label>
                                        <input autofocus type="text" class="form-control" name="name" placeholder="name" value="@if($incomegroup){{ $incomegroup->name }}@else{{old('name')}}@endif" required minlength="2" maxlength="255">
                                        <span class="fa fa-info form-control-feedback"></span>
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                               
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::route('incomegroup.index')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right submit-button"><i class="fa @if($incomegroup) fa-refresh @else fa-plus-circle @endif"></i> @if($incomegroup) Update @else Add @endif</button>

                        </div>
                    </form>
                </div>
          
        </div>
    </div>
</div>