@extends('Website.layouts.app')
@section('content')
@php
@endphp
<!-- restaurent top -->
<div class="page-banner p-relative smoothscroll" id="menu">
    <img src="assets/img/pizza-banner.jpg" class="img-fluid full-width" alt="banner">  
</div>
<!-- restaurent top -->

<section class="checkout-area pt-4 pb-4">
    <div class="container">
        <div class="section-header-center text-center mb-5">
            <h1 class="text-light-black header-title">Checkout</h1>
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
            action="{{route('stripe.post')}}"
            method="post"
            class="require-validation"
            data-cc-on-file="false"
            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
            id="payment-form">
            @csrf
            <input type="hidden" name="restaurant_id" value="{{ $restaurant->id ?? '' }}">
            <input type="hidden" name="vendor_id" value="{{ $restaurant->user_id ?? '' }}">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if(!Auth::check())
                    <div class="user-actions">
                        <i class="fa fa-sign-in-alt"></i>
                        <span>Returning customer? <a href="{{url('login')}}">Click here to login</a></span>
                    </div>
                    @endif
                    <div class="billing-details">
                        <h3 class="title">Billing Details</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" value="{{Auth::user()->name ?? ''}}">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{$message}} </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email"  value="{{Auth::user()->email ?? ''}}">
                                    @error('email')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="phone">
                                    @error('phone')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="address">
                                    @error('address')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="form-control" name="country">
                                        <option value="{{$restaurant->country ?? ''}}">{{$restaurant->country ?? ''}}</option>
                                    </select>
                                    @error('country')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>City <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="city" value="{{ $restaurant->city ?? '' }}">
                                    @error('city')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>State<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="state" value="{{ $restaurant->state ?? '' }}">
                                    @error('state')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="postalcode">
                                    @error('postalcode')
                                        <span class="text-danger">{{$message}} </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="notes" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="order-details">
                        <div class="cart-totals">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li>Subtotal <span class="sub-total">$0.00</span></li>
                                <li>Shipping <span class="shiping-charge">$0.00</span></li>
                                <li>Tax <span class="tax-amount">$0.00</span></li>
                                <li>Payable Total <span class="pay-total">$0.00</span></li>
                                <input type="hidden" name="sub_total">
                                <input type="hidden" name="grand_total">
                                <input type="hidden" name="shiping">
                                <input type="hidden" name="tax">
                                <div class="add-items"></div>
                            </ul>
                            {{-- <a  class="mt-4 btn-first green-btn text-custom-white full-width fw-500 @if(Auth::check()) proceedcheckout-btn @endif">Proceed to Checkout</a> --}}
                        </div>
                        <div class="payment-box">
                            <h3 class="title">Payment Method</h3>
                            <div class="payment-method">
                                <p>
                                    <input type="radio" id="cash-on-delivery" name="radio_group" value="cod">
                                    <label for="cash-on-delivery">Cash on Delivery</label>
                                </p>
                                <p>
                                    <input type="radio" id="card" name="radio_group" value="stripe">
                                    <label for="card">Online Payment</label>
                                </p>

                                <div class="card-details d-none">
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
                                       <div class='col-md-12 error form-group d-none'>
                                          <div class='alert-danger alert'>
                                          </div>
                                       </div>
                                    </div>    
                                </div>
                            </div>
                            @if(Auth::check())
                                <button type="button" class="mt-4 btn-first green-btn text-custom-white full-width fw-500 place-order-btn">Place Order</button>
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
@push('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{asset('js/front/checkout.js')}}"></script>
<script type="text/javascript">
    
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var paymentmode = $("input[name='radio_group']:checked").val();
            
            if (paymentmode=='stripe') {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
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
            }
        });
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('d-none')
                    .find('.alert')
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