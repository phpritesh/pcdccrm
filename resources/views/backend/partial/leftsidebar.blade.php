
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <section class="sidebar">
    <!-- sidebar menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="{{ URL::route('user.dashboard') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
     
	  
	 <li class="treeview">
        <a href="#">
         <i class="fa fa-university" aria-hidden="true"></i>
          <span>Data Management</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
		  @can('CrmData.list')
            <li>
              <a href="{{ URL::route('CrmData.list') }}">
                <i class="fa fa-cubes"></i> <span>Crm Data List </span>
              </a>
            </li>
          @endcan
		  
		    @can('CrmData.assignrequestlist')
            <li>
              <a href="{{ URL::route('CrmData.assignrequestlist') }}">
                <i class="fa fa-cubes"></i> <span>Data Assign Request List</span>
              </a>
            </li>
          @endcan
          @can('dataimport.index')
            <li>
              <a href="{{ URL::route('dataimport.index') }}">
                <i class="fa fa-cubes"></i> <span>Data Import List </span>
              </a>
            </li>
          @endcan
		  
		   @can('dataimport.create')
            <li>
              <a href="{{ URL::route('dataimport.create') }}">
                <i class="fa fa-cubes"></i> <span>Data Import </span>
              </a>
            </li>
          @endcan
		  
		 
        </ul>
      </li>
     
    
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user-secret"></i>
          <span>Administrator</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        @can('user.index')
        <li>
          <a href="{{ URL::route('user.index') }}">
            <i class="fa fa-users"></i> <span>Users</span>
          </a>
        </li>
        @endcan
        
        </ul>
      </li>
   
     
        
      



      @role('SuperAdmin')
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i>
          <span>Settings</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li>
            <a href="{{ URL::route('settings.crm') }}">
              <i class="fa fa-building"></i> <span>CRM</span>
            </a>
          </li>
        
          <li>
            <a href="{{route('administrator.user_password_reset')}}">
              <i class="fa fa-eye-slash"></i> <span>Reset User Password</span>
            </a>
          </li>
          <li>
            <a href="{{URL::route('user.role_index')}}">
              <i class="fa fa-users"></i> <span>Role</span>
            </a>
          </li>

         
        </ul>
      </li>
      @endrole
	  
	  
	   <li class="treeview">
        <a href="#">
         <i class="fa fa-university" aria-hidden="true"></i>
          <span>Masters Management</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          @can('industry.index')
            <li>
              <a href="{{ URL::route('industry.index') }}">
                <i class="fa fa-cubes"></i> <span>Industry </span>
              </a>
            </li>
          @endcan
		  
		   @can('subindustry.index')
            <li>
              <a href="{{ URL::route('subindustry.index') }}">
                <i class="fa fa-cubes"></i> <span>Sub Industry </span>
              </a>
            </li>
          @endcan
		  
		   @can('incomegroup.index')
            <li>
              <a href="{{ URL::route('incomegroup.index') }}">
                <i class="fa fa-cubes"></i> <span>Income Group </span>
              </a>
            </li>
          @endcan
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
