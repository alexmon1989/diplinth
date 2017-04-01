<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Главная навигация</li>
            <li class="{{ Request::segment(2) == 'dashboard' || Request::segment(2) == '' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-dashboard"></i> <span>Начало работы</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'users' || Request::segment(2) == '' ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i> <span>Пользователи</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'seo' ? 'active' : '' }}">
                <a href="{{ route('admin.seo.index') }}">
                    <i class="fa fa-google"></i> <span>Настройки SEO</span>
                </a>
            </li>

            <li class="header">Секции</li>
            <li class="{{ Request::segment(2) == 'sections' && Request::segment(3) == 'main' ? 'active' : '' }}">
                <a href="{{ route('admin.sections.main.index') }}">
                    <i class="fa fa-home"></i> <span>Главная</span>
                </a>
            </li>
            <li class="{{ Request::segment(2) == 'sections' && Request::segment(3) == 'about' ? 'active' : '' }}">
                <a href="{{ route('admin.sections.about.index') }}">
                    <i class="fa fa-building"></i> <span>О нас</span>
                </a>
            </li>

            <li class="treeview {{ Request::segment(2) == 'sections' && Request::segment(3) == 'products' && in_array(Request::segment(4), ['list', 'fixing']) ? 'active' : '' }}">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Продукция</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Request::segment(2) == 'sections' && Request::segment(3) == 'products' && Request::segment(4) == 'list' ? 'active' : '' }}">
                        <a href="{{ route('admin.sections.products.index') }}"><i class="fa fa-circle-o"></i> Список продуктов</a>
                    </li>
                    <li class="{{ Request::segment(2) == 'sections' && Request::segment(3) == 'products' && Request::segment(4) == 'fixing' ? 'active' : '' }}">
                        <a href="{{ route('admin.sections.products.fixing.index') }}"><i class="fa fa-circle-o"></i> Крепление плинтуса</a>
                    </li>
                </ul>
            </li>
            <li class="{{ Request::segment(2) == 'sections' && Request::segment(3) == 'contacts' ? 'active' : '' }}">
                <a href="{{ route('admin.sections.contacts.index') }}">
                    <i class="fa fa-map-marker"></i> <span>Контакты</span>
                </a>
            </li>

            <li class="header">Ссылки</li>
            <li>
                <a href="{{ route('main') }}" title="Открыть в новой вкладке" target="_blank">
                    <i class="fa fa-external-link"></i> <span>Перейти на сайт</span>
                </a>
            </li>
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>