@extends('Website.layouts.app')
@section('content')


 <!-- Navigation -->
    <!-- restaurent top -->
    <div class="page-banner p-relative smoothscroll" id="menu">
        <img src="assets/img/salad-banner.jpg" class="img-fluid full-width" alt="banner">
    </div>
    <!-- restaurent top -->

    <!-- restaurent details -->
    <section class="restaurent-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="restaurent-area">
                        <div class="restaurent-logo">
                            <img src="assets/img/user/user.png" class="img-fluid" alt=""  style="display:block;margin: auto;">
                        </div>
                    </div>
                    <div class="row mmt">
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                            <div class="heading padding-tb-10">
                                <h3 class="text-light-black title fw-700 no-margin">{{ Auth::user()->name ?? '' }}</h3>
                                <p class="text-light-black sub-title no-margin"></p>
                               
                            </div>
                        </div> 
                        <div class="col-md-4">
                            {{-- <a href="#" class="btn33 mt-4"><i class="fa fa-users"></i> Start a group order</a> --}}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent details -->
    
   
    <!-- restaurent meals -->
    <section class="section-padding restaurent-meals restaurent-order">
        <div class="container">
            <div class="row">
               <div class="col-xl-1 col-lg-1"></div>
                <div class="col-xl-10 col-lg-10">
                	@if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    @forelse($data as $key=>$value)
                    <div class="row">
                        <div class="col-lg-12 mt-4 restaurent-det">
                            <div class="section-header-left mb-2">
                                <h3 class="text-light-black header-title ">#{{$value->order_number ?? ''}} | &nbsp;&nbsp; {{ $value->restaurant->name ?? '' }} | &nbsp;&nbsp; Total: ${{$value->grand_total ?? ''}} |&nbsp;&nbsp; {{Date("D d-M-Y",strtotime($value->created_at))}}</h3>
                                <div><hr></hr></div>
                            </div>
                            <div class="row">
                                @foreach($value->orderItem as $kii=>$val)
                                 @php
                                    if (!$val->menuItem->menu_price->isEmpty()) {
                                        
                                        $qunty = $val->menuItem->menu_price[0];
                                        $discountType = $val->menuItem->discount_type;
                                        $discount = $val->menuItem->discount;
                                        $estimate = $val->menuItem->estimated_time;
                                    }
                                @endphp
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product-box mb-xl-20">
                                        <div class="product-img">
                                            <a href="#">
                                                <img src="{{ asset('storage/'.$val->menuItem->image) }}" class="img-fluid full-width" alt="product-img" style="height:200px;">
                                            </a>
                                            <div class="overlay">
                                                <div class="product-tags padding-10"> 
                                                    <div class="custom-tag"> 
                                                        <span class="text-custom-white rectangle-tag bg-gradient-red">{{$discount}}@if($discountType==1)$ @else% @endif</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="title-box">
                                                <h6 class="product-title"><a href="javascript:void(0)" class="text-light-black dish-name">{{ $val->menuItem->name ?? '' }}</a></h6>
                                                <div class="tags"> 
                                                    <span class="text-custom-white rectangle-tag bg-green">4.1</span>
                                                </div>
                                            </div>
                                            <p class="text-light-white">Quantity: <span class="dish-qunt">{{ $qunty->name ?? '' }}</span></p>
                                            <div class="product-details">
                                                <div class="price-time"> 
                                                    <span class="text-light-black time">{{$estimate}}-{{$estimate+10}} min</span>
                                                    <span class="text-light-white price">${{ $qunty->pivot->price ?? '' }} </span>
                                                </div>
                                                <div class="rating"> 
                                                    <span>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                        <i class="fas fa-star text-yellow"></i>
                                                    </span>
                                                    <span class="text-light-white text-right">4225 ratings</span>
                                                </div>
                                            </div>
                                            @if($value->order_status===7)
                                            <a href="{{route('webiste.menu.index',$value->restaurant->slug)}}" class="btn44 mt-4">Order Again</a>
                                            @else
                                            <button class="btn44 mt-4" type="button">{{ Config::get('constant.order_status')[$value->order_status] ?? '' }}</button>    
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if($value->admin_comment)
                                <div class="col-lg-12 mt-1 d-flex">
                                    <strong class="text-success">Offer </strong> &nbsp;&nbsp;&nbsp;{!! $value->admin_comment ?? '' !!}
                                </div>
                                @endif

                            </div>
                            <br>
                            <button class="btn btn-success btn-sm" data-toggle="collapse" href="#collapseExample{{$key}}" role="button" aria-expanded="false" aria-controls="collapseExample{{$key}}">Send Message to Delivery Boy</button>
                        
                            <div class="collapse" id="collapseExample{{$key}}">
                              <div class="card card-body">
                                    <div class="row messaging">
                                        <div class="col-lg-12 col-md-12">
                                            @if($value->delivery_user_id)
                                            <div class="mesgs border m-1">
                                              <div class="msg_history">
                                                <div class="incoming_msg">
                                                    @if($value->chats!=null && !$value->chats->isEmpty())
                                                    @foreach($value->chats as $key=>$vala)
                                                        @if($vala->sender_id == $value->delivery_user_id)
                                                        <div class="incoming_msg_img"> <img src="assets/img/user/user.png" style="max-height: 50px;" alt="sunil"> </div>
                                                        <div class="received_msg m-1">
                                                            <div class="received_withd_msg">
                                                              <p><strong>Delivery Boy</strong><br>{!! $vala->message ?? '' !!}</p>
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="outgoing_msg">
                                                            <div class="sent_msg">
                                                            <p><strong>You</strong><br>{!! $vala->message ?? '' !!}</p>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                </div>
                                                <div class="type_msg">
                                                    <form action="{{route('chat.message')}}" method="POST">
                                                    @csrf
                                                    <div class="input_msg_write">

                                                        <input type="hidden" name="sender_id" value="{{Auth::id() ?? ''}}">
                                                        <input type="hidden" name="reciver_id" value="{{$value->delivery_user_id ?? ''}}">
                                                        <input type="hidden" name="order_id" value="{{$value->id ?? ''}}">
                                                        <input type="text" class="write_msg" placeholder="Type a message" name="message" >
                                                        <button class="msg_send_btn"  type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            @else
                                            <div class="text-danger">This feature will be enable when delivery boy is assiged.</div>
                                            @endif
                                        </div>
                                    </div>
                              </div>
                            </div>

                        </div>
                    </div>
                    @empty
                    <div class="">
                        <h3 class="text-danger header-title title">No order found!</h3>
                        <a href="{{url('/')}}" class="btn44 mt-4" style="width: 10em;">Order Now</a>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <!-- restaurent meals -->
    
@endsection
@push('styles')
<style type="text/css">
    .restaurent-det{
        box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
        padding: 10px;
        border-radius: 7px;
    }
    
    .inbox_people {
      background: #f8f8f8 none repeat scroll 0 0;
      float: left;
      overflow: hidden;
      width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
      border: 1px solid #c4c4c4;
      clear: both;
      overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
      display: inline-block;
      text-align: right;
      width: 60%;
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
      color: #05728f;
      font-size: 21px;
      margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      padding: 0;
      color: #707070;
      font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
      float: left;
      width: 11%;
    }
    .chat_ib {
      float: left;
      padding: 0 0 0 15px;
      width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
      border-bottom: 1px solid #c4c4c4;
      margin: 0;
      padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
      display: inline-block;
      width: 6%;
    }
    .received_msg {
      display: inline-block;
      padding: 0 0 0 10px;
      vertical-align: top;
      width: 92%;
     }
     .received_withd_msg p {
      background: #ebebeb none repeat scroll 0 0;
      border-radius: 3px;
      color: #646464;
      font-size: 14px;
      margin: 0;
      padding: 5px 10px 5px 12px;
      width: 100%;
    }
    .time_date {
      color: #747474;
      display: block;
      font-size: 12px;
      margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
      padding: 30px 15px 0 25px;
    }

     .sent_msg p {
      background: #ec2229 none repeat scroll 0 0;
      border-radius: 3px;
      font-size: 14px;
      margin: 0; color:#fff;
      padding: 5px 10px 5px 12px;
      width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
      float: right;
      width: 46%;
    }
    .input_msg_write input {
      background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
      border: medium none;
      color: #4c4c4c;
      font-size: 15px;
      min-height: 48px;
      width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
      background: #05728f none repeat scroll 0 0;
      border: medium none;
      border-radius: 50%;
      color: #fff;
      cursor: pointer;
      font-size: 17px;
      height: 33px;
      position: absolute;
      right: 0;
      top: 11px;
      width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
      max-height: 500px;
      overflow-y: auto;
    }
</style>
@endpush
@push('script')
<script type="text/javascript" src="{{asset('js/front/order_history.js')}}"></script>
@endpush