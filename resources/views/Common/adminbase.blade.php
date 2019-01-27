<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    @yield('title')
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
@yield('header')
@yield('content')
@section('footer')
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*停用*/
    function member_stop(obj,id,model,status){
        layer.confirm('确认要停用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/startandstop',
                dataType: 'json',
                data:{id:id,model:model,status:status},
                success: function(data){
                    if(data.status=='y'){
                        $(obj).parents("tr").find(".td-manage").prepend('<a class="delete" style="text-decoration:none" onClick="member_start(this,\''+id+'\',\''+model+'\',1)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
                        $(obj).remove();
                        layer.msg('已停用!',{icon: 5,time:1000});
                    }else{
                        layer.msg('请重试!',{icon: 6,time:1000});
                    }
                },
                error:function(data) {
                    //console.log(data.msg);
                },
            });
        });
    }

    /*启用*/
    function member_start(obj,id,model,status){
        layer.confirm('确认要启用吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '/startandstop',
                dataType: 'json',
                data:{id:id,model:model,status:status},
                success: function(data){
                    if(data.status=='y'){
                        $(obj).parents("tr").find(".td-manage").prepend('<a class="delete" style="text-decoration:none" onClick="member_stop(this,\''+id+'\',\''+model+'\',0)"  href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
                         $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                         $(obj).remove();
                         layer.msg('已启用!',{icon: 6,time:1000});
                    }else{
                        layer.msg('请重试!',{icon: 6,time:1000});
                    }

                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    //批量删除
    function  datadel(model){
        layer.confirm('确认要删除吗？',function(index){
            var ids='';
            var check=$("input[name='ids[]']:checked");
            check.each(function(){
                ids+=$(this).val()+',';
            });
            $.post('/deleteall',{model:model,ids:ids},function(res){
                if(res.status=='y'){
                    check.each(function(){
                        var id=$(this).val();
                        $(this).parents("tr").find(".delete").remove();
                        $(this).parents("tr").find(".td-manage").prepend('<a class="delete" style="text-decoration:none" onClick="member_start(this,\''+id+'\',\''+model+'\',0)"  href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                        $(this).parents("tr").find(".td-status").html('<span class="label label-default radius">已停用</span>');
                    });
                    layer.msg('已停用!',{icon: 6,time:1000});
                }else{
                    layer.msg('请重试!',{icon: 6,time:1000});
                }
            });
        })
    }
</script>
@show
</body>
</html>