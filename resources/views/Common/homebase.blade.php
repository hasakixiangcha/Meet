<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="stylesheet" href="/Home/css/common.css" />
    @yield('head','顶部')
</head>
<body>
<!--头部开始-->
@section('header')

@show
<!--头部结束-->
<!--轮播图开始-->
@section('carousel')

@show
<!--轮播图结束-->
@yield('content')

<footer id="footer">
    CopyRight 2017 湘ICP备15018437号-1 地址：长沙市岳麓区西御街西御大厦A座25楼
</footer>
</body>
<script src="/Home/js/jquery-3.1.1.min.js"></script>
@yield('javascript')
</html>
