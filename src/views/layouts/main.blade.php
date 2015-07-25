<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ \Illuminate\Support\Facades\Crypt::encrypt(csrf_token()) }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 well">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
