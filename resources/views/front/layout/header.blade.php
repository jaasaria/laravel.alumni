   <!-- Icon Section Start -->
        <div class="icon-section">
            <div class="container">
                <ul class="list-inline">
                    <li>
                        <a href="#"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="linkedin" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#"> <i class="livicon" data-name="rss" data-size="18" data-loop="true" data-c="#fff" data-hc="#757b87"></i>
                        </a>
                    </li>
                    <li class="pull-right">
                        <ul class="list-inline icon-position">

                            <li>
                                <a href="#"><i class="livicon" data-name="mail" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="#" class="text-white">info@icc-iloilo.com</a></label>
                            </li>
                            <li>
                                <a href="#"><i class="livicon" data-name="phone" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="#" class="text-white">(033) 337-7784</a></label>
                            </li>

                            <li>
                                @if(Auth::check())
                                    
                                    <div class="dropdown">
                                        <i class="livicon" data-name="user" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff">
                                            <label class="hidden-xs"><a href="#" class="text-white">
                                            Signed in as <b>{{ Auth::user()->name }}</b>
                                            <span class="caret"></span>
                                            </label>
                                            </a></i>

                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                              <li role="presentation"><a role="menuitem" tabindex="-1" href=" {{ route('admin.home')}} ">Admin Panel</a></li>
                                              <li role="presentation" class="divider"></li>
                                              <li role="presentation"><a role="menuitem" tabindex="-1" href=" {{ route('user.signout')}} ">Sign Out</a></li>
                                            </ul>
                                    </div>

                                @else
                                    <a href="#"><i class="livicon" data-name="user" data-size="18" data-loop="true" data-c="#fff" data-hc="#fff"></i></a>
                                <label class="hidden-xs"><a href="{{route('user.login')}}" class="text-white">Login</a></label>
                                @endif
                            </li>

                          



                        </ul>
                    </li>
                </ul>
            </div>
        </div>
