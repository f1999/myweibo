<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>{{$config[0]->name}}</title>
        
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js">
        </script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js">
        </script>
         <script type="text/javascript" src="/homes/layer/layer.js">
        </script>
        <link rel="stylesheet" href="/homes/css/user.fans.css">
    </head>
    <body style="background:#B4DAF0 no-repeat center center fixed;font: 12px/1.3 'Arial','Microsoft YaHei';background-size: 100% 100%;background-position: top center;">
      
            <div>
                <nav class="navbar navbar-fixed-top" id = "navbar">
                    <div class="container">
                        <div class="navbar-header" id="navbar-header1" >
                            <a href="/home/login">
                            <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$config[0]->logo}}" alt="" style="width:80px;height:27px;margin-top:7px;">
                            </a>
                        </div>
                        <div class="navbar-header" id="navbar-header2">
                            <form action="/home/search" class="navbar-form navbar-right" method="get">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="精彩生活，微博搜索">
                            </div>

                            {{csrf_field()}}
                            <button class="btn btn-warning" type="submit">
                                搜索
                            </button>
                        </form>
                        </div>

                       <div id="nav-1">
                            <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                
                                <a href="/home/details/quit"  title="退出登录" style="text-decoration:none;">
                                退出
                                </a>
                            </div>
                            <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                            
                                <li class="dropdown" style="list-style-type:none">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration:none;">{{$rev->nickName}}<span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="/home/user">个人中心</a></li>
                                    <li><a href="/home/details/edit">个人信息</a></li>
                                    <li><a href="/home/changepass">修改密码</a></li>
                                    <li><a href="/home/message">系统消息</a></li>
                                  </ul>
                                </li>
                            </div>
                            <div style="float:right;line-height: 20px;font-size: 16px;margin-right: 20px;margin-top: 10px">
                               <span class="glyphicon glyphicon-home" aria-hidden="true">
                                                        </span>
                                <a href="/home/login" style="text-decoration:none;">
                                    首页
                                </a>
                            </div>
                    </div>
                        <!--/.navbar-collapse -->
                    </div>
                </nav>
            </div>
        <!-- 头结束 -->

        <!-- 中间开始 -->
            <div class="row" id="weibo">
                <div class="container" >
                    <!-- 头像 及北京-->
                    <div class="container" >
                        <div class="jumbotron" id="backg" style="background:url('/homes/images/2016.jpg');background-repeat:no-repeat">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <!-- 头像 -->
                                <div id="jimg" >
                                     <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$rev->photo}}?imageView2/1/w/200/h/200/q/75|watermark/2/text/bXl3ZWlibw==/font/5a6L5L2T/fontsize/240/fill/I0YxRUZFNg==/dissolve/100/gravity/SouthEast/dx/10/dy/10|imageslim" style="width:100px;" id="img" class="img-circle">

                                    
                                </div>
                                <div>
                                   <!-- 昵称 -->
                                    <div id="nickname" style="font-size: 20px;">
                                        {{$rev->nickName}}&nbsp;&nbsp;
                                        
                                    </div>
                                    <div id="nickName" style="margin-top:10px;font-size: 15px;">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年龄:&nbsp;{{$rev->age}}&nbsp;&nbsp;职业:&nbsp;{{$rev->work}}&nbsp;&nbsp;积分:<span id="fsoc">{{$rev->socre}}</span>&nbsp;&nbsp;&nbsp;性别:&nbsp;
                                        @if($rev->sex=='w')
                                        女
                                        @else
                                        男
                                        @endif
                                        
                                    </div>  
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <!-- 头像 及北京-->
                    <style> 
                    #weibo #lanmu li { margin-top: 5px; font-size: 14px}
                    #weibo #tiezi #tiezi3 button{margin-top: 10px;}
                    </style>

                    <!-- 栏目及遍历   -->
                    <div class="container">
                        <!-- 栏目 -->
                        <div class="col-md-3 sidebar" id="lanmu">
                            <ul class="nav nav-sidebar">
                                <li class="active">
                                    <a href="/home/user">
                                        微博
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/fans">
                                        粉丝
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/attention">
                                        关注
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/photo">
                                        相册
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/point">
                                        我微博的赞
                                        @if($point>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px ">
                                            {{$point}}
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/replay">
                                        微博评论
                                        @if($replay>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px ">
                                            {{$replay}}
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/forward">
                                        微博转发
                                        @if($forward>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  ">
                                            {{$forward}}
                                        </div>
                                        @else
                                        <div></div>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a href="/home/message" style="text-decoration:none;">
                                        系统消息 @if($message>0)
                                        <div style="width: 20px;height: 20px;background:#fa7d3c;float: right;border-radius: 10px;margin-left: 3px;text-align:center;color: #fff;line-height: 20px  ">
                                            {{$message}}
                                        </div>
                                        @else
                                        <div>
                                        </div>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- 栏目结束 -->

                        <!-- 微博 -->
                        <div class="col-md-8 sidebar" id="tiezi"> 

                            <!-- 微博遍历的地方 -->
                            <div class="col-lg-12" style="margin-left: 12px;background-color: #fff;margin-bottom: 10px;width: 830px; ">
                                <h3>粉丝</h3>
                            </div> 


                            <div class="col-lg-12" style="background-color: #fff;margin-left: 12px;width: 830px;padding-bottom: 10px " >
                                 @if($res ->isEmpty())
                                <div style="margin-top: 10px;line-height: 40px;height: 40px">你还没有粉丝哟~~~</div>
                                @else
                                
                               @foreach($res as $k=>$v)
                                <div id="im{{$v->uid}}">
                                <div class="col-lg-4" id="tiezi3" style="float: left;width: 244px;margin-left: 5px;background:#DEDEE5;margin-top: 10px;background-color: #F2F2F5">
                                    <!-- 头像 -->
                                    <div class="col-log-2" style="margin-top:10px;float: left; ">

                                         <img src="http://ozsrs9z8f.bkt.clouddn.com/{{$v->photo}}?imageView2/1/w/35/h/35/q/75"  id="img" class="img-circle" style="float: left ;margin-top:12px;">
                                        
                                    </div>
                                    <!-- 名称和时间 -->
                                    <div class="col-log-8" style="margin-top: 15px;margin-left: 8px;float: left;" >
                                        
                                            <a href="/home/other/user/{{$v->uid}}">{{$v->nickName}}</a><br>   
                                        
                                        
                                            <div style="float: left;font-size: 12px;color: #808080;">
                                                年龄:{{$v->age}}&nbsp;|&nbsp;性别:

                                                @if($v->sex=='m')
                                                男
                                                @elseif($v->sex == 'w')
                                                女
                                                @endif
                                                &nbsp;|&nbsp;工作:
                                                @if($v->work)
                                                {{$v->work}}
                                                @else
                                                暂无
                                                @endif
                                               
                                            </div>
                                        
                                    </div>
                                    <!-- 删除分享的地方 -->
                                    <div class="col-log-12" style="margin-bottom: 100px">
                                        <div style="margin-right: 25px;float: left">
                                                <button class="btn" id="btn{{$v->cid}}" onclick="btn({{$v->uid}})" name="but1">
                                                    删除粉丝
                                                </button>
                                        </div>
                                    </div>
                                    <!-- 删除分享的结束地方 -->
                                </div>
                                </div>
                                @endforeach
                                @endif
                            <!-- 微博遍历结束 -->
                            </div>
                            <div style="float: right">{!! $res->render() !!}</div>

                        <!-- 微博结束 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- 中间结束 -->
     
           
        <!-- footer结束 -->
        </div>
        <script type="text/javascript">
                
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
               }
            });
            function btn(id){ 
            
                $.ajax({
                    url:'/home/fans/'+id,
                    type:'POST',
                    data:{id:id,_token:'{{csrf_token()}}',_method:'delete'},
                    success:function (data){
                       $('#im'+id).remove();
                        layer.msg('删除成功');

                    }
                });
            } 
        </script>
        
    </body>

</html>