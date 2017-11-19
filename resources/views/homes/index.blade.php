@extends('homes/layout/home')

@section('content')


@foreach($index as $k=>$v)
                                                    
    <div class="list_des">
        <a href="/home/replay/{{$v->cid}}">
        <h3 class="list_title_s">
            <div>
                {{$v->content}}
            </div>
        </h3>
        </a>
        <div class="subinfo_box clearfix">
            
                <span class="subinfo_face ">
                    <img src="{{$v->photo == NULL ? '/homes/uploads/default.jpg' : $v->photo}}" alt="" width="20" height="20">
                </span>
            
            
                <span class="subinfo S_txt2">
                    {{$v->nickName}} 
                </span>
           
            <span class="subinfo S_txt2">
                {{date('Y-m-d H:i:s',$v->time)}} 
            </span>

            <a href="/home/point/{{$v->cid}}">
            <span class="subinfo_rgt S_txt2">
                <em class="W_ficon ficon_praised S_ficon W_f16">
                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                </em>
                <em>
                    {{$v->pnum}} 
                </em>
            </span>
            </a>

            <a href="/home/replay/{{$v->cid}}">
            <span class="rgt_line W_fr">
            </span>
            <span class="subinfo_rgt S_txt2">
                <em class="W_ficon ficon_repeat S_ficon W_f16">
                   <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                </em>
                <em>
                    {{$v->rnum}} 
                </em>
            </span>
            </a>

            <a href="/home/forward/{{$v->cid}}">
            <span class="rgt_line W_fr">
            </span>
            <span class="subinfo_rgt S_txt2">
                <em class="W_ficon ficon_forward S_ficon W_f16">
                    <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
                </em>
                <em>
                    {{$v->fnum}} 
                </em>
            </span>
            </a>
        </div>
    </div>
        
    <hr>

@endforeach

@endsection