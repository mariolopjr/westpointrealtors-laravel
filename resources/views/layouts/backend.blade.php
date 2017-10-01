@include('partials.head')

@include('partials.nav')

<div class="admin">
    <div class="columns">
        <div class="column is-2">
            @include('partials.admin.menu')
        </div>
        <div class="column">
            @yield('content')
        </div>
    </div>
</div>

@include('partials.footer')

@include('partials.scripts')

@include('jsvars')
