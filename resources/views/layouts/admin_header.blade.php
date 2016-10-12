  <header class="main-header">


    <a href="#" class="logo">
      <span class="logo-mini"> <b>TMC</b> </span>
      <span class="logo-lg">
          <img src=" {{ asset('/img/logo_white.png') }} " class="img-rectangle" width="100%">
      </span>
    </a>

    <nav class="navbar navbar-static-top">
  
    
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
              </a>
          </li>
          <li class="dropdown1 messages-menu1">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-sticky-note-o"></i>
                    <span class="label label-success">4</span>
              </a>
          </li>



          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src=" {{  asset('upload/avatars/' . Auth::user()->avatar)  }}" class="user-image" alt="User Image">
              <span class="hidden-xs">  {{ Auth::user()->name }}</span>
            </a>

            <ul class="dropdown-menu">

                  <li class="user-header">
                    <img src="{{ asset('upload/avatars/' . Auth::user()->avatar) }}" class="img-circle" alt="User Image">
                    <p>
                          {{ Auth::user()->name }}
                          <br>
                          <small>Web Developer</small>
                          <small>Member since Nov. 20101
                          </small>
                    </p>

                  </li>

                  <li class="user-footer">
                        <a href=" {{ route('profile.index') }}" class="btn btn-default btn-flat blocks">Profile Information</a>
                  </li>
            </ul>
          </li>

          <li>
              <a href="{{ url('/user/logout') }}" class="fa fa-sign-out" data-toggle="tooltip"   data-placement="left" title="Sign Out"></a>
          </li>


        </ul>
      </div>
    </nav>
  </header>