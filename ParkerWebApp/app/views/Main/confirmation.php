<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
      <title>Confirmation</title>
      <link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>

   <body>
      <div class="container-xl text-center">
         <div class="row my-4 d-inline-flex text-start">
            <div class="col-md" align="center">
               <img class="mb-4" src="/resources/images/logo.png" width="50%" alt="VIP Valet Logo">
               <h3>Parking Confirmation</h3> <hr>
            </div>
         
         <form><input hidden id="totalPrice" name="totalPrice" value= "0">
            <div class="col-md mb-5">
               <h2 class="text-muted">License plate</h3>
               <input type="text" class="form-control" name="license" value="" readonly >
            </div>

            <div class="col-md mb-5">
               <h2 class="text-muted">Parking lot</h3>
                  <input type="text" class="form-control" name="location" readonly >
            </div>

            <div class="col-md mb-5">
               <h2 class="text-muted">Duration</h3>
                  <input type="text" class="form-control" name="location" readonly >

            </div>

            <div class="d-flex justify-content-center">
               <span class="fs-3 text-muted">Total: $</span>
               <strong>
                  <span id="displayTotal" class="fs-3">

               0.00 

               
            </span>
               </strong>
          </div>

            <button id="button1" hidden type="submit" name="action" class="btn btn-primary float-end mt-2 mb-4 mx-4">Confirm</button>
         </form>
         <div  id="smart-button-container">
                      <div style='text-align: center;'>
                        <div id='paypal-button-container'>
                        </div>
                      </div>
                    </div>
      </div>


      <script src="/resources/scripts/scripts.js"></script>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      <script src="https://code.jquery.com/jquery-3.6.1.min.js"  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>



      <script>
         $( "#location" ).change(function checkSelect() {
      var rate = $("#location").val();
      var hours = $("#duration").val();
      var total = rate*hours;
      $("#totalPrice").val(total.toFixed(2));
      $("#displayTotal").html(total.toFixed(2));
      });

         $( "#duration" ).change(function checkInput() {
      var rate = $("#location").val();
      var hours = $("#duration").val();
      var total = rate*hours;
      $("#totalPrice").val(total.toFixed(2));
      $("#displayTotal").html(total.toFixed(2));
      });
   </script>


      <script src="https://www.paypal.com/sdk/js?client-id=Ad3WMY55vhrSZ1ekbMNTXRyyHDWwQwBDCVlhomIMIYDSTKhcmajW8q-fO1ahus5eGkp-eqsDAnDv8IwO&locale=en_US&commit=true&currency=CAD%22%3E"></script>
         <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=CAD" data-sdk-integration-source="button-factory"></script>


  
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'checkout',

        },

        createOrder: function(data, actions) {
          const amount =  document.getElementById('totalPrice').value;
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"CAD","value":amount}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';

            $('#total_price').val($("#totalPrice").val());
            // const order_id =  document.getElementById('order_id').value;
            $( "#button1").click();
            // $( "form#checkout_form" ).submit();
            // Or go to another URL:  actions.redirect('thank_you.html');

          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
      </script>
   </body>
</html>