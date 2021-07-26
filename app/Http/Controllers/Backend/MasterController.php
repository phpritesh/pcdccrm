<?php

namespace App\Http\Controllers\Backend;

use App\Industry;
use App\SubIndustry;
use App\IncomeGroup;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\AppHelper;

class MasterController extends Controller
{

    public function __construct()
    {

    }

    public function industryindex()
    {

       $industry = Industry::orderBy('id', 'desc')->paginate(10);

        return view('backend.master.industry.index', compact('industry'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function industrycreate(Request $request)
    {
	
		    if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);

           echo "<pre>";
           print($request->all());
            echo "</pre>"; exit;
           Industry::create([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Industry created successfully']);
		 }

        $industry = NULL;

		     return view('backend.master.industry.add', compact('industry'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function industryupdate(Request $request, $id)
    {
		 if ($request->isMethod('PATCH')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


            Industry::where('id', $id)->update([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Industry updated successfully']);
		 }

        $industry = Industry::findOrFail($id);
        return view('backend.master.industry.add', compact('industry'));
    }
	
	
	 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function industrydestroy(Request $request, $id)
    {
		 if ($id) {
          
            Industry::where('id', $id)->delete();
			return response()->json(['status'=>'success', 'msg'=>'Industry deleted successfully']);
		 }

    }
	
	
	public function subindustryindex()
    {

       $subindustry = SubIndustry::orderBy('id', 'desc')->paginate(10);

        return view('backend.master.subindustry.index', compact('subindustry'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function subindustrycreate(Request $request)
    {
	
		    if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


            SubIndustry::create([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Sub Industry created successfully']);
		 }

        $subindustry = NULL;

		     return view('backend.master.subindustry.add', compact('subindustry'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subindustryupdate(Request $request, $id)
    {
		 if ($request->isMethod('PATCH')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


           SubIndustry::where('id', $id)->update([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Sub Industry updated successfully']);
		 }

        $subindustry = SubIndustry::findOrFail($id);
        return view('backend.master.subindustry.add', compact('subindustry'));
    }
	
	
	 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subindustrydestroy(Request $request, $id)
    {
		 if ($id) {
          
            SubIndustry::where('id', $id)->delete();
			return response()->json(['status'=>'success', 'msg'=>'Sub Industry deleted successfully']);
		 }

    }
	
	
	
	public function incomegroupindex()
    {

       $incomegroup = IncomeGroup::orderBy('id', 'desc')->paginate(10);

        return view('backend.master.incomegroup.index', compact('incomegroup'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	 public function incomegroupcreate(Request $request)
    {
	
		    if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


            IncomeGroup::create([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Income Group created successfully']);
		 }

        $incomegroup = NULL;

		     return view('backend.master.incomegroup.add', compact('incomegroup'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incomegroupupdate(Request $request, $id)
    {
		 if ($request->isMethod('PATCH')) {
            $this->validate($request, [
                'name' => 'required|min:4|max:255',
            ]);


            IncomeGroup::where('id', $id)->update([
                'name' => $request->get('name')
            ]);
			return response()->json(['status'=>'success', 'msg'=>'Income Group updated successfully']);
		 }

        $incomegroup = IncomeGroup::findOrFail($id);
        return view('backend.master.incomegroup.add', compact('incomegroup'));
    }
	
	
	 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function incomegroupdestroy(Request $request, $id)
    {
		 if ($id) {
          
            IncomeGroup::where('id', $id)->delete();
			return response()->json(['status'=>'success', 'msg'=>'Income Group deleted successfully']);
		 }

    }
	
	
	

   

}
