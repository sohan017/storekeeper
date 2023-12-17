@include('admin/partials/header')

@include('admin/partials/sidebar')

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        @yield('content')
    </div>
</div>

@include('admin/partials/footer')
