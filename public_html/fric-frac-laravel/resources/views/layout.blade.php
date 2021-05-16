<!DOCTYPE html>
<html>
<head>
    <title>Fric Frac Laravel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
          rel="stylesheet">
</head>

<body style=" background-color: whitesmoke;" >


<div class="text-center bg-warning" style="min-height:100px; padding: 25px;">
    <div class="container">
        <a href="{{ URL::to('/') }}" class="btn btn-lg btn-warning pull-left">Home</a>

        <h1 class="pull-right">
            <div class="h-100 d-inline-block">Fric Frac Laravel App</div>
        </h1>
    </div>
</div>

<div class="container min-vh-100" style="min-height:calc(100vh - 204px); padding: 50px;">

    @yield('content')

</div>
<footer class="text-center bg-warning" style="min-height:100px; padding: 10px">
    <p>&copy Tim Janssens</p>
    <p>Opdracht Programmeren 4</p>
</footer>
</body>
</html>
