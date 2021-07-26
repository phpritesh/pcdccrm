<?php

namespace App\Http\Controllers\Backend;

use App\Http\Helpers\AppHelper;
use App\Role;
use App\Template;
use App\User;
use App\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AcademicYear;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\map;

class AdministratorController extends Controller
{
    
   
   
      

    /* Handle an user password change
    *
    * @return Response
    */
    public function userResetPassword(Request $request)
    {

        if ($request->isMethod('post')) {

            $user = User::findOrFail($request->get('user_id'));
            //validate form
            $this->validate($request, [
                'password' => 'required|confirmed|min:6|max:50',
            ]);

            $user->password = bcrypt($request->get('password'));
            $user->force_logout = 1;
            $user->save();

            return redirect()->route('administrator.user_password_reset')->with('success', 'Password successfully changed.');

        }

        $users = User::select(DB::raw("CONCAT(name,'[',username,']') AS name"),'id')->where('status', '1')->pluck('name','id');

        return view('backend.administrator.user.change_password', compact('users'));
    }


    /**
     * Mail and sms template  manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function templateMailAndSmsIndex(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {//
            $this->validate($request, [
                'hiddenId' => 'required|integer',
            ]);
            $template = Template::findOrFail($request->get('hiddenId'));

            // now check is tempalte currently used ??
            $studnetAttendaceTeplate = AppHelper::getAppSettings('student_attendance_template');
            $employeeAttendaceTeplate = AppHelper::getAppSettings('employee_attendance_template');

            if($template->id == $studnetAttendaceTeplate || $template->id == $employeeAttendaceTeplate){
                return redirect()->route('administrator.template.mailsms.index')->with('error', 'Can not delete it because this template is being used.');
            }
            $template->delete();

            return redirect()->route('administrator.template.mailsms.index')->with('success', 'Template deleted!');
        }

        //if it is ajax request then send json response with formated data
        if($request->ajax()){

            $userRole = $request->query->get('user','');

            $for = AppHelper::USER_TEACHER;
            if($userRole == "student"){
                $for = AppHelper::USER_STUDENT;
            }


            $templates = Template::where('type',$request->query->get('type',0))
                ->where('role_id', $for)->get();

            $data = [];
            foreach ($templates as $template){
                $data[] = [
                    'id' => $template->id,
                    'text' => $template->name
                ];
            }

            return response()->json($data);
        }


        //for get request
        // AppHelper::TEMPLATE_TYPE  1=SMS , 2=EMAIL
        $templates = Template::whereIn('type',[1,2])->get();

        return view('backend.administrator.templates.mail_and_sms.list', compact('templates'));
    }

    /**
     * Mail and sms template  manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function templateMailAndSmsCru(Request $request, $id=0)
    {
        //for save on POST request
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'type' => 'required',
                'name' => 'required|min:4|max:255',
                'role_id' => 'required|integer',
            ]);


            $data = [
                'name' => $request->get('name'),
                'type' =>  (integer)$request->get('type'),
                'role_id' => $request->get('role_id'),
                'content' => ($request->get('type') == "2") ? $request->get('content_email') : $request->get('content')
            ];


            Template::updateOrCreate(
                ['id' => $id],
                $data
            );
            $msg = "Template ";
            $msg .= $id ? 'updated.' : 'added.';

            if($id){
                return redirect()->route('administrator.template.mailsms.index')->with('success', $msg);
            }
            return redirect()->route('administrator.template.mailsms.create')->with('success', $msg);
        }

        $role = -1;
        $template = Template::find($id);
        if($template) {
            $role = $template->getOriginal('role_id');
        }

        return view('backend.administrator.templates.mail_and_sms.add', compact('role', 'template'));
    }


    
}
