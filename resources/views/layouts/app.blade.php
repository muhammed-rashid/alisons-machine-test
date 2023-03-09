<!DOCTYPE html>

<html lang="en" data-textdirection="ltr" class="loaded">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
    {{-- Include core + vendor Styles --}}
    @include('panels/styles')

    {{-- user custom styles --}}
    <link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}?ver={{ getenv('APP_VERSION') }}" />

</head>

<body class="horizontal-layout horizontal-menu-modern light" data-menu=" horizontal-menu-modern" data-layout=""
    data-framework="laravel" data-asset-path="{{ asset('/') }}">


    <!-- BEGIN: Content-->
    @yield('content')
    <!-- End: Content-->


    

    {{-- include default scripts --}}
    @include('panels/scripts')

    <script type="text/javascript">
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });

        $(".navbar").click(function() {
            if ($(".navbar-nav").hasClass('active'))
                $(".navbar-nav").removeClass('active');
            else
                $(".navbar-nav").addClass('active');
        });


        $(document).ready(function() {
            // On load Toast
            @if (Session::has('success'))
                toastr['success'](
                '{{ Session::get('success') }}',
                'Success!',
                {
                closeButton: true,
                tapToDismiss: false,
                }
                );
            @endif

            @if (Session::has('error'))
                toastr['error'](
                '{{ Session::get('error') }}',
                'Error!',
                {
                closeButton: true,
                tapToDismiss: false,
                }
                );
            @endif
          
        });
    </script>
</body>

</html>
