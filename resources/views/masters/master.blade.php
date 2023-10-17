<!--header -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Nano Health</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- External CSS -->
    <link href="{{ asset('css/light-bootstrap-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/light-bootstrap-dashboard-ltr.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-ltr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/updated_utils.css') }}" rel="stylesheet">
    <link href="{{ asset('bi/font/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Fonts and icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/earlyaccess/droidarabickufi.css' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/pe-icon-7-stroke.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .custom-button {
            background-color: white;
            border: 2px solid black;
            color: black;
            margin-bottom: 20px;
        }

        .custom-button-info {
            background-color: white;
            border: 2px solid green;
            color: green;
            width: 65px;
            height: 35px;
        }

        .custom-button-primary {
            background-color: white;
            border: 2px solid blue;
            color: blue;
            width: 65px;
            height: 35px;
        }

        .custom-button-danger {
            background-color: white;
            border: 2px solid red;
            color: red;
            width: 65px;
            height: 35px;
        }
    </style>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/plug-ins/1.11.3/i18n/ar.json"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"
        integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g=="
        crossorigin="anonymous"></script>

    <!-- Latest compiled and minified Bootstrap Select CSS and JavaScript -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
        integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"
        integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/i18n/defaults-en_EN.min.js"
        integrity="sha512-6E5LOmtdSnzVc0isqxqyRDvOdQOKDjWWAk8W+tN1s7w+m7Z9j/5traFBgCsGUksEtoTu44KbXJkQbt5vIBwyFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Table JS-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>
</head>


<body>
    <div class="wrapper">
        <div class="sidebar" data-color="grey">
            <div class="sidebar-wrapper" style="background-color:#000000">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Nano Health
                    </a>
                    <center>
                        <h4>{{ Auth::user()->name }}</h4>
                    </center>
                </div>
                <ul class="nav">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="pe-7s-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                    @if (Gate::allows('View User') || Gate::allows('Add User') || Gate::allows('Edit User') || Gate::allows('Delete User'))
                        <li>
                            <a href="{{ route('users.index') }}">
                                <i class="pe-7s-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    @endif
                    @if (Gate::allows('View Article') ||
                            Gate::allows('Add Article') ||
                            Gate::allows('Edit Article') ||
                            Gate::allows('Delete Article'))
                        <li>
                            <a href="{{ route('articles.index') }}">
                                <i class="pe-7s-news-paper"></i>
                                <p>Articles</p>
                            </a>
                        </li>
                    @endif

                    @if (Gate::allows('View Role') || Gate::allows('Add Role') || Gate::allows('Edit Role') || Gate::allows('Delete Role'))
                        <li>
                            <a href="{{ route('roles.index') }}">
                                <i class="pe-7s-unlock"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                    @endif

                    @auth
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="pe-7s-power"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
        @yield('content')
    </div>

</body>

</html>
