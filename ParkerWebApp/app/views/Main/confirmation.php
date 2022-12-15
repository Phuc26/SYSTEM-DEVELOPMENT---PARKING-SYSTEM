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
               <h3>Receipt Page</h3> <hr><br>
               <h3>Thanks for using Vip Valet</h3>

            </div>
         
         <form>
            <input hidden id="totalPrice" name="totalPrice" value="0">
            <div class="col-md mb-5">
               <h2 class="text-muted">License plate</h3>
               <input type="text" class="form-control" name="license" value="<?= $data->license; ?>" readonly>
            </div>

            <div class="col-md mb-5">
               <h2 class="text-muted">Parking lot</h3>
               <input type="text" class="form-control" name="location" value="<?= $data->location; ?>" readonly>
            </div>

            <div class="col-md mb-5">
               <h2 class="text-muted">Duration</h3>
               <input type="text" class="form-control" name="duration" value="<?= $data->duration; ?>" readonly>
            </div>

            <div class="d-flex justify-content-center">
               <span class="fs-3 text-muted">Total Amount Paid : $</span>
               <strong><span id="displayTotal" class="fs-3"><?= $data->totalPrice; ?></span></strong>
            </div>

            <button id="button1" hidden type="submit" name="action" class="btn btn-primary float-end mt-2 mb-4 mx-4">Confirm</button>
         </form>

         <div id="smart-button-container">
            <div style='text-align: center;'>
               <div id='paypal-button-container'></div>
            </div>
         </div>
      </div>
   </body>
</html>