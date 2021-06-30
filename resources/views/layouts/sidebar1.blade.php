<div class="sidebar sidebar-main">
    <div class="sidebar-content">


        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{auth()->user()->getGambar()}}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{auth()->user()->name}}</span>
                        <div class="text-size-mini text-muted">
                           {{auth()->user()->jabatan}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    @if(auth()->user()->role == 'admin')
                    <li><a href="/dashboard"><i class=" icon-home5"></i> <span>Dashboard</span></a></li>
                    <li class=""><a href="#"><i class="icon-database-edit2"></i> <span>KELOLA</span></a>
                        <ul class="active">
                            <li><a href="/forum-diskusi"><i class="icon-database-edit2"></i> <span>Kelola Forum Diskusi</span></a></li>
                            <li><a href="{{route('dokumen')}}"><i class="icon-database-edit2"></i> <span>Kelola Dokumen</span></a></li>
                            <li><a href="{{route('tampildata.wiki')}}"><i class="icon-database-edit2"></i> <span>Kelola Wiki</span></a></li>
                            <li><a href="{{route('data.isu')}}"><i class="icon-database-edit2"></i> <span>Kelola Isu</span></a></li>
                            <li><a href="{{route('tampildata.faq')}}"><i class="icon-database-edit2"></i> <span>Kelola FAQ</span></a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('user')}}"><i class="icon-database-edit2"></i> <span>Kelola User</span></a></li>
                    <li><a href="{{route('tampildata.komentar')}}"><i class="icon-database-edit2"></i> <span>Kelola Komentar</span></a></li>
                    <li><a href="{{route('kategori')}}"><i class="icon-database-edit2"></i> <span>Kelola Kategori Dokumen</span></a></li>
                    <li><a href="{{route('kategori.lainya')}}"><i class="icon-database-edit2"></i> <span>Kelola Kategori Permasalahan</span></a></li>
                    <li><a href="{{route('kluster')}}"><i class="icon-database-edit2"></i> <span>Kelola Kluster</span></a></li>
                    @endif
            
                            @if(auth()->user()->role == 'visitor')
                            <li class=""><a href="{{route('home.user')}}"><i class="icon-home4"></i> <span>Home</span></a></li>
                            <li class=""><a href="{{route('list')}}"><i class="icon-collaboration"></i> <span>Forum Diskusi</span></a>
                                <ul class="active">
                                    <li> <a href="{{route('forum.saya')}}">Forum Diskusi Saya <i class=" icon-stack"></i></a></li>
                                    <li><a href="{{route('list')}}"><i class="icon-list-unordered"></i>Daftar Forum Diskusi</a></li>
                                </ul>
                            </li>
                            <li class=""> <a href="{{route('wiki')}}"><i class="icon-pencil7"></i> <span>Wiki</span></a>
                                <ul class="active">
                                    <li> <a href="/daftar/wiki">Wiki Saya <i class="icon-stack"></i></a></li>
                                    <li><a href="{{route('wiki')}}"><i class="icon-list-unordered"></i>Daftar Wiki</a></li>
                                </ul>
                            </li>
                            <li class=""> <a href="{{route('dokpeng')}}"><i class="icon-folder-open"></i> <span>Dokumen</span></a>
                                <ul class="active">
                                    <li> <a href="{{route('doksaya')}}">Dokumen Saya <i class="icon-stack"></i></a></li>
                                    <li><a href="{{route('dokpeng')}}"><i class="icon-list-unordered"></i>Daftar Dokumen</a></li>
                                </ul>
                            </li>
                            <li class=""> <a href=""><i class="icon-lifebuoy"></i> <span>Isu</span></a>
                                <ul class="active">
                                    <li> <a href="{{route('isu.saya')}}">Isu Saya <i class="icon-stack"></i></a></li>
                                    <li><a href="{{route('helpdesk')}}"><i class="icon-list-unordered"></i>Daftar Isu</a></li>
                                </ul>
                            </li>
                            <li class=""><a href="{{route('faq')}}"><i class="icon-question6"></i> <span>FAQ</span></a></li>
                            @endif
                </ul>
            </div>
        </div>
    </div>
</div>