
<nav role="navigation" class="one-page-header one-page-header-style-2 navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="menu-container page-scroll">
            <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="#intro" class="navbar-brand">
                <!--<span>Di</span>Plinth -->
                <img src="unify/img/logo-header.png" alt="Logo">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="menu-container">

                <ul class="log-reg-block visible-md-block visible-lg-block languages">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="cd-log_reg {{ App::getLocale() == $localeCode ? 'active' : '' }}">
                            <a rel="alternate" class="{{ $localeCode == 'ru' ? 'rus' : '' }}" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>

                <ul class="nav navbar-nav">
                    <li class="page-scroll home active">
                        <a href="#body">{{ Lang::get('interface.menu.main') }}</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">{{ Lang::get('interface.menu.about') }}</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#products">{{ Lang::get('interface.menu.products') }}</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">{{ Lang::get('interface.menu.contact') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>