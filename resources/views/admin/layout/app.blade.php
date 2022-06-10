<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('uploads/favicon.png') }}">
    <title>Admin Panel</title>
    <!-- Integrating Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- All CSS Codes -->
    @include('admin.layout.styles')
    <!-- All JavaScript Codes -->
    @include('admin.layout.scripts')
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        {{-- NavBar --}}
        <div class="navbar-bg"></div>
        @include('admin.layout.navbar')

        {{-- SideBar --}}
        @include('admin.layout.sidebar')

        {{-- Main Content --}}
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading')</h1>
                    <div class="ml-auto">
                        {{-- <a href="" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Button
                        </a> --}}
                    </div>
                </div>

                {{-- Here Will Be Loaded All Blade Files --}}
                @yield('content')


            </section>
        </div>
    </div>
</div>

{{-- Custom JS Files --}}
@include('admin.layout.scripts_footer')

{{-- Because There Have Multiple Errors --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if (session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if (session()->get('success_message'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success_message') }}',
        });
    </script>
@endif

</body>
</html>