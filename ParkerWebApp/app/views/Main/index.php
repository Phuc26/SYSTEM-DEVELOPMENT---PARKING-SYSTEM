<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
      <title>Reserve your Parking</title>
      <link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>

   <body>
      <div class="container-xl text-center">
         <div class="row my-4 d-inline-flex text-start">
            <div class="col-md" align="center">
               <img class="mb-4" src="/resources/images/logo.png" width="50%" alt="VIP Valet Logo">
               <h3>Reserve Your Parking</h3> <hr>
            </div>
         
         <form method="post" action="">
            <input hidden id="totalPrice" name="totalPrice" value="0">

            <div class="col-md px-2 mb-5">
               <h2 class="text-muted">License plate</h2>
               <input type="text" class="form-control" name="license" placeholder="1A1 B2B" pattern="[A-Za-z0-9]" minlength="2" maxlength="8" required>
            </div>

            <div class="col-md px-2 mb-5">
               <h2 class="text-muted">Parking lot</h2>
               <select class="form-select" name="location" id="location" required>
                  <option value="" selected disabled >Choose your parking lot</option>
                  <option value="1.15">Laval</option>
                  <option value="1.5">Longueil</option>     
               </select>
            </div>

            <div class="col-md px-2 mb-5">
               <h2 class="text-muted">Duration</h2>
               <input type="number" class="form-control" name="duration" min="1" max="24" id="duration" placeholder="Select a time" required>
            </div>

            <div class="d-flex justify-content-center">
               <span class="fs-3 text-muted">Total: $</span>
               <strong><span id="displayTotal" class="fs-3">0.00</span></strong>
            </div>

            <button type="submit" name="action" class="btn btn-primary float-end mt-2 mb-4 mx-4">Confirm</button>
         </form>
      </div>

      <script src="/resources/scripts/scripts.js"></script>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>
</html>