<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/style-1.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/css/color.css') }}" />

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <script src="{{ mix('/js/app.js') }}" defer></script>

    @inertiaHead

</head>

<body class="app sidebar-mini ltr">

    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


    @inertia


    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <script src="{{ asset('assets/js/themeColors.js') }}"></script>


    {{-- <script src="{{ asset('assets/plugins/calendar/underscore-min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/calendar/moment.js') }}"></script>
    <script src="{{ asset('assets/plugins/calendar/calendar.js') }}"></script>
    <script src="{{ asset('assets/plugins/calendar/defaultcalendar.js') }}"></script> --}}


    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <style>
        h2.swal2-title {
            font-size: 15px !important;
        }

        swal2-x-mark {
            width: 50% !importantt;
        }
    </style>

    <script>
        console.clear();
    </script>
</body>

</html>
