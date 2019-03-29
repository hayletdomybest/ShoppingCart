@extends('layout.master')
@section('title')
付款資料填寫
@endsection

@section('content')
    <div class='row justify-content-center mb-4 mt-4'>
        <div class='col-md-4'>
        <form accept-charset="UTF-8" action="{{route('paymentFinish')}}" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" />
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label'>Name on Card</label>
                <input class='form-control' size='20' type='text'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-12 form-group required'>
                <label class='control-label' for='card-number'>Card Number</label>
                <input autocomplete='off' class='form-control' size='20' type='text' id='card-number'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-xs-4 form-group cvc required'>
                <label class='control-label' for='card-cvc'>CVC</label>
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' id='card-cvc'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label' for='card-expiry-month'>Expiration</label>
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' id='card-expiry-month'>
              </div>
              <div class='col-xs-4 form-group expiration required'>
                <label class='control-label' for='card-expiry-year'> </label>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' id='card-expiry-year'>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 form-group'>
                <button class='form-control btn btn-primary submit-button' type='submit'>結帳${{$total}}</button>
              </div>
            </div>
            <div class='form-row'>
              <div class='col-md-12 error form-group hide'>
                <div class='alert-danger alert' hidden='true' id='payment-errors'>
                </div>
                <div class='alert alert-success text-center' hidden='true' id='payment-success'>
                    √
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
@endsection

@section('script')
<script src="https://js.stripe.com/v2/"></script>
<script src={{URL::to('js/checkout.js')}}></script>   
@endsection