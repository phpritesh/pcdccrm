<?php

namespace App\Imports;

use App\Crmdata;
use App\Industry;
use App\SubIndustry;
use App\IncomeGroup;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithStartRow;
class CrmdatasImport implements  ToModel,WithHeadingRow,WithStartRow,WithValidation
{
	

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 3;
    }

    public function rules(): array
    {
        return [
            '0' => 'unique:unique_code_contacts',
        ];
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
		$industry = Industry::where('name','like', '%'.$row['industry_vertical'].'%')->first();
		$industryid = $industry ? $industry->id : NULL;
		$row['industry_vertical'] = $industryid;
		
		$sub_vertical = SubIndustry::where('name','like', '%'.$row['sub_vertical'].'%')->first();
		$sub_verticalid = $sub_vertical ? $sub_vertical->id : NULL;
		$row['sub_vertical'] = $sub_verticalid;
		
		$turnover = IncomeGroup::where('name','like', '%'.$row['turnover'].'%')->first();
		$turnoverid = $turnover ? $turnover->id : NULL;
		$row['turnover'] = $turnoverid;
/* 		
		echo "<pre>";
		print_r($row);
		echo "</pre>"; exit; */

		 $masterid = session('masterimport_id',0);
         $isuniq = Crmdata::where('unique_code_contacts','like', '%'.$row['unique_code_contacts'].'%')->first();
		 if($isuniq){
			  session()->push('import_fails_row', $row['unique_code_contacts']);
			
		 }else{
			 session()->push('import_success_row', $row['unique_code_contacts']);
          return new Crmdata([
           'unique_code_contacts'     => $row['unique_code_contacts'],
           'partner_name'    => $row['partner_name'], 
           'ph_one_delivery_week' => $row['ph_one_delivery_week'],
		   'ph_two_delivery_pcdcid' => $row['ph_two_delivery_pcdcid'],
		   'pcdcid' => $row['pcdcid'],
		   'organization_name' => $row['organization_name'],
		   'legal_organization_name' => $row['legal_organization_name'],
		   'address_city' => $row['address_city'],
		   'city' => $row['city'],
		   'state' => $row['state'],
		   'pin_code' => $row['pin_code'],
		   'region' => $row['region'],
		   'country' => $row['country'],
		   'board_line' => $row['board_line'],
		   'domain' => $row['domain'],
		   'industry_vertical' => $row['industry_vertical'],
		   'sub_vertical' => $row['sub_vertical'],
		   'micro_vertical' => $row['micro_vertical'],
		   'first_name' => $row['first_name'],
		   'last_name' => $row['last_name'],
		   'gender' => $row['gender'],
		   'designation' => $row['designation'],
		   'job_role' => $row['job_role'],
		   'function_department' => $row['function_department'],
		   'seniority_level' => $row['seniority_level'],
		   'direct_number_extension_details' => $row['direct_number_extension_details'],
		   'mobile_number_1' => $row['mobile_number_1'],
		   'mobile_number_2' => $row['mobile_number_2'],
		   'mobile_number_3' => $row['mobile_number_3'],
		   'official_email_id' => $row['official_email_id'],
		   'official_email_id_v1' => $row['official_email_id_v1'],
		   'email_status' => $row['email_status'],
		   'personal_email_id' => $row['personal_email_id'],
		   'personal_email_status' => $row['personal_email_status'],
		   'email_id_3' => $row['email_id_3'],
		   'meail_id_3_status' => $row['meail_id_3_status'],
		   'bdm_contact' => $row['bdm_contact'],
		   'itdm_contact' => $row['itdm_contact'],
		   'it_practitioner' => $row['it_practitioner'],
		   'cloud_provider' => $row['cloud_provider'],
		   'email_tool_detail' => $row['email_tool_detail'],
		   'contacts_profiled_status' => $row['contacts_profiled_status'],
		   'turnover' => $row['turnover'],
		   'employee_size' => $row['employee_size'],
		   'tbh_tagging' => $row['tbh_tagging'],
		   'account_category' => $row['account_category'],
		   'final_nal_cluster' => $row['final_nal_cluster'],
		   'cluster' => $row['cluster'],
		   'priority' => $row['priority'],
		   'parent' => $row['parent'],
		   'gsuite_account_type' => $row['gsuite_account_type'],
		   'calling_remark' => $row['calling_remark'],
		   'source_link' => $row['source_link'],
		   'question_1' => $row['question_1'],
		   'question_2' => $row['question_2'],
		   'question_3' => $row['question_3'],
		   'question_4' => $row['question_4'],
		   'question_5' => $row['question_5'],
		   'question_6' => $row['question_6'],
		   'question_7' => $row['question_7'],
		   'question_8' => $row['question_8'],
		   'question_9' => $row['question_9'],
		   'question_10' => $row['question_10'],
		   'question_11' => $row['question_11'],
		   'question_12' => $row['question_12'],
		    'upload_id' => $masterid,
		    //'is_approved' => 0,
        ]); 
		 }
    }
}
