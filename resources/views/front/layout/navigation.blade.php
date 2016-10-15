<nav class="navbar navbar-default container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span><a href="#">_<i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc"></i>
                    </a></span>
                </button>
                <a class="navbar-brand" href="#"><img src=" {{ asset('img/pagelogo.png') }}" alt="logo" class="logo_position">
                </a>
            </div>


            <div class="collapse navbar-collapse" id="collapse">
                <ul class="nav navbar-nav navbar-right">     <!--navbar-right-->


                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('front.home') }}"> Home</a></li>

                    <li class="dropdown {{ Request::is('about','vision','hymn') ? 'active' : '' }} "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> About</a>
                        <ul class="dropdown-menu" role="menu">

                            <li class="{{ Request::is('about') ? 'active' : '' }}"><a href="{{ route('front.about') }}">About Interface College</a></li>

                            <li class="{{ Request::is('vision') ? 'active' : '' }}"><a href="{{ route('front.vision') }}">Vision and Mission</a></li>

                            <li class="{{ Request::is('hymn') ? 'active' : '' }}"><a href="{{ route('front.hymn') }}">Interface Hymn</a></li>

                        </ul>
                    </li>


                    <li class="{{ Request::is('academic') ? 'active' : '' }}"><a href="{{ route('front.academic') }}"> Academic</a></li>


                    <li class="dropdown "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> News</a>
                        <ul class="dropdown-menu" role="menu">


                            <li class="{{ Request::is('list_activity') ? 'active' : '' }}"><a href="{{ url('/list_activity')}}">Interface Activities</a></li>

                            <li class="{{ Request::is('list_jobs') ? 'active' : '' }}"><a href="{{ url('/list_jobs') }}">Interface Jobs</a></li>

                        </ul>
                    </li>

                    <li class="{{ Request::is('contact') ? 'active' : '' }}"><a href="{{ route('front.contact') }}"> Contact</a></li>

                    
                </ul>
            </div>
        </nav>
        