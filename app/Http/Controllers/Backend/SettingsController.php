<?php

namespace App\Http\Controllers\Backend;

use App\Http\Helpers\AppHelper;
use App\IClass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AppMeta;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    /**
     * institute setting section content manage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function crmSettings(Request $request)
    {


        //for save on POST request
        if ($request->isMethod('post')) {

            //validate form
            $messages = [
                'logo.max' => 'The :attribute size must be under 1MB.',
                'logo_small.max' => 'The :attribute size must be under 512kb.',
                'logo.dimensions' => 'The :attribute dimensions max be 300 X 300.',
                'logo_small.dimensions' => 'The :attribute dimensions max be 200 X 200.',
                'favicon.max' => 'The :attribute size must be under 512kb.',
                'favicon.dimensions' => 'The :attribute dimensions must be 100 X 100.',
            ];

            $rules = [
                'name' => 'required|min:4|max:255',
                'short_name' => 'required|min:3|max:255',
                'logo' => 'mimes:jpeg,jpg,png|max:1024|dimensions:max_width=300,max_height=300',
                'logo_small' => 'mimes:jpeg,jpg,png|max:512|dimensions:max_width=200,max_height=200',
                'favicon' => 'mimes:png,ico|max:512|dimensions:min_width=32,min_height=32',
                'email' => 'nullable|email|max:255',
                'phone_no' => 'required|min:8|max:15',
                'address' => 'required|max:500',
            ];

            $this->validate($request, $rules, $messages);


            if($request->hasFile('logo')) {
                $storagepath = $request->file('logo')->store('public/logo');
                $fileName = basename($storagepath);
                $data['logo'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('oldLogo','');
                if( $oldFile != ''){
                    $file_path = "public/logo/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
                $data['logo'] = $request->get('oldLogo','');
            }

            if($request->hasFile('logo_small')) {
                $storagepath = $request->file('logo_small')->store('public/logo');
                $fileName = basename($storagepath);
                $data['logo_small'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('oldLogoSmall','');
                if( $oldFile != ''){
                    $file_path = "public/logo/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
                $data['logo_small'] = $request->get('oldLogoSmall','');
            }

            if($request->hasFile('favicon')) {
                $storagepath = $request->file('favicon')->store('public/logo');
                $fileName = basename($storagepath);
                $data['favicon'] = $fileName;

                //if file chnage then delete old one
                $oldFile = $request->get('oldFavicon','');
                if( $oldFile != ''){
                    $file_path = "public/logo/".$oldFile;
                    Storage::delete($file_path);
                }
            }
            else{
                $data['favicon'] = $request->get('oldFavicon','');
            }

            $data['name'] = $request->get('name');
            $data['short_name'] = $request->get('short_name');
            $data['email'] = $request->get('email');
            $data['phone_no'] = $request->get('phone_no');
            $data['address'] = $request->get('address');

            //now crate
            AppMeta::updateOrCreate(
                ['meta_key' => 'crm_settings'],
                ['meta_value' => json_encode($data)]
            );

            AppMeta::updateOrCreate(
                ['meta_key' => 'language'],
                ['meta_value' => $request->get('language', 'en')]
            );
           
            Cache::forget('app_settings');

            //now notify the admins about this record
            $msg = "Crm settings updated by ".auth()->user()->name;
            $nothing = AppHelper::sendNotificationToAdmins('info', $msg);
            // Notification end

            return redirect()->route('settings.crm')->with('success', 'Setting updated!');
        }

        //for get request
        $settings = AppMeta::where('meta_key', 'crm_settings')->select('meta_key','meta_value')->first();
        $info = null;
        if($settings) {
            $info = json_decode($settings->meta_value);
        }


        $settings = AppMeta::select('meta_key','meta_value')->get();

        $metas = [];
        foreach ($settings as $setting){
            $metas[$setting->meta_key] = $setting->meta_value;
        }
   

       
        return view(
            'backend.settings.crm', compact(
                'info',
                'language',
                'metas'
            )
        );
    }



   

    /**
     * SMS Gateway settings  manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function smsGatewayIndex(Request $request)
    {
        //for save on POST request
        if ($request->isMethod('post')) {//
            $this->validate($request, [
                'hiddenId' => 'required|integer',
            ]);

            $gateway = AppMeta::findOrFail($request->get('hiddenId'));

            // now check is gateway currently used ??
            $stGateway = AppHelper::getAppSettings('student_attendance_gateway');
            $empGateway = AppHelper::getAppSettings('employee_attendance_gateway');
            if($gateway->id == $stGateway || $gateway->id == $empGateway){
                return redirect()->route('settings.sms_gateway.index')->with('error', 'Can not delete it because this gateway is being used.');
            }
            if($gateway->meta_key == "sms_gateway"){
                $gateway->delete();
            }

            return redirect()->route('settings.sms_gateway.index')->with('success', 'Gateway deleted!');
        }

        //for get request
        $smsGateways = AppMeta::where('meta_key','sms_gateway')->get();

        //if it is ajax request then send json response with formated data
        if($request->ajax()){
            $data = [];
            foreach ($smsGateways as $gateway){
                $json_data = json_decode($gateway->meta_value);
                $data[] = [
                    'id' => $gateway->id,
                    'text' => $json_data->name.'['.AppHelper::SMS_GATEWAY_LIST[$json_data->gateway].']',
                ];
            }

            return response()->json($data);
        }



        return view('backend.settings.smsgateway_list', compact('smsGateways'));
    }

    /**
     *  SMS Gateway settings   manage
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function smsGatewayCru(Request $request, $id=0)
    {
        //for save on POST request
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'gateway' => 'required|integer',
                'name' => 'required|min:4|max:255',
                'sender_id' => 'nullable',
                'user' => 'required|max:255',
                'password' => 'nullable|max:255',
                'api_url' => 'required',
            ]);


            $data = [
                'gateway' => $request->get('gateway',''),
                'name' => $request->get('name',''),
                'sender_id' => $request->get('sender_id',''),
                'user' => $request->get('user',''),
                'password' => $request->get('password',''),
                'api_url' => $request->get('api_url',''),
            ];


            AppMeta::updateOrCreate(
                ['id' => $id],
                [
                    'meta_key' => 'sms_gateway',
                    'meta_value' => json_encode($data)
                ]
            );
            $msg = "SMS Gateway ";
            $msg .= $id ? 'updated.' : 'added.';

            if($id){
                return redirect()->route('settings.sms_gateway.index')->with('success', $msg);
            }
            return redirect()->route('settings.sms_gateway.create')->with('success', $msg);
        }

        //for get request
        $gateways = AppHelper::SMS_GATEWAY_LIST;
        $gateway_id = null;
        $gateway = AppMeta::find($id);
        if($gateway) {
            $gateway_id = (json_decode($gateway->meta_value))->gateway;
        }

        return view('backend.settings.smsgateway_add', compact('gateways', 'gateway', 'gateway_id'));
    }


    /**
     * report settings  manage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function report(Request $request)
    {

        //for save on POST request
        if ($request->isMethod('post')) {

            //validate form
            $messages = [
            ];
            $rules = [
                'background_color' => 'nullable|max:255',
                'text_color' => 'nullable|max:255',
                'message' => 'nullable|max:1000',
                'message_expire_date' => 'nullable|min:10|max:11',

            ];
            $this->validate($request, $rules, $messages);


            //now crate
            if($request->has('show_logo')){
                AppMeta::updateOrCreate(
                    ['meta_key' => 'report_show_logo'],
                    ['meta_value' => 1]
                );
            }
            else{
                AppMeta::updateOrCreate(
                    ['meta_key' => 'report_show_logo'],
                    ['meta_value' => 0]
                );
            }

            AppMeta::updateOrCreate(
                ['meta_key' => 'report_background_color'],
                ['meta_value' => $request->get('background_color', '')]
            );

            AppMeta::updateOrCreate(
                ['meta_key' => 'report_text_color'],
                ['meta_value' => $request->get('text_color', '')]
            );

            AppMeta::updateOrCreate(
                ['meta_key' => 'report_pms_message'],
                ['meta_value' => trim($request->get('message', ''))]
            );

            AppMeta::updateOrCreate(
                ['meta_key' => 'report_pms_message_exp_date'],
                ['meta_value' => trim($request->get('message_expire_date', ''))]
            );

            Cache::forget('app_settings');

            //now notify the admins about this record
            $msg = "Report settings updated by ".auth()->user()->name;
            $nothing = AppHelper::sendNotificationToAdmins('info', $msg);
            // Notification end

            return redirect()->route('settings.report')->with('success', 'Report setting updated!');
        }

        //for get request
        $settings = AppMeta::where('meta_key', 'like', '%report_%')->select('meta_key','meta_value')->get();
        $metas = [];
        foreach ($settings as $setting){
            $metas[$setting->meta_key] = $setting->meta_value;
        }

        $show_logo  = $metas['report_show_logo'] ?? 0;

        return view('backend.settings.report', compact('metas','show_logo'));
    }


}
