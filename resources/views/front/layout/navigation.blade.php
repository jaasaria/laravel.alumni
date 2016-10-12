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


                    <li class="active"><a href="{{ route('front.home') }}"> Home</a></li>

                    <li class="dropdown "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> About</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="http://joshadmin.com/news">About Interface College</a></li>
                            <li><a href="http://joshadmin.com/news_item">Vision and Mission</a></li>
                            <li><a href="http://joshadmin.com/news_item">Interface Hymn</a></li>
                            <li><a href="http://joshadmin.com/news_item">History</a></li>
                        </ul>
                    </li>


                    <li><a href="{{ route('front.home') }}"> Academic</a></li>

                    <li class="dropdown "><a href="#" class="dropdown-toggle" data-toggle="dropdown"> News</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="http://joshadmin.com/news">Interface Activities</a></li>
                            <li><a href="http://joshadmin.com/news_item">Interface Jobs</a></li>
                        </ul>
                    </li>

                    <li><a href="{{ route('front.home') }}"> Contact</a></li>


                    <li><a href="{{ route('user.login') }}">Login</a></li>
                    
                </ul>
            </div>
        </nav>
        