@extends('bootstrap-italia::master')

@section('bootstrapitalia_css')
    @stack('css')
    @yield('css')
@stop

@section('body')
    <!-- Header -->
    <div class="it-header-wrapper {{ config('bootstrap-italia.sticky-header') ? 'it-header-sticky' : ''}}" style="{{ config('bootstrap-italia.sticky-header') ? 'z-index: 999' : ''}}">
        <div class="it-header-slim-wrapper {{ config('bootstrap-italia.slim-header-light') ? 'theme-light' : '' }}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="it-header-slim-wrapper-content">
                            <a class="d-none d-lg-block navbar-brand" href="{{ config('bootstrap-italia.owner.link') }}">{!! config('bootstrap-italia.owner.description') !!}</a>
                            <div class="nav-mobile">
                                <nav>
                                    <a class="it-opener d-lg-none" data-toggle="collapse" href="#menu-principale" role="button" aria-expanded="false" aria-controls="menu-principale">
                                        <span>{!! config('bootstrap-italia.owner.description') !!}</span>
                                        <svg class="icon">
                                            <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-expand') }}"></use>
                                        </svg>
                                    </a>
                                    <div class="link-list-wrapper collapse" id="menu-principale">
                                        <ul class="link-list">
                                            @each('bootstrap-italia::partials.slim-header-menu-item', $bootstrapItalia->menu()['slim-header-menu'], 'item')
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="header-slim-right-zone">
                                {{-- Language menu
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <span>ITA</span>
                                        <svg class="icon d-none d-lg-block">
                                            <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-expand') }}"></use>
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="link-list-wrapper">
                                                    <ul class="link-list">
                                                        <li><a class="list-item" href="#"><span>ITA</span></a></li>
                                                        <li><a class="list-item" href="#"><span>ENG</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                --}}
                                @if (config('bootstrap-italia.auth'))
                                <div class="it-access-top-wrapper">
                                    @guest
                                        @if (config('bootstrap-italia.auth.login'))
                                            <button onclick="event.preventDefault(); window.location=this.getAttribute('href')"
                                                    class="btn btn-primary btn-sm"
                                                    href="{{ (config('bootstrap-italia.auth.login.type') === 'route') ? route(config('bootstrap-italia.auth.login.route')) : url(config('bootstrap-italia.auth.login.url')) }}"
                                                    type="button">{{ trans('bootstrap-italia::bootstrap-italia.login') }}</button>
                                        @endif
                                    @endguest
                                    @auth
                                        @if(strtoupper(config('bootstrap-italia.auth.logout.method')) === 'GET' || !config('bootstrap-italia.auth.logout.method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                                            <button onclick="event.preventDefault(); window.location=this.getAttribute('href')"
                                                    class="btn btn-primary btn-sm"
                                                    href="{{ (config('bootstrap-italia.auth.logout.type') === 'route') ? route(config('bootstrap-italia.auth.logout.route')) : url(config('bootstrap-italia.auth.logout.url')) }}"
                                                    type="button">{{ trans('bootstrap-italia::bootstrap-italia.logout') }}</button>
                                        @else
                                            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                    class="btn btn-primary btn-sm"
                                                    href="#"
                                                    type="button">{{ trans('bootstrap-italia::bootstrap-italia.logout') }}</button>
                                            <form id="logout-form" action="{{ url( config('bootstrap-italia.logout_url', 'auth/logout' )) }}" method="POST" style="display: none;">
                                                @if(config('bootstrap_italia.logout_method'))
                                                    {{ method_field(config('bootstrap_italia.logout_method')) }}
                                                @endif
                                                {{ csrf_field() }}
                                            </form>
                                        @endif
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="it-nav-wrapper">
            <div class="it-header-center-wrapper  {{ config('bootstrap-italia.small-header') ? 'it-small-header' : '' }}">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="it-header-center-content-wrapper">
                                <div class="it-brand-wrapper">
                                    <a href="{{ (config('bootstrap-italia.routes.home.type') === 'route') ? route(config('bootstrap-italia.routes.home.route')) : url(config('bootstrap-italia.routes.home.url')) }}">
                                        @if (config('bootstrap-italia.logo'))
                                            @if (config('bootstrap-italia.logo.type') === 'icon')
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-') }}{{ config('bootstrap-italia.logo.icon') }}"></use>
                                                </svg>
                                            @else
                                                <img alt="logo" class="icon" src="{{ config('bootstrap-italia.logo.url') }}">
                                            @endif
                                        @endif
                                        <div class="it-brand-text">
                                            <h2 class="no_toc d-none d-md-block">{!! config('bootstrap-italia.brand-text') !!}</h2>
                                            <h2 class="no_toc d-block d-md-none">{!! config('bootstrap-italia.brand-text-small') !!}</h2>
                                            <h3 class="no_toc d-none d-md-block">{!! config('bootstrap-italia.tagline') !!}</h3>
                                        </div>
                                    </a>
                                </div>
                                <div class="it-right-zone">
                                    @if (config('bootstrap-italia.socials'))
                                        <div class="it-socials d-none d-md-flex">
                                            <span>{{ trans('bootstrap-italia::bootstrap-italia.follow_us') }}</span>
                                            <ul>
                                                @each('bootstrap-italia::partials.social-links-item-header', config('bootstrap-italia.socials'), 'item')
                                            </ul>
                                        </div>
                                    @endif
                                    @if (config('bootstrap-italia.routes.search'))
                                        <div class="it-search-wrapper">
                                            <span class="d-none d-md-block">{{ trans('bootstrap-italia::bootstrap-italia.search') }}</span>
                                            <a class="search-link rounded-icon" href="{{ (config('bootstrap-italia.routes.search.type') === 'route') ? route(config('bootstrap-italia.routes.search.route')) : url(config('bootstrap-italia.routes.search.url')) }}" aria-label="{{ trans('bootstrap-italia::bootstrap-italia.search') }}">
                                                <svg class="icon">
                                                    <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-search') }}"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="it-header-navbar-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <nav class="navbar navbar-expand-lg has-megamenu">
                                <button class="custom-navbar-toggler" type="button" aria-controls="nav10" aria-expanded="false" aria-label="{{ trans('bootstrap-italia::bootstrap-italia.toggle_navigation') }}" data-target="#nav10">
                                    <svg class="icon">
                                        <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-burger') }}"></use>
                                    </svg>
                                </button>
                                <div class="navbar-collapsable" id="nav10">
                                    <div class="overlay"></div>
                                    <div class="close-div sr-only">
                                        <button class="btn close-menu" type="button"><span class="it-close"></span>close</button>
                                    </div>
                                    <div class="menu-wrapper">
                                        <ul class="navbar-nav">
                                            @each('bootstrap-italia::partials.header-menu-item', $bootstrapItalia->menu()['header-menu'], 'item')
                                        </ul>
                                    </div>

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Body -->
    <div class="container my-4">
        @yield('content')
    </div>
    <!-- End Body -->
    <!-- Footer -->
    <footer class="it-footer">
        <div class="it-footer-main">
            <div class="container">
                <section>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="it-brand-wrapper">
                                <a href="{{ (config('bootstrap-italia.routes.home.type') === 'route') ? route(config('bootstrap-italia.routes.home.route')) : url(config('bootstrap-italia.routes.home.url')) }}">
                                    @if (config('bootstrap-italia.logo'))
                                        @if (config('bootstrap-italia.logo.type') === 'icon')
                                            <svg class="icon">
                                                <use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-') }}{{ config('bootstrap-italia.logo.icon') }}"></use>
                                            </svg>
                                        @else
                                            <img alt="logo" class="icon" src="{{ config('bootstrap-italia.logo.url') }}">
                                        @endif
                                    @endif
                                    <div class="it-brand-text">
                                        <h2 class="no_toc">{!! config('bootstrap-italia.brand-text') !!}</h2>
                                        <h3 class="no_toc d-none d-md-block">{!! config('bootstrap-italia.tagline') !!}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        @each('bootstrap-italia::partials.footer-menu-item', $bootstrapItalia->menu()['footer-menu'], 'item')
                    </div>
                </section>
                @if (config('bootstrap-italia.address') || config('bootstrap-italia.socials') || config('bootstrap-italia.routes.newsletter'))
                <section class="py-4 border-white border-top">
                    <div class="row">
                        @if (config('bootstrap-italia.address') || config('bootstrap-italia.contacts-links'))
                        <div class="col-lg-4 col-md-4 pb-2">
                            <h4><a href="#" title="{{ trans('bootstrap-italia::bootstrap-italia.go_to') }}: {{ trans('bootstrap-italia::bootstrap-italia.contacts') }}">{{ trans('bootstrap-italia::bootstrap-italia.contacts') }}</a></h4>
                            @if (config('bootstrap-italia.address'))
                            <p>
                                {!! config('bootstrap-italia.address')  !!}
                            </p>
                            @endif
                            @if (config('bootstrap-italia.contacts-links'))
                            <div class="link-list-wrapper">
                                <ul class="footer-list link-list clearfix">
                                    @each('bootstrap-italia::partials.contacts-links-item', config('bootstrap-italia.contacts-links'), 'item')
                                </ul>
                            </div>
                            @endif
                        </div>
                        @endif
                        @if (config('bootstrap-italia.socials') || config('bootstrap-italia.routes.newsletter'))
                        <div class="col-lg-4 col-md-4 pb-2 ml-auto">
                            @if (config('bootstrap-italia.socials'))
                                <div class="pb-2">
                                    <h4><a href="#" title="{{ trans('bootstrap-italia::bootstrap-italia.go_to') }}: {{ trans('bootstrap-italia::bootstrap-italia.follow_us') }}">{{ trans('bootstrap-italia::bootstrap-italia.follow_us') }}</a></h4>
                                    <ul class="list-inline text-left social">
                                        @each('bootstrap-italia::partials.social-links-item-footer', config('bootstrap-italia.socials'), 'item')
                                    </ul>
                                </div>
                            @endif
                            @if (config('bootstrap-italia.routes.newsletter'))
                                <div class="pb-2">
                                    <h4><a href="{{ (config('bootstrap-italia.routes.newsletter.type') === 'route') ? route(config('bootstrap-italia.routes.newsletter.route')) : url(config('bootstrap-italia.routes.newsletter.url')) }}">{{ trans('bootstrap-italia::bootstrap-italia.newsletter') }}</a></h4>
                                </div>
                            @endif
                        </div>
                        @endif
                    </div>
                </section>
                @endif
            </div>
        </div>
        <div class="it-footer-small-prints clearfix">
            <div class="container">
                <h3 class="sr-only">{{ trans('bootstrap-italia::bootstrap-italia.useful_links') }}</h3>
                <ul class="it-footer-small-prints-list list-inline mb-0 d-flex flex-column flex-md-row">
                    @each('bootstrap-italia::partials.footer-bar-item', $bootstrapItalia->menu()['footer-bar'], 'item')
                </ul>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <a href="#" aria-hidden="true" data-attribute="back-to-top" class="back-to-top" id="example">
        <svg class="icon icon-light"><use xlink:href="{{ asset('vendor/bootstrap-italia/dist/svg/sprite.svg#it-arrow-up') }}"></use></svg>
    </a>
    <div class="cookiebar">
        <p>{!! trans('bootstrap-italia::bootstrap-italia.cookiebar.message') !!}</p>
        <div class="cookiebar-buttons">
            <a href="#" class="cookiebar-btn">{!! trans('bootstrap-italia::bootstrap-italia.cookiebar.preferences') !!}</a>
            <button data-accept="cookiebar" class="cookiebar-btn cookiebar-confirm">{!! trans('bootstrap-italia::bootstrap-italia.cookiebar.accept') !!}</button>
        </div>
    </div>
    <script src="{{ asset('vendor/bootstrap-italia/dist/js/bootstrap-italia.bundle.min.js') }}"></script>

@stop

@section('bootstrapitalia_js')
    @stack('js')
    @yield('js')
@stop
