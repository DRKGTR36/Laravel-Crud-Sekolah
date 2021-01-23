<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            @if(auth()->user()->role == 'admin')
                <ul class="nav">
                    <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="/forum" class=""><i class="lnr lnr-bubble"></i> <span>Forum</span></a></li>
                    <li><a target="_blank" href="/" class="inactive"><i class="lnr lnr-home"></i> <span>Front End</span></a></li>
                    <li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
                    <li><a href="/guru" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
                    <li><a href="/posts" class=""><i class="lnr lnr-pencil"></i> <span>Posts</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                {{-- <li><a href="#" class="">Profile</a></li> --}}
                                <li><a href="/login" class="">Login</a></li>
                                {{-- <li><a href="#" class="">Lockscreen</a></li> --}}
                            </ul>
                        </div>
                    </li>
                </ul>
            @else
                <ul class="nav">
                    <li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="/forum" class=""><i class="lnr lnr-bubble"></i> <span>Forum</span></a></li>
                    <li><a target="_blank" href="/" class="inactive"><i class="lnr lnr-home"></i> <span>Front End</span></a></li>
                    <li>
                        <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>Settings</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                        <div id="subPages" class="collapse ">
                            <ul class="nav">
                                <li><a href="/profilesaya" class="">Profile</a></li>
                                <li><a href="/login" class="">Login</a></li>
                                {{-- <li><a href="#" class="">Lockscreen</a></li> --}}
                            </ul>
                        </div>
                    </li>
                </ul>
            @endif
        </nav>
    </div>
</div>
