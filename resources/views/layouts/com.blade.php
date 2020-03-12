<html>
    <head>
        <title>@yield('page_title')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="{{asset('css/morris.css')}}" type="text/css"/>
        <!-- Graph CSS -->
        <!--<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> -->
        <!-- jQuery -->
        <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
   
        <link rel="stylesheet" href="{{asset('css/icon-font.min.css')}}" type='text/css' />
        <!-- //lined-icons -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        
    </head>
    <body>

              <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="/">Content Sharing</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                  <ul class="navbar-nav mr-auto">
                  
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                      </li>
                    <li class="nav-item">
                          <a class="nav-link" href="/stories">Stories</a>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stories/create">Create Story</a>
                    </li>
                  
                    

                    
                <li class="nav-item">
                    <a class="nav-link" href="/usermanual">UserManual</a>
                </li>
                    
                  </ul>
                  <ul class="navbar-nav mr-auto navbar-right">
                      <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                        </form>  
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} 
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                          @if(Auth::user()->id == '1')
                          <a class="dropdown-item" href="/sections">
                            {{ __('Sections') }}
                          </a>    
                          @endif
                          <a class="dropdown-item" href="/profile/{{Auth::user()->id}}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="/profile/stories/{{Auth::user()->id}}">
                              {{ __('My Stories') }}
                          </a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                  </ul>
                  
                </div>
              </nav>
              
           
              <div class="container">
                @include('include.messages')
                @yield('content')
              </div>
              <div class="copyrights">
                  <p> Developed by: <a href="https://www.linkedin.com/in/younus-bipul-144a10143/" target="blank">Md. Younus Bipul </a> </p>
               </div>	
    </body>
</html>