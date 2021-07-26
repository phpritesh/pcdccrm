<?php

namespace App\Http\Controllers\Backend;
use App\Crmdata;
use App\Industry;
use App\SubIndustry;
use App\IncomeGroup;
use App\Masterimport;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\AppHelper;
use App\Imports\CrmdatasImport;
use Maatwebsite\Excel\Facades\Excel;

class CrmdataController extends Controller
{

    public function __construct()
    {

    }

   	/**
     * data list.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function crmdatalist(Request $request)
    {
		    $industry = Industry::get()->pluck('name', 'id');
			$sub_vertical = SubIndustry::get()->pluck('name', 'id');
			$incomegroup = IncomeGroup::get()->pluck('name', 'id');
	        $dataobj = Crmdata::orderBy('id', 'desc');
			if($request->get('unique_code_contacts')){
				$dataobj->where('unique_code_contacts', $request->get('unique_code_contacts'));
			}
			if($request->get('partner_name')){
				$dataobj->where('partner_name', 'like', '%'.$request->get('partner_name').'%');
			}
			if($request->get('organization_name')){
				$dataobj->where('organization_name', 'like', '%'.$request->get('organization_name').'%');
			}
			if($request->get('domain')){
				$dataobj->where('domain', 'like', '%'.$request->get('domain').'%');
			}
			if($request->get('cloud_provider')){
				$dataobj->where('cloud_provider', 'like', '%'.$request->get('cloud_provider').'%');
			}
			if($request->get('industry_vertical')){
				$dataobj->where('industry_vertical', $request->get('industry_vertical'));
			}
			if($request->get('sub_vertical')){
				$dataobj->where('sub_vertical', $request->get('sub_vertical'));
			}
			if($request->get('turnover')){
				$dataobj->where('turnover', $request->get('turnover'));
			}
			
		    $results = $dataobj->paginate(20);
		     return view('backend.crmdata.list', compact('results','industry','sub_vertical','incomegroup'));
    }


    /**
     * Show the form for data create.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function create(Request $request)
    {
	        $industry = Industry::get()->pluck('name', 'id');
			$sub_vertical = SubIndustry::get()->pluck('name', 'id');
			$incomegroup = IncomeGroup::get()->pluck('name', 'id');
		  
		     return view('backend.crmdata.add', compact('industry','sub_vertical','incomegroup'));
    }
	
	  /**
     * post data store.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function store(Request $request)
    {
	
	   if ($request->isMethod('post')) {
             $isuniq = Crmdata::where('unique_code_contacts','like', '%'.$request->get('unique_code_contacts').'%')->first();
		 if($isuniq){
			 return response()->json(['status'=>'error', 'msg'=>'Unique Code Contacts already exists it should be uniq.'], 422);
			
		 }else{
          $posts = $request->all();
           Crmdata::create($posts);
			return response()->json(['status'=>'success', 'msg'=>'Data added successfully', 'uri'=>route('CrmData.list')]);
		 }
	   }
		    
    }
	
	
	/**
     * Show the form for data edit.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function edit(Request $request, $id)
    {
		
	        $result = Crmdata::find($id);
		  $industry = Industry::get()->pluck('name', 'id');
			$sub_vertical = SubIndustry::get()->pluck('name', 'id');
			$incomegroup = IncomeGroup::get()->pluck('name', 'id');
		     return view('backend.crmdata.edit', compact('result','industry','sub_vertical','incomegroup'));
    }
	
	  /**
     * post data update.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function update(Request $request, $id)
    {
	
		    if ($request->isMethod('post')) {
             $isuniq = Crmdata::where('unique_code_contacts','like', '%'.$request->get('unique_code_contacts').'%')->where('id','!=', $id)->first();
		 if($isuniq){
			 return response()->json(['status'=>'error', 'msg'=>'Unique Code Contacts already exists it should be uniq.'], 422);
			
		 }else{
          $posts = $request->all();
		  unset($posts['_token']);
           Crmdata::where('id', $id)->update($posts);
			return response()->json(['status'=>'success', 'msg'=>'Data updated successfully', 'uri'=>route('CrmData.list')]);
		 }
	   }
		    
    }
	
	 /**
     *data destroy.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
		 if ($id) {
            Crmdata::where('id', $id)->delete();
			return response()->json(['status'=>'success', 'msg'=>'Record deleted successfully']);
		 }

    }
	
	/**
     * data view detail.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function view(Request $request, $id)
    {
	
		  
		     return view('backend.crmdata.edit');
    }
	
	 /**
     * data assign to partner.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function assign(Request $request)
    {
	
		    if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


           Industrys::create([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Industry created successfully']);
		 }
		    
    }
	
	
	
	 /**
     * data assign request from partner.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function assignrequest(Request $request)
    {
	
		    if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


           Industrys::create([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Industry created successfully']);
		 }
		    
    }
	
	/**
     * data assign request list.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function assignrequestlist(Request $request)
    {
	
		  
		     return view('backend.crmdata.assign_request_list');
    }
	
	 /**
     * data download.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function download(Request $request)
    {
	
		    if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


           Industrys::create([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Industry created successfully']);
		 }
		    
    }
	
	/**
     * data import list.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function crmdataimportlist(Request $request)
    {
	
		   $results = Masterimport::orderBy('id', 'desc')->paginate(10);
		     return view('backend.crmdata.import_list', compact('results'));
    }


    /**
     * Show the form for data import.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function crmdataimport(Request $request)
    {
	
		  
		     return view('backend.crmdata.import');
    }
	
	  /**
     * post data import.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function crmdataimportstore(Request $request)
    {
	 
		    if ($request->isMethod('post')) {
				
			$this->validate($request, ['crmdatafile' => 'required|mimes:xlsx']);
			$masterimport =  Masterimport::create([
			'name' => request()->file('crmdatafile')->getClientOriginalName(),
			]);
			session()->put('import_success_row', []);
			session()->put('import_fails_row', []);
			session(['masterimport_id' => $masterimport->id]);
			Excel::import(new CrmdatasImport,request()->file('crmdatafile'));
			$impsuccess = session('import_success_row');
			$impfails = session('import_fails_row');

			Masterimport::where('id',session('masterimport_id'))->update(['import_success'=>count($impsuccess),'import_fail'=>count($impfails),'import_successdata'=>json_encode($impsuccess),'import_faildata'=>json_encode($impfails)]);
			$message = NULL;
			if(count($impsuccess)){
			$message.= count($impsuccess).' data imported  successfully ';
			}
			if(count($impfails)){
			$message.= count($impfails).' data failior to import these already exists ';
			}
			return response()->json(['status'=>'success', 'msg'=>$message, 'uri'=>route('dataimport.index')]);


			}
		    
    }
	
	 /**
     * imported data destroy.
     *
     * @return \Illuminate\Http\Response
     */
    public function crmdataimportdelete(Request $request, $id)
    {
		 if ($id) {
          
            IncomeGroup::where('id', $id)->delete();
			return response()->json(['status'=>'success', 'msg'=>'Income Group deleted successfully']);
		 }

    }
	
	


   
	
	
	

   

}
