<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rkpkgs\Userstamps\UserstampsTrait;
use Carbon\Carbon;
class Crmdata extends Model
{
    use SoftDeletes;
    use UserstampsTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique_code_contacts','partner_name','ph_one_delivery_week','ph_two_delivery_pcdcid','pcdcid','organization_name','legal_organization_name','address_city','city','state','pin_code','region','country','board_line','domain','industry_vertical','sub_vertical','micro_vertical','first_name','last_name','full_name','gender','designation','job_role','function_department','seniority_level','direct_number_extension_details','mobile_number_1','mobile_number_2','mobile_number_3','official_email_id','official_email_id_v1','email_status','personal_email_id','personal_email_status','email_id_3','email_id_3_status','bdm_contact','itdm_contact','it_practitioner','cloud_provider','email_tool_detail','contacts_profiled_status','turnover','employee_size','tbh_tagging','account_category','final_nal_cluster','cluster','priority','parent','gsuite_account_type','calling_remark','source_link','question_1','question_2','question_3','question_4','question_5','question_6','question_7','question_8','question_9','question_10','question_11','question_12','is_approved','upload_id','deletable'
    ];
	
	public function  getCreatedAtAttribute($value){
		return Carbon::parse($value)->format('d-M-Y');
	}
	
	public function industry()
    {
        return $this->hasOne('App\Industry','id','industry_vertical');
    }
	
	public function subvertical()
    {
        return $this->hasOne('App\SubIndustry','id','sub_vertical');
    }
	
	public function incomegroup()
    {
        return $this->hasOne('App\IncomeGroup','id','turnover');
    }


}
