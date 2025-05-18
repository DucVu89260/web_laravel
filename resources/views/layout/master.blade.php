<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>{{ $title }}</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="{{ asset('/css/light-bootstrap-dashboard.css')}}" rel="stylesheet">


    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    
    <link href="{{asset('css/pe-icon-7-stroke.css')}}" rel="stylesheet">

    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/60/12/intl/vi_ALL/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/60/12/intl/vi_ALL/util.js"></script>
    @stack('css')
</head>

<body>
    @include('layout.sidebar')
    <div class="wrapper">
        @include('layout.header')
        
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title">{{ $title }}</h1>
                        <p class="category">
                    </div>
                <!--      here you can write your content for the main area                     -->
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @include ('layout.footer')
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @include('layout.script')
    @stack('js')

</body>
</html>