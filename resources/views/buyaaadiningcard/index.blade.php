@extends('Website.layouts.app')
@section('content')
@php
$aaadining_club = Config::get('constant.aaadining_club');
@endphp

<section class="checkout-area pt-4 pb-4">
    <div class="container">
        <div class="section-header-center text-center mb-5">
            <h1 class="text-light-black header-title">{{ Settings::get('general_setting_top_header_aaadining_club') }}</h1>
        </div>    
        
        @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('error') }}</p>
            </div>
        @endif	

         <form
            role="form"
            method="post"
            class="require-validation"
            data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
            id="payment-form">
            @csrf
            
            <div class="row">
            	<div class="col-lg-2 col-md-2"></div>
            	<div class="col-lg-8 col-md-8">
                    <div class="order-details">
                        <div class="payment-box">
                            <h3 class="title">Total Payments &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ${{ Settings::get('general_setting_aaadining_club_charges') }}</h3>
                            
                            <div class="payment-method">
                                <div class="card-details">
                                    <div class='form-row row'>
                                       <div class='col-xs-12 col-md-12 form-group required'>
                                          <label class='control-label'>Name on Card</label> <input
                                             class='form-control' size='4' type='text'>
                                       </div>
                                    </div>
                                    <div class='form-row row'>
                                       <div class='col-xs-12 col-md-12 form-group card required'>
                                          <label class='control-label'>Card Number</label> <input
                                             autocomplete='off' class='form-control card-number' size='20'
                                             type='text'>
                                       </div>
                                    </div>
                                    <div class='form-row row'>
                                       <div class='col-xs-12 col-md-4 form-group cvc required'>
                                          <label class='control-label'>CVC</label> <input autocomplete='off'
                                             class='form-control card-cvc' placeholder='ex. 311' size='4'
                                             type='text'>
                                       </div>
                                       <div class='col-xs-12 col-md-4 form-group expiration required'>
                                          <label class='control-label'>Exp Month</label> <input
                                             class='form-control card-expiry-month' placeholder='MM' size='2'
                                             type='text'>
                                       </div>
                                       <div class='col-xs-12 col-md-4 form-group expiration required'>
                                          <label class='control-label'>Exp Year</label> <input
                                             class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                             type='text'>
                                       </div>
                                    </div>
                                    <div class='form-row row'>
                                       <div class='col-md-12 carderror form-group d-none'>
                                          <div class='alert-danger alert card-alert'>
                                          </div>
                                       </div>
                                    </div>    
                                </div>
                            </div>
                            @if(Auth::check())
                                <button type="submit" class="mt-4 btn-first green-btn text-custom-white full-width fw-500 place-order-btn">{{ Settings::get('general_setting_top_header_aaadining_club') }} at ${{ Settings::get('general_setting_aaadining_club_charges') }}</button>
                            @else
                                <a href="{{url('login')}}" class="mt-4 btn-first green-btn text-custom-white full-width fw-500">Please login</a>
                             @endif
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</section>

@endsection
@push('style')
@endpush
@push('script')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
    
	    $(function() {
	        var $form = $(".require-validation");
	        $('form.require-validation').bind('submit', function(e) {
	            
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.carderror'),
                    valid = true;
                $errorMessage.addClass('d-none');
                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
	            
	        });
	        function stripeResponseHandler(status, response) {
	            if (response.error) {
	                $('.carderror')
	                    .removeClass('d-none')
	                    .find('.card-alert')
	                    .text(response.error.message);
	            } else {
	                /* token contains id, last4, and card type */
	                var token = response['id'];
	                $form.find('input[type=text]').empty();
	                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
	                $form.get(0).submit();
	            }
	        }
	    });
	</script>
@endpush