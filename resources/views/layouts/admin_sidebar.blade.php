  <aside class="main-sidebar">
  
    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('upload/avatars/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info ">
                <p>{{ Auth::user()->name  }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>


      <ul class="sidebar-menu">


        <li class="header">MAIN NAVIGATION</li>

                <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            @if (auth::user()->role != 'admin')
                <li class="{{ Request::is('request') ? 'active' : '' }}"><a href="{{ url('request') }}"><i class="fa fa-ticket"></i> Academic Request</a></li>
            @else

                <li class="{{ Request::is('alumni') ? 'active' : '' }}"><a href="{{ url('alumni') }}"><i class="fa fa-users "></i> Alumni Request</a></li>

                <li class="{{ Request::is('activity') ? 'active' : '' }}"><a href="{{ url('activity') }}"><i class="fa fa-ticket"></i> Activities and Events</a></li>

                <li class="{{ Request::is('jobs') ? 'active' : '' }}"><a href="{{ url('jobs') }}"><i class="fa fa-briefcase"></i> Jobs</a></li>

                <li class="treeview">
                    <a href="{{ Request::is('report') ? 'active' : '' }}">
                        <i class="fa fa-bar-chart"></i>
                        <span>Reports</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li {{ Request::is('report/alumni') ? 'active' : '' }}><a href="{{ url('report/alumni') }}"><i class="fa fa-circle-o"></i> Alumni Report</a></li>
                    </ul>
                </li>
            @endif


           <li class="treeview {{ Request::is('profile','help','settings') ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Utilities</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                   

                @if (auth::user()->role != 'admin')
                    <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="{{ url('profile') }}"><i class="fa fa-circle-o"></i> Profile</a></li>
                @endif


                <li class="{{ Request::is('settings') ? 'active' : '' }}"><a href="{{ url('settings') }}"><i class="fa fa-circle-o"></i> Settings</a></li>

                <li class="{{ Request::is('help') ? 'active' : '' }}"><a href="{{ url('help') }}"><i class="fa fa-circle-o"></i> Help</a></li>

                </ul>
            </li>


            <li class="header">SHORTCUT</li>
            <li><a href=" {{url('/')}} "><i class="fa fa-circle-o text-aqua"></i> <span>Website</span></a></li>

      </ul>


    </section>
  </aside>