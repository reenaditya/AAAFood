@extends('Website.layouts.app')
@section('content')

<!-- restaurent top -->
<div class="page-banner p-relative smoothscroll" id="menu">
    <img src="assets/img/banner/banner-3.jpg" class="img-fluid full-width" alt="banner">
</div>
<!-- restaurent top -->

<section class="browse-cat section-padding" style="padding: 0px 0 40px 0;">
  <div class="section-header-center text-center">
    <h3 class="text-light-black header-title h3">Catering Listing</h3>
  </div>
    <div class="container">
        <div class="row">
            
            @if(!$data->isEmpty())
            @foreach($data as $key=>$value)
                <div class="col-3">
                    <div class="category-slider swiper-container">
                        
                        <a href="{{route('webiste.catering.view',$value->id)}}" class="categories">
                            <div class="icon2 text-custom-white bg-light-green ">
                                @if($value->logo)
                                <img src="{{asset('storage/'.$value->logo)}}" class="rounded-circle" alt="" style="max-width:180px;">
                                @else
                                <img src="assets/img/image_not_f.jpeg" class="rounded-circle" alt="">
                                @endif
                            </div> 
                        </a>
                    
                    </div>
                </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

@endsection
@push('script')
@endpush