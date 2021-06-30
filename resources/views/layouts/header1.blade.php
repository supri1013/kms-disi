<div class="navbar navbar-default header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href=""><img src="{{asset('assets/images/logo-aplikasi.png')}}" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{auth()->user()->getGambar()}}" alt="Gambar">
                    <span>{{auth()->user()->name}}</span>
                    <i class="caret"></i>
                    </a>

                <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="{{route('profile')}}"><i class="icon-profile"></i>Profile</a></li>
                        <li><a href="{{route('logout')}}"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>