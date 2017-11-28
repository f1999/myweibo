<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\user;
use App\Http\Model\user_info;
use App\Http\Model\label;
use App\Http\Model\contents;
use App\Http\Model\user_attention;
use App\Http\Model\forward;
use App\Http\Model\job;

use Hash;
use Session;


class LoginController extends Controller
{
    
    //加载主页页面
    public function index()
    {

      //获取登录用户ID
      $uid = Session('uid');

      //查询登录用户信息 
     	$user = user_info::where('uid',$uid)->first();

     	//查询登录用户关注数量
     	$unum = user_attention::where('uid',$uid)->count();

     	//查询登录用户粉丝数量
     	$gnum = user_attention::where('gid',$uid)->count();

     	//查询登录用户微博数量
     	$cnum = contents::where('uid',$uid)->count();

      //查询微博内容
      $index = contents::join('user_info',function($join){
      	$join->on('contents.uid','=','user_info.uid');
      })->orderBy('time','desc')->paginate(10);

    	return view('homes/login',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    //微博内容搜索
    public function search(Request $request)
    {
      //获取登录用户ID
      $uid = Session('uid');

      //查询登录用户信息
      $user = user_info::where('uid',$uid)->first();

      //查询登录用户关注数量
      $unum = user_attention::where('uid',$uid)->count();

      //查询登录用户粉丝数量
      $gnum = user_attention::where('gid',$uid)->count();

      //查询登录用户微博数量
      $cnum = contents::where('uid',$uid)->count();

      //查询搜索内容
      $index = contents::join('user_info','contents.uid','=','user_info.uid')
      ->where('content','like','%'.$request->input('search').'%')
      ->orWhere('nickName','like','%'.$request->input('search').'%')
      ->orderBy('time','desc')
      ->paginate(10);


      return view('homes/blog/search',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index,'request'=>$request]);
    }


    //加载热门微博页面
    public function hot ()
    {
      //获取用户ID
      $uid = Session('uid');

      //查询登录用户信息
     	$user = user_info::where('uid',$uid)->first();

     	//查询登录用户关注数量
     	$unum = user_attention::where('uid',$uid)->count();

     	//查询登录用户粉丝数量
     	$gnum = user_attention::where('gid',$uid)->count();

     	//查询登录用户微博数量
     	$cnum = contents::where('uid',$uid)->count();

  	//查询热门微博内容
      $index = contents::join('user_info',function($join){
      	$join->on('contents.uid','=','user_info.uid');
      })->where('hot',1)
      ->orWhere('fnum','>',1)
      ->orWhere('rnum','>',1)
      ->orderBy('time','desc')
      ->paginate(10);

     return view('homes/login',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    //加载标签微博页面
    public function label ($id)
    {
      //获取用户ID
      $uid = Session('uid');

      //查询登录用户信息 session('uid')
     	$user = user_info::where('uid',$uid)->first();

     	//查询登录用户关注数量
     	$unum = user_attention::where('uid',$uid)->count();

     	//查询登录用户粉丝数量
     	$gnum = user_attention::where('gid',$uid)->count();

     	//查询登录用户微博数量
     	$cnum = contents::where('uid',$uid)->count();

      //查询标签微博内容
      $index = contents::join('user_info',function($join){
      	$join->on('contents.uid','=','user_info.uid');
      })->where('label','like','%'.$id.'%')
      ->orderBy('time','desc')
      ->paginate(5);

      return view('homes/login',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    //加载微博转发页面
    public function forward ()
    {
      //获取用户ID
      $uid = Session('uid');

      //查询登录用户信息
      $user = user_info::where('uid',$uid)->first();

      //查询登录用户关注数量
      $unum = user_attention::where('uid',$uid)->count();

      //查询登录用户粉丝数量
      $gnum = user_attention::where('gid',$uid)->count();

      //查询登录用户微博数量
      $cnum = contents::where('uid',$uid)->count();

      //查询转发内容相关
      $index = forward::with('contents.user_info','user_info')->orderBy('time','desc')->paginate(10);
      // dd($index);
      

      return view('homes/forward',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    //加载我的关注页面
    public function attention ()
    {
      //获取用户ID
      $uid = Session('uid');

      //查询登录用户信息
      $user = user_info::where('uid',$uid)->first();

      //查询登录用户关注数量
      $unum = user_attention::where('uid',$uid)->count();

      //查询登录用户粉丝数量
      $gnum = user_attention::where('gid',$uid)->count();

      //查询登录用户微博数量
      $cnum = contents::where('uid',$uid)->count();

      //查询我的关注
      $index = user_attention::with('contents','user_info')->where('uid',$uid)->orderBy('time','desc')->paginate(10);
    
      return view('homes/attent',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }

    //加载微博找人
    public function job ($id)
    {
      //获取用户ID
      $uid = Session('uid');

      //查询登录用户信息
      $user = user_info::where('uid',$uid)->first();

      //查询登录用户关注数量
      $unum = user_attention::where('uid',$uid)->count();

      //查询登录用户粉丝数量
      $gnum = user_attention::where('gid',$uid)->count();

      //查询登录用户微博数量
      $cnum = contents::where('uid',$uid)->count();

      //获取相关职业
      $job = job::where('id',$id)->first();

      //查询用户
      $index = user_info::where('work',$job->job)->paginate(10);
    
      return view('homes/job',['uid'=>$uid,'user'=>$user,'unum'=>$unum,'gnum'=>$gnum,'cnum'=>$cnum,'index'=>$index]);
    }



    //验证手机号是否已注册
    public function pho(Request $request)         
    {
    	//获取form表单填写的手机
      $pho = $request->input('pho'); 

      //在数据表中查询填写的手机号        
      $res = user::where('phone',$pho)->value('phone');            
           
      //判断input框里的手机号是否为空
      if($pho==null){

      }else{
        //判断form获取的手机号和user表中是否一致
        if ($pho==$res) {
          echo "1";
        }else{
          echo "0";
        }
      }
    }

    //验证密码是否与数据库中的一致
    public function pass(Request $request)         
    {
    	//获取表单中填写的密码和手机号
     	$pas = $request->only('pas','pho');
     	// dd($pas);       	

      //在数据表中查询填写的手机号并获取一条数据       
      $res = user::where('phone',$pas['pho'])->first();            
    	
      //判断input框里的密码是否为空
      if($pas['pas']==null){

      }else{
        //判断form获取的密码和数据库中是否一致(hash的检测方法,指定子串和加密的判断)
        if (Hash::check($pas['pas'], $res->password)) {
          echo "1";
        }else{
          echo "0";
        }
      }
      	
    }

    // 检测昵称是否存在
    public function nick(Request $request)
    {   

      //获取form中的手机号
      $req = $request->input('phone');

      //在user表中根据手机号获取其ID
      $res = user::where('phone',$req)->value('id');

      //在user_info表中根据user表中的id查出其uid
      $uid = user_info::where('uid','=',$res)->value('uid');
      
      
      //判断uid是否为空(因为上面传过来的是null)
      if($uid==null){

          Session(['uid'=>$res]);

          return redirect('/home/details');
         
      }else{

          Session(['uid'=>$res]);

          return redirect('/home/login');

      }

    }
    

}
