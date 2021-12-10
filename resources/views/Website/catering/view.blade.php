@extends('Website.layouts.app')
@section('content')

<!-- restaurent top -->
<div class="page-banner p-relative smoothscroll" id="menu">
    @if($catering->banner)
        <img src="{{ asset('storage/'.$catering->banner) }}" class="img-fluid full-width" alt="banner">
    @else
        <img src="assets/img/banner/banner-3.jpg" class="img-fluid full-width" alt="banner">
    @endif
    <img src="{{ asset('storage/'.$catering->logo) }}" class="logo-pos" alt="logo">
</div>
<!-- restaurent top -->

<section class="browse-cat section-padding" style="padding: 0px 0 40px 0;">
  <div class="section-header-center text-center">

    <h3 class="text-light-black header-title h3">{{$catering->name ?? ''}}</h3>
  </div>
    <div class="container">
        <div class="row">
            
            {!! $catering->desc ?? '' !!}
            
        </div>
            
    </div>
</section>

@endsection
@push('style')
<style type="text/css">
    .logo-pos{
        background-color: #fff;
        position: absolute;
        width: 180px !important;
        height: auto !important;
        bottom: 4%;
        right: 5%;
    }
    p strong{
        color: #ec2229;
    }
</style>
@endpush
@push('script')
@endpush