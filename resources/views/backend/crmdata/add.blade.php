<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') User @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
        <h1>
            Crm Data
            <small>Add</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{URL::route('CrmData.list')}}"><i class="fa icon-user"></i> Crm Data List</a></li>
            <li class="active">Add</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form  id="add-crmdata" action="{{URL::Route('CrmData.store')}}" data-url="{{URL::Route('CrmData.store')}}" method="post" enctype="multipart/form-data">
                       
                        <div class="box-body">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Unique Code Contacts<span class="text-danger">*</span></label>
                                        <input  type="text" class="form-control" name="unique_code_contacts" label-name="Unique Code Contacts" placeholder="Unique Code Contacts"  required >
                                        <span class="text-danger">{{ $errors->first('unique_code_contacts') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Partner Name</label>
                                        <input  type="text" class="form-control" name="partner_name" placeholder="Partner Name"   >
                                        <span class="text-danger">{{ $errors->first('partner_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">PH 1 - Delivery Week</label>
                                        <input  type="text" class="form-control" name="ph_one_delivery_week" placeholder="PH 1 - Delivery Week"   >
                                        <span class="text-danger">{{ $errors->first('ph_one_delivery_week') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Phase II - Delivery	PCDCID</label>
                                        <input  type="text" class="form-control" name="ph_two_delivery_pcdcid" placeholder="Phase II - Delivery	PCDCID"   >
                                        <span class="text-danger">{{ $errors->first('ph_two_delivery_pcdcid') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">PCDCID</label>
                                        <input  type="text" class="form-control" name="pcdcid" placeholder="PCDCID"   >
                                        <span class="text-danger">{{ $errors->first('pcdcid') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Organization Name</label>
                                        <input  type="text" class="form-control" name="organization_name" placeholder="Organization Name"   >
                                        <span class="text-danger">{{ $errors->first('organization_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Legal Organization Name</label>
                                        <input  type="text" class="form-control" name="legal_organization_name" placeholder="Legal Organization Name"   >
                                        <span class="text-danger">{{ $errors->first('legal_organization_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Address City</label>
                                        <input  type="text" class="form-control" name="address_city" placeholder="Address City"   >
                                        <span class="text-danger">{{ $errors->first('address_city') }}</span>
                                    </div>
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">City</label>
                                        <input  type="text" class="form-control" name="city" placeholder="City"   >
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">State</label>
                                        <input  type="text" class="form-control" name="state" placeholder="State"   >
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Pin Code</label>
                                        <input  type="text" class="form-control" name="pin_code" placeholder="Pin Code"   >
                                        <span class="text-danger">{{ $errors->first('pin_code') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Region</label>
                                        <input  type="text" class="form-control" name="region" placeholder="Region"   >
                                        <span class="text-danger">{{ $errors->first('region') }}</span>
                                    </div>
                                </div>
                            </div>


<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Country</label>
                                        <input  type="text" class="form-control" name="country" placeholder="Country"   >
                                        <span class="text-danger">{{ $errors->first('country') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Board Line</label>
                                        <input  type="text" class="form-control" name="board_line" placeholder="Board Line"   >
                                        <span class="text-danger">{{ $errors->first('board_line') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Domain</label>
                                        <input  type="text" class="form-control" name="domain" placeholder="Domain"   >
                                        <span class="text-danger">{{ $errors->first('domain') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Industry Vertical</label>
                                       {!! Form::select('industry_vertical', $industry, '' , ['placeholder' => 'Pick Industry Vertical','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="text-danger">{{ $errors->first('industry_vertical') }}</span>
                                    </div>
                                </div>
                            </div>



<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Sub Vertical</label>
                                       {!! Form::select('sub_vertical', $sub_vertical, '' , ['placeholder' => 'Pick Sub Vertical','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="text-danger">{{ $errors->first('sub_vertical') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Micro Vertical</label>
                                        <input  type="text" class="form-control" name="micro_vertical" placeholder="Micro Vertical"   >
                                        <span class="text-danger">{{ $errors->first('micro_vertical') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input  type="text" class="form-control" name="first_name" placeholder="First Name"   >
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Last Name</label>
                                        <input  type="text" class="form-control" name="last_name" placeholder="Last Name"   >
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    </div>
                                </div>
                            </div>


<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input  type="text" class="form-control" name="full_name" placeholder="Full Name"   >
                                        <span class="text-danger">{{ $errors->first('full_name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Gender</label>
                                        <input  type="text" class="form-control" name="gender" placeholder="Gender"   >
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Designation</label>
                                        <input  type="text" class="form-control" name="designation" placeholder="Designation"   >
                                        <span class="text-danger">{{ $errors->first('designation') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Job Role</label>
                                        <input  type="text" class="form-control" name="job_role" placeholder="Job Role"   >
                                        <span class="text-danger">{{ $errors->first('job_role') }}</span>
                                    </div>
                                </div>
                            </div>


<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Function Department</label>
                                        <input  type="text" class="form-control" name="function_department" placeholder="Function Department"   >
                                        <span class="text-danger">{{ $errors->first('function_department') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Seniority level</label>
                                        <input  type="text" class="form-control" name="seniority_level" placeholder="Seniority level"   >
                                        <span class="text-danger">{{ $errors->first('seniority_level') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Direct Number / Extension Details</label>
                                        <input  type="text" class="form-control" name="direct_number_extension_details" placeholder="Direct Number / Extension Details"   >
                                        <span class="text-danger">{{ $errors->first('direct_number_extension_details') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Mobile Number 1</label>
                                        <input  type="text" class="form-control" name="mobile_number_1" placeholder="Mobile Number 1"   >
                                        <span class="text-danger">{{ $errors->first('mobile_number_1') }}</span>
                                    </div>
                                </div>
                            </div>


<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Mobile Number 2</label>
                                        <input  type="text" class="form-control" name="mobile_number_2" placeholder="Mobile Number 2"   >
                                        <span class="text-danger">{{ $errors->first('mobile_number_2') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Mobile Number 3</label>
                                        <input  type="text" class="form-control" name="mobile_number_3" placeholder="Mobile Number 3"   >
                                        <span class="text-danger">{{ $errors->first('mobile_number_3') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Official Email id</label>
                                        <input  type="text" class="form-control" name="official_email_id" placeholder="Official Email id"   >
                                        <span class="text-danger">{{ $errors->first('official_email_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Official Email id V1</label>
                                        <input  type="text" class="form-control" name="official_email_id_v1" placeholder="Official Email id V1"   >
                                        <span class="text-danger">{{ $errors->first('official_email_id_v1') }}</span>
                                    </div>
                                </div>
								
                            </div>


<div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Email Status</label>
                                        <input  type="text" class="form-control" name="email_status" placeholder="Email Status"   >
                                        <span class="text-danger">{{ $errors->first('email_status') }}</span>
                                    </div>
                                </div>
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Personal Email id</label>
                                        <input  type="text" class="form-control" name="personal_email_id" placeholder="Personal Email id"   >
                                        <span class="text-danger">{{ $errors->first('personal_email_id') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Personal Email Status</label>
                                        <input  type="text" class="form-control" name="personal_email_status" placeholder="Personal Email Status"   >
                                        <span class="text-danger">{{ $errors->first('personal_email_status') }}</span>
                                    </div>
                                </div>
								   <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Email id 3</label>
                                        <input  type="text" class="form-control" name="email_id_3" placeholder="Email id 3"   >
                                        <span class="text-danger">{{ $errors->first('email_id_3') }}</span>
                                    </div>
                                </div>
                               
								
                            </div>


<div class="row">
 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Email id 3 Status</label>
                                        <input  type="text" class="form-control" name="email_id_3_status" placeholder="Email id 3 Status"   >
                                        <span class="text-danger">{{ $errors->first('email_id_3_status') }}</span>
                                    </div>
                                </div>
                             
                               
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">BDM Contact</label>
                                        <input  type="text" class="form-control" name="bdm_contact" placeholder="BDM Contact"   >
                                        <span class="text-danger">{{ $errors->first('bdm_contact') }}</span>
                                    </div>
                                </div>
								 <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">ITDM Contact</label>
                                        <input  type="text" class="form-control" name="itdm_contact" placeholder="ITDM Contact"   >
                                        <span class="text-danger">{{ $errors->first('itdm_contact') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">IT Practitioner</label>
                                        <input  type="text" class="form-control" name="it_practitioner" placeholder="IT Practitioner"   >
                                        <span class="text-danger">{{ $errors->first('it_practitioner') }}</span>
                                    </div>
                                </div>
                            </div>


<div class="row">
                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Cloud Provider</label>
                                        <input  type="text" class="form-control" name="cloud_provider" placeholder="Cloud Provider"   >
                                        <span class="text-danger">{{ $errors->first('cloud_provider') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Email Tool Detail</label>
                                        <input  type="text" class="form-control" name="email_tool_detail" placeholder="Email Tool Detail"   >
                                        <span class="text-danger">{{ $errors->first('email_tool_detail') }}</span>
                                    </div>
                                </div>
								<div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Contacts Profiled Status</label>
                                        <input  type="text" class="form-control" name="contacts_profiled_status" placeholder="Contacts Profiled Status"   >
                                        <span class="text-danger">{{ $errors->first('contacts_profiled_status') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Turnover</label>
                                        {!! Form::select('turnover', $incomegroup, '' , ['placeholder' => 'Pick Turnover','class' => 'form-control select2', 'required' => 'true']) !!}
                                        <span class="text-danger">{{ $errors->first('turnover') }}</span>
                                    </div>
                               </div>
                            </div>
							
							
							<div class="row">
							
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Employee Size</label>
                                        <input  type="text" class="form-control" name="employee_size" placeholder="Employee Size"   >
                                        <span class="text-danger">{{ $errors->first('employee_size') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">TBH Tagging</label>
                                        <input  type="text" class="form-control" name="tbh_tagging" placeholder="TBH Tagging"   >
                                        <span class="text-danger">{{ $errors->first('tbh_tagging') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Account Category</label>
                                        <input  type="text" class="form-control" name="account_category" placeholder="Account Category"   >
                                        <span class="text-danger">{{ $errors->first('account_category') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Final NAL Cluster</label>
                                        <input  type="text" class="form-control" name="final_nal_cluster" placeholder="Final NAL Cluster"   >
                                        <span class="text-danger">{{ $errors->first('final_nal_cluster') }}</span>
                                    </div>
                               </div>
                            </div>
							
									<div class="row">
							
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Cluster</label>
                                        <input  type="text" class="form-control" name="cluster" placeholder="Cluster"   >
                                        <span class="text-danger">{{ $errors->first('cluster') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Priority</label>
                                        <input  type="text" class="form-control" name="priority" placeholder="Priority"   >
                                        <span class="text-danger">{{ $errors->first('priority') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Parent</label>
                                        <input  type="text" class="form-control" name="parent" placeholder="Parent"   >
                                        <span class="text-danger">{{ $errors->first('parent') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">GSuite Account Type</label>
                                        <input  type="text" class="form-control" name="gsuite_account_type" placeholder="GSuite Account Type"   >
                                        <span class="text-danger">{{ $errors->first('gsuite_account_type') }}</span>
                                    </div>
                               </div>
                            </div>
							
									<div class="row">
							
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Calling Remark</label>
                                        <input  type="text" class="form-control" name="calling_remark" placeholder="Calling Remark"   >
                                        <span class="text-danger">{{ $errors->first('calling_remark') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-3">
                                   <div class="form-group">
                                        <label for="name">Source Link</label>
                                        <input  type="text" class="form-control" name="source_link" placeholder="Source Link"   >
                                        <span class="text-danger">{{ $errors->first('source_link') }}</span>
                                    </div>
                               </div>
                            </div>
							
						<div class="row">
							<div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">1. Where are you currently hosting your applications – On premises / Cloud. (if on Cloud), May I know the cloud provider (Platform) name.</label>
                                        <textarea class="form-control" name="question_1" placeholder="question 1"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_1') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">2 . Have you virtualized the IT landscape in your organization, (if yes, capture the vendor name e.g. – VMware, Citrix, Microsoft)</label>
                                        <textarea class="form-control" name="question_2" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_2') }}</span>
                                    </div>
                               </div>
							    </div>
							
							<div class="row">
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">3. Operating system on which your organization’s servers are being run, e.g., Windows / SQL </label>
                                        <textarea class="form-control" name="question_3" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_3') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">4. Are there any plans for any Hardware refresh?</label>
                                        <textarea class="form-control" name="question_4" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_4') }}</span>
                                    </div>
                               </div>
                            </div>
							
							
							<div class="row">
							<div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">5. What are the databases on which the applications are being run?</label>
                                        <textarea class="form-control" name="question_5" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_5') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">6. What SaaS applications have you implemented (HR, CRM, Biz Apps)</label>
                                        <textarea class="form-control" name="question_6" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_6') }}</span>
                                    </div>
                               </div>
							    </div>
							
							<div class="row">
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">7. Which ERP application do you use</label>
                                        <textarea class="form-control" name="question_7" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_7') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">8. Have you set up a Disaster Recovery Site?</label>
                                        <textarea class="form-control" name="question_8" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_8') }}</span>
                                    </div>
                               </div>
                            </div>
							
							<div class="row">
							<div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">9. Are you using any Data Analytics / Business Intelligence solutions? E.g. – Oracle, IBM Cognos, Google Analytics</label>
                                        <textarea class="form-control" name="question_9" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_9') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">10. Which Email tool is being used in your organization. E.g. – Google workspace, Lotus Notes, MS Exchange, Office 365, Zimbra.</label>
                                        <textarea class="form-control" name="question_10" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_10') }}</span>
                                    </div>
                               </div>
							    </div>
							
							<div class="row">
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">11. Which collaboration tools and video conferencing solutions are being used by your organization for internal and customer meetings and conducting marketing webinars. </label>
                                        <textarea class="form-control" name="question_11" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_11') }}</span>
                                    </div>
                               </div>
							   <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="name">12. How are you giving remote access to your employees to facilitate Work from Home? Do they have a Virtual Desktop Interface -VDI solution? (e.g. Citrix, VM Ware, Netapp, Cisco etc – (If Yes, Capture the name)</label>
                                        <textarea class="form-control" name="question_12" placeholder="Enter question"   ></textarea>
                                        <span class="text-danger">{{ $errors->first('question_12') }}</span>
                                    </div>
                               </div>
                            </div>
							
							
							
						
							
							


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="{{URL::route('CrmData.list')}}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right submit-btn"><i class="fa fa-plus-circle"></i>Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function () {
            Crmdata.Init();
        });
    </script>
@endsection
<!-- END PAGE JS-->
