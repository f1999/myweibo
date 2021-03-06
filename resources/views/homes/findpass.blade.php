<!DOCTYPE html>
<html>
    
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <meta charset="utf-8">
        <meta name="csrf_token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1,minimum-scale=1">
        <meta content="忘记密码" name="description">
        <link rel="shortcut icon" type="image/x-icon" href="">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/homes/bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="/homes/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="/homes/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{asset('/homes/layer/layer.js')}}"></script>

        <title>
            忘记密码
        </title>
    </head>
    <style>
        #a{background: #FF4741;width:auto;height:3px}
        .col-md-12{/*border:solid 2px red;*/height: 200px;}
        .W_nologin_logo_big{height: 72px;margin: 80px auto 0;width: 200px;/*border:solid 2px blue;*/ }
        #redis{width:300px;margin-top:35px;font-size:36px;font-family:微软雅黑}
        .rr{height: 4px;background:#FFA00A;width:140px}
        .col-sm-2 {font-size:20px;}
        .form-control{height:40px}
        .btn {height:40px}

    </style>
    <!-- #9ECCEA -->
    <body style="background:#B4DAF0">
        <div id="a"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="background: url('/homes/images/2016.jpg');">
                    <div class="W_nologin_logo_big">
                        <a href="/home/login" style="text-decoration:none;">
                        <h1 style="color:white;font-style:oblique"><b>{{$config[0]->name}}</b></h1>
                        </a>
                    </div>
                </div>
                <div class="col-md-12" style="height:500px;background:white;border-radius:10px">
                    <div class="col-md-12" style="height:130px;">
                        <div id="redis">忘记密码</div>
                        <div class="rr"></div>
                        
                    </div>
                    <div class="col-md-12" style="height:360px;">
                        <div class="col-md-12" style="height:300px;margin-top: 30px">
                            <form class="form-horizontal" method="post" action="/home/admin/find/fupdate" onsubmit="return mysubmit();">
                                  <div class="form-group" >
                                    <label for="inputphone3" class="col-sm-2 control-label" ><span style="color:red;margin-right: 5px;">*</span>手机号:</label>
                                    <div class="col-sm-4" maxlength="11" style="width: 800px;height:40px">
                                      <input type="text" class="form-control"  placeholder="请输入手机号" name="phone" id="phone" style="width: 345px;float: left" value="" maxlength="11" required>
                                      <span id="spa" style="float:left;margin-left: 10px;margin-top: 7px;color:#3EA0E1;font-size:18px"></span>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputcode3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>短信验证:</label>
                                    
                                    <div class="col-sm-offset-2 col-sm-2" style="margin-left:2px">
                                      <input type="submit" class="btn btn-default" id="btn1" style="font-size:16px;width:170px" value="获取短信验证码">
                                    </div>

                                    <div class="col-sm-2" style="width: 600px;height:40px">
                                      <input type="text"  maxlength="6" class="form-control"  name="code" placeholder="输入验证码" name="code" id="code" style="width: 156px;float: left" maxlength="6" required>
                                      <span id="spa3" style="float:left;margin-left: 10px;margin-top: 10px;color:#3EA0E1;font-size:18px">
                                    </div>
                                    
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>修改密码:</label>
                                    <div class="col-sm-4" style="width: 800px;height:40px">
                                      <input type="password" class="form-control" maxlength="16" placeholder="请设置密码" name="password" id="password" style="width: 345px;float: left;" value="" maxlength="12" required>
                                      <span id="spa1" style="float:left;margin-left: 10px;margin-top: 10px;color:#3EA0E1;font-size:18px">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label"><span style="color:red;margin-right: 5px;">*</span>确认密码:</label>
                                    <div class="col-sm-4" maxlength="16" style="width: 600px;height:40px">
                                      <input type="password" class="form-control" placeholder="再输一遍密码" name="surepass" id="surepass" style="width: 345px;float: left" maxlength="12" required>
                                      <span id="spa2" style="float:left;margin-left: 10px;margin-top: 10px;color:#3EA0E1;font-size:18px">
                                    </div>
                                  </div>
                                  
                                  <div class="form-group" style="margin-top:30px">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {{csrf_field()}}
                                      <input type="submit" value="立即修改" style="background:#FFA00A; color:white;width:200px;height:40px;border-radius:5px;font-size:19px" id="btn2">
                                      不修改密码,
                                      <a href="/home/admin">前去登录>></a>
                                    </div>
                                  </div>
                                </form>
                        </div>
                        
                    </div>

                    <!-- 底部 -->
                    <div class="col-md-12" style="height:50px;margin-top: 30px;text-align: center;">
                        <div class="left_link" style="width:500px;float:left;">
                            <span>友情连接：</span>
                            @foreach($link as $k=>$v)
                            @if($v->status==0)
                                <a href="//{{$v->link}}" target="_blank" class="S_txt2" style="text-decoration:none;">{{$v->user}}</a>
                            @endif
                            @endforeach
                        </div>

                        <div class="copy" style="width:200px;float:right;margin-right: 100px">
                        <a href="#" class="S_txt2" style="text-decoration:none;">版权：{{$config[0]->bank}}    出品</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
      
      <script>   

       //表单验证
        var phones = document.getElementById('phone');
        var password = document.getElementById('password');
        var surepass = document.getElementById('surepass');
        var spa = document.getElementById('spa');
        var spa1 = document.getElementById('spa1');
        var spa2 = document.getElementById('spa2');
        var spa3 = document.getElementById('spa3');
        var code = document.getElementById('code');
       
        //手机号获取焦点事件
        phones.onfocus = function(){

            //添加提示信息
            spa.innerHTML= '请输入11位手机号!';

        }
 
        //手机号移出事件
        phones.onmouseout = function(){

            //获取手机号
            var phone = this.value;

            //写正则
            var reg = /^1[34578]\d{9}$/;

            // console.log(pv);
            //检测
            var check = reg.test(phone);

            // console.log(check);
            //判断手机号是否为空,在判断正则
            if(phone==""){

                spa.innerHTML= '手机号不能为空!';
                spa.style.color='red';
                $('#btn1').attr('disabled',true);
            }else if(check){

                //ajax传过去链接数据库检验手机号
                $.get('/home/admin/find/phone',{phone:phone},function(data){
                // console.log(data);
                    if(data==1){
                        spa.innerHTML= '√';
                        spa.style.color='green';
                        $('#btn1').attr('disabled',false);
                    }else{
                        spa.innerHTML= '手机号还未注册,请先去注册!';
                        spa.style.color='red';
                        $('#btn1').attr('disabled',true);
                     
                    }
                    
                });
            }else{

                spa.innerHTML= '手机号格式不正确!';
                spa.style.color='red';
                $('#btn1').attr('disabled',true);
              
            }
         
            
        };
    
        //验证码发送ajax
        $('#btn1').click(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
               }
            });

            var phone = $('input[name=phone]').val();
            // console.log(phone);

            $.post('/home/code',{phone:phone},function(data){

              if(data){
                    layer.alert('验证码发送成功！');
                }else{
                    layer.alert('验证码发送失败！')
                }
            });

            return false;
        });

        
        //验证码获取焦点事件
        code.onfocus = function(){

            //添加提示信息
            spa3.innerHTML= '请输入验证码';

        }

        //验证码鼠标移出事件
        code.onmouseout = function(){

            //获取验证码
            code = this.value;
            // console.log(code);


            $.get('/home/register/code',{code:code},function(data){
                console.log(code);
                console.log(data);

                if(code==""){

                    spa3.innerHTML= '验证码不能为空!';
                    spa3.style.color='red';
                 
                }else if(code==data){
                    spa3.innerHTML= '√';
                    spa3.style.color='green';
                    $('#btn2').attr('disabled',false);
                  
                }else{
                    spa3.innerHTML= '验证码不正确!';
                    spa3.style.color='red';
                    $('#btn2').attr('disabled',true);
                  
                }
            });
            
        };


        //密码获取去焦点事件
        password.onfocus = function(){

            //添加提示信息
            spa1.innerHTML= '请输入6-12位数字,字母或常用符号!';

        }

        //密码鼠标移出事件
        password.onmouseout = function(){

            //获取密码
            pass = this.value;

            //写正则
            var reg = /^\S{6,12}$/;

            // console.log(pv);
            //检测
            var check = reg.test(pass);

            // console.log(check);
            if(pass==""){

                spa1.innerHTML= '修改密码不能为空!';
                spa1.style.color='red';
               

            }else if(check){

                spa1.innerHTML= '√';
                spa1.style.color='green';
                $('#btn2').attr('disabled',false);
              
            } else {

                spa1.innerHTML= '密码格式不正确!';
                spa1.style.color='red';
                $('#btn2').attr('disabled',true);
             
            }
        };

        //确认密码获取焦点事件
        surepass.onfocus = function(){

            //添加提示信息
            spa2.innerHTML= '再输一遍密码';

        }
        //确认密码移出事件判断确认密码
        surepass.onmouseout = function(){

            //获取密码
            var surepass = this.value;

            if(surepass==""){

                spa2.innerHTML='密码不能为空';
                spa2.style.color='red';
             
            }else if(surepass==pass){

                spa2.innerHTML= '√';
                spa2.style.color='green';
                $('#btn2').attr('disabled',false);
              
            } else {

                spa2.innerHTML= '两次密码不一致!';
                spa2.style.color='red';
                $('#btn2').attr('disabled',true);
              
            }
        };

     </script>
    </body>


</html>