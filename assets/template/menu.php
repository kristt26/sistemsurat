<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Doe</p>
            <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a ng-class="{'app-menu__item active': active === 'Home', 'app-menu__item':active !== 'Home' }" href="{{url}}/admin/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span
                    class="app-menu__label">Home</span></a></li>
        <li ng-class="{'treeview is-expanded': active === 'Struktural' || active === 'Kriteria', 'treeview': active !== 'Struktural'}"><a class="app-menu__item" href="" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Manajemen Data</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a ng-class="{'app-menu__item active': active === 'Struktural', 'app-menu__item':active !== 'Struktural' }" href="{{url}}/admin/struktural"><i class="icon fa fa-circle-o"></i> Struktur</a></li>
                <li><a ng-class="{'app-menu__item active': active === 'Kriteria', 'app-menu__item':active !== 'Kriteria' }" href="{{url}}/admin/kriterium"><i class="icon fa fa-circle-o"></i> Kriteria Surat</a>
                </li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span
                    class="app-menu__label">Docs</span></a></li>
    </ul>
</aside>
<script src="../assets/js/main.js"></script>
