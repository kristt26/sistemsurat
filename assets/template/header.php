<header class="app-header"><a class="app-header__logo" href="index.html">Sistem Surat</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li><a class="app-nav__item" href="javascript:void()" ng-click="logout()"><i class="fa fa-sign-out fa-lg"></i>
                Logout</a></li>

    </ul>
</header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">

        <div>
            <a href="javascript:void()" ng-click="detailpegawai()" style="margin:auto"><img
                    class="app-sidebar__user-avatar" ng-src="{{photo}}" alt="User Image"
                    style="width:48px; height: 48px"></a>
            <p class="app-sidebar__user-name" style="word-wrap: break-word;">{{session.Nama}}</p>
            <p class="app-sidebar__user-designation" style="word-wrap: break-word;">{{session.nm_struktural}}</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a ng-class="{'app-menu__item active': active === 'Home', 'app-menu__item':active !== 'Home' }"
                href="{{url}}/admin/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span
                    class="app-menu__label">Home</span></a></li>
        <li ng-if="adminakses"><a
                ng-class="{'app-menu__item active': active === 'Struktural', 'app-menu__item':active !== 'Struktural' }"
                href="{{url}}/admin/struktural"><i class="icon fa fa-circle-o"></i> &nbsp;Struktur</a></li>
        <li ng-if="adminakses"><a
                ng-class="{'app-menu__item active': active === 'Kriteria', 'app-menu__item':active !== 'Kriteria' }"
                href="{{url}}/admin/kriterium"><i class="icon fa fa-circle-o"></i> &nbsp; Kriteria Surat</a>
        </li>
        <li ng-if="adminakses"><a ng-class="{'app-menu__item active': active === 'Mahasiswa', 'app-menu__item':active !== 'Mahasiswa' }"
                href="{{url}}/admin/mahasiswa"><i class="icon fa fa-circle-o"></i> &nbsp; Mahasiswa</a>
        </li>
        <li ng-if="adminakses"><a
                ng-class="{'app-menu__item active': active === 'Pegawai', 'app-menu__item':active !== 'Pegawai' }"
                href="{{url}}/admin/pegawai"><i class="icon fa fa-circle-o"></i> &nbsp; Pegawai</a>
        </li>
        <!-- <li treeview ng-if="adminakses"
            ng-class="{'treeview is-expanded': active === 'Struktural' || active === 'Kriteria' || active === 'Mahasiswa' || active === 'Detail Mahasiswa' || active === 'Pegawai' || active === 'Detail Pegawai',
            'treeview': active !== 'Struktural' || active !== 'Kriteria' || active !== 'Mahasiswa' || active !== 'Detail Mahasiswa' || active !== 'Pegawai' || active !== 'Detail Pegawai'}">
            <a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span
                    class="app-menu__label">Manajemen Data</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li ng-if="adminakses"><a
                        ng-class="{'app-menu__item active': active === 'Struktural', 'app-menu__item':active !== 'Struktural' }"
                        href="{{url}}/admin/struktural"><i class="icon fa fa-circle-o"></i> &nbsp;Struktur</a></li>
                <li ng-if="adminakses"><a
                        ng-class="{'app-menu__item active': active === 'Kriteria', 'app-menu__item':active !== 'Kriteria' }"
                        href="{{url}}/admin/kriterium"><i class="icon fa fa-circle-o"></i> &nbsp; Kriteria Surat</a>
                </li>
                <li><a ng-class="{'app-menu__item active': active === 'Mahasiswa', 'app-menu__item':active !== 'Mahasiswa' }"
                        href="{{url}}/admin/mahasiswa"><i class="icon fa fa-circle-o"></i> &nbsp; Mahasiswa</a>
                </li>
                <li ng-if="adminakses"><a
                        ng-class="{'app-menu__item active': active === 'Pegawai', 'app-menu__item':active !== 'Pegawai' }"
                        href="{{url}}/admin/pegawai"><i class="icon fa fa-circle-o"></i> &nbsp; Pegawai</a>
                </li>
        </li>
    </ul>
    </li> -->
    <li ng-if="adminakses"><a
            ng-class="{'app-menu__item active': active === 'Pejabat', 'app-menu__item':active !== 'Pejabat' }"
            href="{{url}}/admin/pejabat"><i class="app-menu__icon fa fa-building"></i><span
                class="app-menu__label">Pejabat</span></a></li>
    <li><a ng-class="{'app-menu__item active': active === 'Kotak Surat', 'app-menu__item':active !== 'Kotak Surat' }"
            href="{{url}}/admin/surat"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Kotak
                Surat</span></a></li>
    </ul>
</aside>
<script>
    (function () {
        "use strict";

        var treeviewMenu = $('.app-menu');

        // Toggle Sidebar
        $('[data-toggle="sidebar"]').click(function (event) {
            event.preventDefault();
            $('.app').toggleClass('sidenav-toggled');
        });

        // Activate sidebar treeview toggle
        $("[data-toggle='treeview']").click(function (event) {
            event.preventDefault();
            if (!$(this).parent().hasClass('is-expanded')) {
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