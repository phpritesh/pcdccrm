<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commonPermissionList = [
            [
                "slug" => "change_password",
                "name" => "Change Password",
                "group" => "Common"
            ],
            [
                "slug" => "user.dashboard",
                "name" => "Dashboard",
                "group" => "Common"
            ],
            [
                "slug" => "lockscreen",
                "name" => "Lock Screen",
                "group" => "Common"
            ],
            [
                "slug" => "logout",
                "name" => "Logout",
                "group" => "Common"
            ],
            [
                "slug" => "profile",
                "name" => "Profile",
                "group" => "Common"
            ],
            [
                "slug" => "user.notification_unread",
                "name" => "Notification View",
                "group" => "Common"
            ],
            [
                "slug" => "user.notification_read",
                "name" => "Notification View",
                "group" => "Common"
            ],
            [
                "slug" => "user.notification_all",
                "name" => "Notification View",
                "group" => "Common"
            ]

        ];

      

        $onlyAdminPermissions = [
        
           //application settings
            [ "slug" => "settings.crm",
                "name" => "Crm Settings",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "settings.crm.update",
                "name" => "Crm Settings Update",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "user.role_index",
                "name" => "Role View",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "user.role_destroy",
                "name" => "Role Delete",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "user.role_create",
                "name" => "Role Create",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "user.role_store",
                "name" => "Role Create",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "user.role_update",
                "name" => "Role Edit",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "administrator.user_password_reset",
                "name" => "User Password Reset",
                "group" => "SuperAdmin Only"
            ],
            // mail / sms template
            [   "slug" => "administrator.template.mailsms.index",
                "name" => "Mail_and_SMS Template View",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "administrator.template.mailsms.create",
                "name" => "Mail_and_SMS Template Create",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "administrator.template.mailsms.store",
                "name" => "Mail_and_SMS Template Create",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "administrator.template.mailsms.edit",
                "name" => "Mail_and_SMS Template Edit",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "administrator.template.mailsms.update",
                "name" => "Mail_and_SMS Template Edit",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "administrator.template.mailsms.destroy",
                "name" => "Mail_and_SMS Template Delete",
                "group" => "SuperAdmin Only"
            ],
            //mail / sms end
    
            //sms gateway
            [   "slug" => "settings.sms_gateway.index",
                "name" => "SMS Gateway View",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "settings.sms_gateway.create",
                "name" => "SMS Gateway Create",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "settings.sms_gateway.store",
                "name" => "SMS Gateway Create",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "settings.sms_gateway.edit",
                "name" => "SMS Gateway Edit",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "settings.sms_gateway.update",
                "name" => "SMS Gateway Edit",
                "group" => "SuperAdmin Only"
            ],
            [   "slug" => "settings.sms_gateway.destroy",
                "name" => "SMS Gateway Delete",
                "group" => "SuperAdmin Only"
            ],
			
			
   
        ];

       
		
		 $crmUsersPermissionList = [


            [   "slug" => "crm.report",
                "name" => "Crm Report View",
                "group" => "Crm Users"
            ],
            [   "slug" => "crm.report.download",
                "name" => "Crm Report Download",
                "group" => "Crm Users"
            ],
            
            [   "slug" => "user.index",
                "name" => "User View",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.create",
                "name" => "User Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.store",
                "name" => "User Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.status",
                "name" => "User Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.show",
                "name" => "User View",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.update",
                "name" => "User Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.destroy",
                "name" => "User Delete",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.edit",
                "name" => "User Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "user.permission",
                "name" => "User Edit",
                "group" => "Crm Users"
            ],
           
            //Crm Data
            [
                "slug" => "CrmData.list",
                "name" => "Crm Data List",
                "group" => "Crm Users"
            ],
           
            [
                "slug" => "CrmData.create",
                "name" => "Crm Data Create",
                "group" => "Crm Users"
            ],
             [
                "slug" => "CrmData.store",
                "name" => "Crm Data Create",
                "group" => "Crm Users"
            ],
            [
                "slug" => "CrmData.edit",
                "name" => "Crm Data Edit",
                "group" => "Crm Users"
            ],
            [
                "slug" => "CrmData.update",
                "name" => "Crm Data Edit",
                "group" => "Crm Users"
            ],
			 [
                "slug" => "CrmData.view",
                "name" => "Crm Data View",
                "group" => "Crm Users"
            ],
			[
                "slug" => "CrmData.destroy",
                "name" => "Crm Data Delete",
                "group" => "Crm Users"
            ],
			[
                "slug" => "CrmData.assign",
                "name" => "Crm Data Assign Approve",
                "group" => "Crm Users"
            ],
            [
                "slug" => "CrmData.assignrequest",
                "name" => "Crm Data Assign Request",
                "group" => "Crm Users"
            ],
            [
                "slug" => "CrmData.assignrequestlist",
                "name" => "Crm Data Assign List",
                "group" => "Crm Users"
            ],
            [
                "slug" => "CrmData.download",
                "name" => "Crm Data Download",
                "group" => "Crm Users"
            ],

             //Data Import
            [   "slug" => "dataimport.index",
                "name" => "Data Import List",
                "group" => "Crm Users"
            ],
            [   "slug" => "dataimport.create",
                "name" => "Data Import Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "dataimport.store",
                "name" => "Data Import Create",
                "group" => "Crm Users"
            ],
           
            [   "slug" => "dataimport.destroy",
                "name" => "Data Import Delete",
                "group" => "Crm Users"
            ],

             //Qc Data List
            [   "slug" => "qcdata.bulkimport",
                "name" => "Qc Data Import",
                "group" => "Crm Users"
            ],
            [   "slug" => "qcdata.bulkstore",
                "name" => "Qc Data Import",
                "group" => "Crm Users"
            ],
            [   "slug" => "qcdata.index",
                "name" => "Qc Data List",
                "group" => "Crm Users"
            ],
            [   "slug" => "qcdata.create",
                "name" => "Qc Data Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "qcdata.store",
                "name" => "Qc Data Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "qcdata.view",
                "name" => "Qc Data View",
                "group" => "Crm Users"
            ],
            [   "slug" => "qcdata.approve",
                "name" => "Qc Data Approve",
                "group" => "Crm Users"
            ],
           
            [   "slug" => "dataimport.destroy",
                "name" => "Data Import Delete",
                "group" => "Crm Users"
            ],
            // Industry

            [   "slug" => "industry.index",
                "name" => "industry List",
                "group" => "Crm Users"
            ],
            [   "slug" => "industry.create",
                "name" => "industry Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "industry.store",
                "name" => "industry Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "industry.update",
                "name" => "industry Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "industry.edit",
                "name" => "industry Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "industry.destroy",
                "name" => "industry Delete",
                "group" => "Crm Users"
            ],

            //sub industry

             [   "slug" => "subindustry.index",
                "name" => "SubIndustry List",
                "group" => "Crm Users"
            ],
            [   "slug" => "subindustry.create",
                "name" => "SubIndustry Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "subindustry.store",
                "name" => "SubIndustry Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "subindustry.update",
                "name" => "SubIndustry Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "subindustry.edit",
                "name" => "SubIndustry Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "subindustry.destroy",
                "name" => "SubIndustry Delete",
                "group" => "Crm Users"
            ],

            //Income Group

             [   "slug" => "incomegroup.index",
                "name" => "IncomeGroup List",
                "group" => "Crm Users"
            ],
            [   "slug" => "incomegroup.create",
                "name" => "IncomeGroup Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "incomegroup.store",
                "name" => "IncomeGroup Create",
                "group" => "Crm Users"
            ],
            [   "slug" => "incomegroup.update",
                "name" => "IncomeGroup Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "incomegroup.edit",
                "name" => "IncomeGroup Edit",
                "group" => "Crm Users"
            ],
            [   "slug" => "incomegroup.destroy",
                "name" => "IncomeGroup Delete",
                "group" => "Crm Users"
            ],



            
        ];




         



        //merge all permissions and insert into db
        $permissions = array_merge($commonPermissionList, $onlyAdminPermissions,
            $crmUsersPermissionList);

        echo PHP_EOL , 'seeding permissions...';

        Permission::insert($permissions);


        echo PHP_EOL , 'seeding role permissions...', PHP_EOL;
        //now add admin role permissions
        $admin = Role::where('name', 'SuperAdmin')->first();
        $permissions = Permission::get();
        $admin->permissions()->saveMany($permissions);

        //now add other roles common permissions
        $slugs = array_map(function ($permission){
            return $permission['slug'];
        }, $commonPermissionList);

        $permissions = Permission::whereIn('slug', $slugs)->get();

        $roles = Role::where('name', '!=', 'SuperAdmin')->get();
        foreach ($roles as $role){
            echo 'seeding '.$role->name.' permissions...', PHP_EOL;
            $role->permissions()->saveMany($permissions);
        }



    }
}
