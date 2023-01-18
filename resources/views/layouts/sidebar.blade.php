<aside id="sidebar-wrapper">
    <div class="sidebar-brand" style="height: 100px;">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.png') }}" width="165"
             alt="Infyom Logo" style="padding: 10px; margin: 10px;">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu">
        @include('layouts.menu')
    </ul>
</aside>
