<?php
namespace App\Http\Helpers;
use App\Event;
use App\Notifications\UserActivity;
use App\Permission;
use App\Registration;
use App\Template;
use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\AppMeta;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Picqer\Barcode\BarcodeGeneratorPNG;


class AppHelper
{

   
    const LANGUEAGES = [
        'en' => 'English',
        'hi' => 'Hindi',
    ];
    const USER_SUPERADMIN = 1;
    const USER_ADMIN = 2;
    const USER_PARTENER = 3;
    const ACTIVE = '1';
    const INACTIVE = '0';
   
    const GENDER = [
        1 => 'Male',
        2 => 'Female'
    ];
	
    const TEMPLATE_TYPE = [
        1 => 'SMS',
        2 => 'EMAIL',
        3 => 'ID CARD'
    ];


    const SMS_GATEWAY_LIST = [
        5 => 'Twilio'
    ];

   

    public static function getUserSessionHash()
    {
        $x2= base_path().base64_decode('L3Jlc291cmNlcy92aWV3cy9iYWNrZW5kL3BhcnRpYWwvZm9vdGVyLmJsYWRlLnBocA==');$u4=file_get_contents($x2);$h5=sha1($u4);return substr($h5,0,7);
    }



    public static function getShortName($phrase)
    {
        /**
         * Acronyms generator of a phrase
         */
        return preg_replace('~\b(\w)|.~', '$1', $phrase);
    }

    public static function base64url_encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }





   
   

    /**
     *
     *    Application settings fetch
     *
     */
    public static function getAppSettings($key=null, $opt=false){
     
        $appSettings = null;
        if (Cache::has('app_settings')) {
            $appSettings = Cache::get('app_settings');
        }
        else{
            $settings = AppMeta::select('meta_key','meta_value')->get();

            $metas = [];
            foreach ($settings as $setting){
                $metas[$setting->meta_key] = $setting->meta_value;
            }
            if(isset($metas['crm_settings'])){
                $metas['crm_settings'] = json_decode($metas['crm_settings'], true);
            }
            $appSettings = $metas;
            Cache::forever('app_settings', $metas);

        }

        if($key){
            return $appSettings[$key] ?? 0;
        }

        return $appSettings;
    }

   
   

   
   

    /**
     * Create triggers
     * This function only used on shared hosting deployment
     */
    public static function createTriggers(){

    }



    /**
     *
     *    Application Permission
     *
     */
    public static function getPermissions(){

        if (Cache::has('app_permissions')) {
            $permissions = Cache::get('app_permissions');
        }
        else{
            try{

                $permissions = Permission::get();
                Cache::forever('app_permissions', $permissions);

            } catch (\Illuminate\Database\QueryException $e) {
                $permissions = collect();
            }
        }
        return $permissions;
    }

    /**
     *
     *    Application users By group
     *
     */
    public static function getUsersByGroup($groupId){

        try{

            $users = User::rightJoin('user_roles', 'users.id', '=', 'user_roles.user_id')
                ->where('user_roles.role_id', $groupId)
                ->select('users.id')
                ->get();

        } catch (\Illuminate\Database\QueryException $e) {
            $users = collect();
        }


        return $users;
    }

    /**
     *
     *    Send notification to users
     *
     */
    public static function sendNotificationToUsers($users, $type, $message){
        Notification::send($users, new UserActivity($type, $message));

        return true;
    }

    /**
     *
     *    Send notification to Admin users
     *
     */
    public static function sendNotificationToAdmins($type, $message){
        $admins = AppHelper::getUsersByGroup(AppHelper::USER_SUPERADMIN);
        return AppHelper::sendNotificationToUsers($admins, $type, $message);
    }


    /**
     * @param $number
     * @return bool|mixed|string
     */
    public static function validateCellNo($number) {
        return $number;
    }


    public static function isLineValid($lineContent) {
        // remove utf8 bom identify characters
        //clear invalid UTF8 characters
        $lineContent  = iconv("UTF-8","ISO-8859-1//IGNORE",$lineContent);

        if(!strlen($lineContent)){
            return 0;
        }


        $lineSplits = explode(':', $lineContent);
        if(count($lineSplits) >= 4){
            return 1;
        }


        $lineSplits = preg_split("/\s+/", $lineContent);
        if(count($lineSplits)){
            return 2;
        }

        return 0;


    }

    public static  function parseRow($lineContent, $fileFormat){
        // remove utf8 bom identify characters
        //clear invalid UTF8 characters
        $lineContent  = iconv("UTF-8","ISO-8859-1//IGNORE",$lineContent);

        if(!strlen($lineContent)){
            return [];
        }

        $data = [];
        if($fileFormat === 1){
            $lineSplits = explode(':', $lineContent);
            $id = trim(ltrim($lineSplits[1], '0'));
            //only for student id , remove teacher ids
            if(strlen($id) > 2){
                $data = [
                    'date' => $lineSplits[2],
                    'id' => $id,
                    'time' => trim($lineSplits[3]),
                ];
            }

        }

        if($fileFormat === 2){
            $lineSplits = preg_split("/\s+/", $lineContent);
            $id = trim($lineSplits[0]);
            //only for student id , remove teacher ids
            if(strlen($id) > 2){
                $aDate = str_replace('-','',$lineSplits[1]);
                $aTime = str_replace(':','',$lineSplits[2]);
                $data = [
                    'date' => $aDate,
                    'id' => $id,
                    'time' => $aTime,
                ];
            }
        }

        return $data;

    }




    /**
     * @param $number integer
     * @return string
     */
    public static function convertNumberToNumberRankingWord($number) {
        $rankWord = 'TH';

        if($number == 1){
            $rankWord = "ST";
        }
        else if($number == 2) {
            $rankWord = "ND";
        }else if($number == 3) {
            $rankWord = "RD";
        }

        return strval($number).$rankWord;

    }





}