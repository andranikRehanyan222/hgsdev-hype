<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Maintenence HTML Template | Equation - Multipurpose Bootstrap Dashboard Template </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/error/style-maintanence.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

</head>
<body class="maintanence text-center">
    <div class="container-fluid maintanence-content">
        <div class="">
            <div class="maintanence-hero-img">
                <img alt="logo" src="assets/img/hypegroups.jpg">
            </div>
            <h1 class="error-title">Under Maintenance
                <br/>
                <br/>
You can:
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}"> go inside!</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        

                        @if (Route::has('register'))
                        &nbsp; | &nbsp;
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif</h1>
            <p class="error-text">Thank you for visiting us.

            </p>
            <p class="text">We are currently working on making some improvements to give you better user experience.</p>
            <p class="text">Please visit us again shortly.</p>

            
        </div>
    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>