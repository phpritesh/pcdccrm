
<table  width="100%" cellspacing="3" cellpadding="3"  style="font-size:11px;font-family: Helvetica Neue,Helvetica,Arial,sans-serif;">
<tr>
<td border="1">
<table border="0" width="100%">
 <tr><td >
 <table>
 <tr>
 <td width="40%"> &nbsp;  <img   src="@if(isset($appSettings['institute_settings']['logo_small'])) {{asset('storage/logo/'.$appSettings['institute_settings']['logo_small'])}} @else {{ asset('images/logo-xs.png') }} @endif" width="70"> <br><table width="100%" style="color:#595959; font-size:9px;">
	<tr>&nbsp;  <td><i>"{{ $appSettings['institute_settings']['name'] }}"</i></td></tr>
 </table></td>
 <td align="center"  width="30%"> <b>Fee Receipt OF  {{$ledgerInfo->month_from}} To {{$ledgerInfo->month_to}}</b></td>
 <td align="right" width="30%"><br> <br> <h3><a href="#">{{ $appSettings['institute_settings']['name'] }}</a>&nbsp; &nbsp; </h3> </td>
 </tr>
 </table>
 </td>
 </tr>
 
 <tr>
  &nbsp;  <td width="97%" border="1">
<table width="100%">
<tr>
<td>
<table width="100%">
<tr>
<td border="1" width="65%">
 <table>
<tr> &nbsp; <td colspan="2"><b  style="font-size:10px;"><br>{{ $appSettings['institute_settings']['name'] }}</b></td></tr>
<tr> <td colspan="2"><b>Address:</b></td></tr>
<tr> <td colspan="2">{{ $appSettings['institute_settings']['address'] }}</td></tr>
<tr><td><b  style="font-size:10px;">Email:</b>{{ $appSettings['institute_settings']['email'] }}   </td> <td>         <b  style="font-size:10px;">Contact No. :</b> +91{{ $appSettings['institute_settings']['phone_no'] }}</td></tr>
</table>
 </td>
 
<td border="1" align="center" width="35%">
<table>
<tr> <td>&nbsp;</td></tr>
<tr> <td>Generate Date: <?= date('d-m-Y', strtotime($ledgerInfo->deleted_at)); ?></td></tr>
<tr> <td>	==========================</td></tr>
<tr> <td>Receipt No.: {{ $ledgerInfo->id }}</td></tr>

</table>
</td>

 </tr>

 </table>
 </td>
 </tr>

 
 <tr>
 <td>
 <table>
 <tr>
  <td> 
  <table width="100%" cellpadding="2" > 
  <tr><td> <b>Student Detail:</b></td></tr>

	<tr>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <td> <b><?= ucwords($regiInfo->student->name); ?></b></td></tr>
	<tr><td><b> Registration No.:   {{ $regiInfo->regi_no }}</b></td></tr>
	<tr><td><b> Contact No. :   + {{ $regiInfo->student->phone_no }}</b></td></tr>
  </table>
</td>
</tr>
 </table>
 </td>
 </tr>


<tr><td  style="border-top:1px solid #595959;">
<table  cellpadding="4" width="100%;">
	<tr>
		<th style="width: 30%;border:1px solid #595959;" align="center"><b>Course Name</b></th>
		<th style="width: 50%;border:1px solid #595959;" align="center" ><b>Subject</b></th>
		<th style="width: 20%;border:1px solid #595959;" align="center" ><b>Fee</b></th>
	</tr>
  </table>
  <table  cellpadding="5"  width="100%;">
                               @if(!empty($ledgerInfo->ledger_attr))
							 
								@foreach($ledgerInfo->ledger_attr as $row)
								
					           <?php 
							
							    $borders =  'border-bottom:1px solid #595959;'; 
								?>
    							<tr>
    								<td style="width: 30%; <?= $borders ?>">@if(!empty($row->subject)) {{$row->subject->courses->name}} @endif</td>
    								<td style="width: 50%; <?= $borders ?>">{{ $row->desc }}</td>
    								<td style="width: 20%; <?= $borders ?>"><i class="fa fa-inr" aria-hidden="true"></i> {{ $row->amount }}</td>
    							</tr>
								
						
								
								
								@endforeach
                                @endif
							 <tr>
								<th style="border:1px solid #595959;" align="left" colspan="2">Generated Amount</th>
								<th style="border:1px solid #595959;" align="center" width="20%"><i class="fa fa-inr" aria-hidden="true"></i>{{ $ledgerInfo->debit }}</th>
                             </tr>
						 
 @if((!empty($ledgerInfo->waveoff)) AND ($ledgerInfo->wave_off > 0))
@foreach($ledgerInfo->waveoff as $wvrow)
<tr>
<td style="border:1px solid #595959;" align="left" colspan="2">{{$wvrow->created_at}}</td>
<td style="border:1px solid #595959;" align="center"> {{$wvrow->amount}}</td>
</tr>
@endforeach
@endif
 @if(!empty($ledgerInfo->payment))
	 @foreach($ledgerInfo->payment as $prow)
<tr>
<td style="border:1px solid #595959;" align="left" colspan="2">{{$prow->created_at}}</td>
<td style="border:1px solid #595959;" align="center"> {{$prow->amount}}</td>
</tr>
@endforeach
@endif
		 
<tr>
 <td style="border:1px solid #595959;" align="left" colspan="2"><b>Total Paid Amount</b> </td>
 <td style="border:1px solid #595959;" align="center">  {{ $ledgerInfo->credit }}</td>
 </tr>	
@if($ledgerInfo->due_amount > 0)
 <tr>
 <td style="border:1px solid #595959;" align="left" colspan="2"><b>Total Due Amount</b> </td>
 <td style="border:1px solid #595959;" align="center"> {{ $ledgerInfo->due_amount }}</td>
 </tr>
@endif

@if($ledgerInfo->advance_amount > 0)
 <tr>
 <td style="border:1px solid #595959;" align="left" colspan="2"><b>Advance Amount</b> </td>
 <td style="border:1px solid #595959;" align="center"> {{ $ledgerInfo->advance_amount }}</td>
 </tr>
@endif
  
 
<tr>
<td style="border-left:1px solid #595959;border-right:1px solid #595959;border-bottom:1px solid #595959;" width="65%" align="left"  colspan="2"><table width="100%"><tr><td style="border-bottom:1px solid #595959;">For invoice related questions please email at halchalkids@gmail.com</td>
 </tr>

<tr><td >
<table width="100%" cellpadding="2" >

  </table>
</td>
</tr>

 </table>
 </td>
 
 <td style="border-left:1px solid #595959;border-bottom:1px solid #595959;" width="35%" align="center" colspan="5">
  <table width="100%" cellpadding="2" > 
  <tr><td><b>For Office Use</b></td></tr>
   <tr><td>&nbsp; <br> <br></td></tr>
    <tr><td><b>Authorised Signatory</b></td></tr>
  </table>
 </td>
 </tr>


</table>



</td>
</tr>

</table>
 </td>
 </tr>

</table>
</td></tr>

  </table>