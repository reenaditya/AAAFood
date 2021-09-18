@extends('Website.layouts.app')
@section('content')
	@if (Session::has('success'))
        <div class="alert alert-success text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
@endsection
@push('script')
<script type="text/javascript" src="{{asset('js/front/order_history.js')}}"></script>
@endpush