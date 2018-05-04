<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--  --}}
        <title>@yield('title', 'Foobooks Status Dashboard')</title>

        {{-- Favicon --}}
        <link rel="icon" href="/favicon.ico">

        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @stack('css')
    </head>
    <body>
        {{-- Fixed navigation bar that appears on all pages --}}
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- <a class="navbar-brand" href="#">Incident Status Dashboard</a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Dashboard</a></li>
                        <li><a href="/incidents/create">Create Incident</a></li>
                        <li><a href="/incidents/history">View History</a></li>
                        <!-- <li><a href="#">Profile</a></li> -->
                        <!-- <li><a href="#">Help</a></li> -->
                    </ul>
                    <form class="navbar-form">
                        <input id="incidentSearch" type="text" class="form-control" placeholder="Search by Incident ID..." action="/incidents/search" method="get">
                    </form>
                </div>
            </div>
        </nav>

        {{-- Main content for the page  --}}
        <section>
            @yield('content')
        </section>
    
    {{--  --}}
    
    {{-- Bootstrap JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    {{-- <script src="/js/main.js"></script> --}}
    {{-- @stack('scripts') --}}
    </body>
</html>