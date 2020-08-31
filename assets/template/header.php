<header class="app-header"><a class="app-header__logo" href="index.html">Sistem Surat</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i
                    class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span
                                    class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i
                                        class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div>
                        </a></li>
                </div>
                </div>
                <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                    class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a ng-class="{'app-menu__item active': active === 'Home', 'app-menu__item':active !== 'Home' }" 
        href="{{url}}/admin/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li ng-class="{'treeview is-expanded': active === 'Struktural' || active === 'Kriteria' || active === 'Mahasiswa' || active === 'Detail Mahasiswa' || active === 'Pegawai' || active === 'Detail Pegawai', 
            'treeview': active !== 'Struktural' || active !== 'Kriteria' || active !== 'Mahasiswa' || active !== 'Detail Mahasiswa' || active !== 'Pegawai' || active !== 'Detail Pegawai'}">
            <a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Manajemen Data</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a ng-class="{'app-menu__item active': active === 'Struktural', 'app-menu__item':active !== 'Struktural' }" href="{{url}}/admin/struktural"><i class="icon fa fa-circle-o"></i> &nbsp;Struktur</a></li>
                <li><a ng-class="{'app-menu__item active': active === 'Kriteria', 'app-menu__item':active !== 'Kriteria' }" href="{{url}}/admin/kriterium"><i class="icon fa fa-circle-o"></i> &nbsp; Kriteria Surat</a>
                </li>
                <li><a ng-class="{'app-menu__item active': active === 'Mahasiswa', 'app-menu__item':active !== 'Mahasiswa' }" href="{{url}}/admin/mahasiswa"><i class="icon fa fa-circle-o"></i> &nbsp; Mahasiswa</a>
                </li>
                <li><a ng-class="{'app-menu__item active': active === 'Pegawai', 'app-menu__item':active !== 'Pegawai' }" href="{{url}}/admin/pegawai"><i class="icon fa fa-circle-o"></i> &nbsp; Pegawai</a>
                </li>
            </ul>
        </li>
        <li><a ng-class="{'app-menu__item active': active === 'Pejabat', 'app-menu__item':active !== 'Pejabat' }" 
        href="{{url}}/admin/pejabat"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Pelabat</span></a></li>
    </ul>
</aside>
<script>
(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

})();

</script>
