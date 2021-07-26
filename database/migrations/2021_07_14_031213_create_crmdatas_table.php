<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrmdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crmdatas', function (Blueprint $table) {
				$table->increments('id');
				$table->string('unique_code_contacts')->unique()->comment('Unique Code Contacts');
				$table->string('partner_name')->nullable()->comment('Partner Name');
				$table->string('ph_one_delivery_week')->nullable()->comment('PH 1 - Delivery Week');
				$table->string('ph_two_delivery_pcdcid')->nullable()->comment('Phase II - Delivery	PCDCID');		
                $table->string('pcdcid')->nullable()->comment('PCDCID');
				$table->string('organization_name')->nullable()->comment('Organization Name');
				$table->string('legal_organization_name')->nullable()->comment('Legal Organization Name');
				$table->string('address_city')->nullable()->comment('Address City');
				$table->string('city')->nullable()->comment('City');
				$table->string('state')->nullable()->comment('State');
				$table->string('pin_code')->nullable()->comment('Pin Code');
				$table->string('region')->nullable()->comment('Region');
				$table->string('country')->nullable()->comment('Country');
				$table->string('board_line')->nullable()->comment('Board Line');
				$table->string('domain')->nullable()->comment('Domain');
				$table->string('industry_vertical')->nullable()->comment('Industry Vertical');
				$table->string('sub_vertical')->nullable()->comment('Sub Vertical');
				$table->string('micro_vertical')->nullable()->comment('Micro Vertical');
				$table->string('first_name')->nullable()->comment('First Name');
				$table->string('last_name')->nullable()->comment('Last Name');
				$table->string('full_name')->nullable()->comment('Full Name');
				$table->string('gender')->nullable()->comment('Gender');
				$table->string('designation')->nullable()->comment('Designation');
				$table->string('job_role')->nullable()->comment('Job Role');
				$table->string('function_department')->nullable()->comment('Function Department');
				$table->string('seniority_level')->nullable()->comment('Seniority level');
				$table->string('direct_number_extension_details')->nullable()->comment('Direct Number / Extension Details');
				$table->string('mobile_number_1')->nullable()->comment('Mobile Number 1');
				$table->string('mobile_number_2')->nullable()->comment('Mobile Number 2');
				$table->string('mobile_number_3')->nullable()->comment('Mobile Number 3');
				$table->string('official_email_id')->nullable()->comment('Official Email id');
				$table->string('official_email_id_v1')->nullable()->comment('Official Email id V1');
				$table->string('email_status')->nullable()->comment('Email Status');
				$table->string('personal_email_id')->nullable()->comment('Personal Email id');
				$table->string('personal_email_status')->nullable()->comment('Personal Email Status');
				$table->string('email_id_3')->nullable()->comment('Email id 3');
				$table->string('email_id_3_status')->nullable()->comment('Email id 3 Status');
				$table->string('bdm_contact')->nullable()->comment('BDM Contact');
				$table->string('itdm_contact')->nullable()->comment('ITDM Contact');
				$table->string('it_practitioner')->nullable()->comment('IT Practitioner');
				$table->string('cloud_provider')->nullable()->comment('Cloud Provider');
				$table->string('email_tool_detail')->nullable()->comment('Email Tool Detail');
				$table->string('contacts_profiled_status')->nullable()->comment('Contacts Profiled Status');
				$table->string('turnover')->nullable()->comment('Turnover');
				$table->string('employee_size')->nullable()->comment('Employee Size'); 
				$table->string('tbh_tagging')->nullable()->comment('TBH Tagging');
				$table->string('account_category')->nullable()->comment('Account Category');
				$table->string('final_nal_cluster')->nullable()->comment('Final NAL Cluster');
				$table->string('cluster')->nullable()->comment('Cluster');
				$table->string('priority')->nullable()->comment('Priority'); 
				$table->string('parent')->nullable()->comment('Parent');
				$table->string('gsuite_account_type')->nullable()->comment('GSuite Account Type');
				$table->text('calling_remark')->nullable()->comment('Calling Remark');
				$table->text('source_link')->nullable()->comment('Source Link');
				$table->text('question_1')->nullable();
				$table->text('question_2')->nullable(); 
				$table->text('question_3')->nullable();
				$table->text('question_4')->nullable();
				$table->text('question_5')->nullable();
				$table->text('question_6')->nullable();
				$table->text('question_7')->nullable(); 
				$table->text('question_8')->nullable();
				$table->text('question_9')->nullable();
				$table->text('question_10')->nullable();
				$table->text('question_11')->nullable();
				$table->text('question_12')->nullable();
                $table->boolean('is_approved')->default(0);
				$table->integer('upload_id')->nullable(); 
				$table->timestamps();
				$table->softDeletes();
				$table->userstamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crmdatas');
    }
}
