<!doctype html>
<html lang="en">

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, inital-scale=1, shrink-to-fit=no">
      <title>Welcome</title>
      <link rel="stylesheet" type="text/css" href="/resources/styles/styles.css">

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>

   <body>
      <div class="container-lg">
         <div class="row">
            <div class="col-md">
               <img src="/resources/images/logo.png" width="30%" alt="VIP Valet Logo">
               <h3>Reserve Your Parking</h3> <hr>
            </div>
         </div>

         <form>
            <div class="row">
               <div class="col-md-4 mb-5">
                  <h2 class="text-muted">License plate</h3>
                  <input type="text" class="form-control" name="license" placeholder="1A1 B2B" required>
               </div>

               <div class="col-md-4 mb-5">
                  <h2 class="text-muted">Parking lot</h3>
                  <select class="form-select" name="location" required>
                     <option selected disabled>Choose your parking lot</option>
                     <option value="laval">Laval</option>
                     <option value="longueil">Longueil</option>
                  </select>
               </div>

               <div class="col-md-4 mb-5">
                  <h2 class="text-muted">Duration</h3>
                  <input type="number" class="form-control" name="duration" min="1" max="24" placeholder="Select a time" required>
               </div>
            </div>

            <button type="submit" name="action" class="btn btn-primary float-end mt-2 mx-4">Confirm</button>
         </form>

      <script src="/resources/scripts/scripts.js"></script>

      <!-- Bootstrap JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   </body>

</html>