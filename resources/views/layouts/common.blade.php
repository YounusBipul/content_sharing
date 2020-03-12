<html>
    <head>
        <title>@yield('page_title')</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::to('/')}}/css/core-style.css">
    </head>
    <body>
            
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            
            <div class="bg-light border-right" id="sidebar-wrapper">
                <div class="sidebar-heading"><h5>Content</h5><h4>Sharing</h4>
            </div>
                
                <div class="list-group list-group-flush">
                <a href="/" class="list-group-item list-group-item-action bg-light">Home</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Home 1</a>
                    </li>
                    <li>
                        <a href="#">Home 2</a>
                    </li>
                    <li>
                        <a href="#">Home 3</a>
                    </li>
                </ul>
                </div>
            </div>
            <!-- /#sidebar-wrapper -->


            
        
            <!-- Page Content -->
            <div id="page-content-wrapper">
        
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <!--<button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
              
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            -->
        
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="/createpost">Create post <span class="sr-only">(current)</span></a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        UserName
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Logout</a>
                        <!--<a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>-->
                    </li>
                    </ul>
                </div>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        
            </div>
    </body>
</html>