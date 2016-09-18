<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>若邻汇</title>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 45px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Auth::guest())
        <div class="top-right links">
            <a href="{{ url('/login') }}">登录</a>
            <a href="{{ url('/register') }}">注册</a>
        </div>
        @else
        <div class="top-right links">
            <a href="{{ url('backend') }}">控制台</a>
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            若邻汇
        </div>

        <div class="links">
            <a href="https://laravel.com/docs" target="_black">关于我们</a>
            <a href="#">联系我们</a>
            <a href="#">新闻</a>
            <a href="#">博客</a>
        </div>
    </div>
</div>
</body>
</html>
