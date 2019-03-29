Stripe.setPublishableKey('pk_test_x9UuPTMmec4MncyMGj7mszQD00pC7H0eAf');
var $form = $('#payment-form');

$form.submit(function(event){
    $form.find('#payment-errors').prop('hidden',true);

    Stripe.card.createToken({
    number: $('#card-number').val(),
    cvc: $('#card-cvc').val(),
    exp_month: $('#card-expiry-month').val(),
    exp_year: $('#card-expiry-year').val()
    }, stripeResponseHandler);
    return false;
})



function stripeResponseHandler(status, response) {

  if (response.error) { // Problem!
    // Show the errors on the form
    $form.find('#payment-errors').text(response.error.message);
    $form.find('#payment-errors').prop('hidden',false)
    $form.find('button').prop('disabled', false); // Re-enable submission

  } else { // Token was created!
    
    $form.find('#payment-success').prop('hidden',false)    
    // Get the token ID:
    var token = response.id;


    $form.append($('<input type="hidden" name="stripeToken" />').val(token));
    // Submit the form:
    $form.get(0).submit();

  }
}