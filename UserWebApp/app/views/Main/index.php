<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>VIP Valet</title>
      <link rel="stylesheet" href="resources/styles/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="container">
         <img src="/resources/images/logo.png" alt="VIP Valet Logo">
         <header>Reserve your parking</header>
         <div class="progress-bar">
            <div class="step">
               <p>
                  Plate
               </p>
               <div class="bullet">
                  <span>1</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Location
               </p>
               <div class="bullet">
                  <span>2</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Time
               </p>
               <div class="bullet">
                  <span>3</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Receipt
               </p>
               <div class="bullet">
                  <span>4</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
         </div>
         <div class="form-outer">
            <form action="#">
               <div class="page slide-page">
                  <div class="title">
                     Car information:
                  </div>
                  <div class="field">
                     <div class="label">
                        License plate
                     </div>
                     <input type="text">
                  </div>
                  <!-- <div class="field">
                     <div class="label">
                        Last Name
                     </div> 
                     <input type="text">
                  </div> -->
                  <div class="field">
                     <button class="firstNext next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="title">
                     Location:
                  </div>
                  <!-- <div class="field">
                     <div class="label">
                        Email Address
                     </div>
                     <input type="text">
                  </div>
                  <div class="field">
                     <div class="label">
                        Phone Number
                     </div>
                     <input type="Number">
                  </div> -->
                  <div class="field">
                    <div class="label">
                       Parking location
                    </div>
                    <select>
                        <option>--Choose--</option>
                       <option>Laval</option>
                       <option>Longeuil</option>
                     <!--  <option>Other</option> -->
                    </select>
                 </div>
                  <div class="field btns">
                     <button class="prev-1 prev">Previous</button>
                     <button class="next-1 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="title">
                     Parking duration
                  </div>
                  <div class="field">
                     <div class="label">
                        Today date
                     </div>
                     <!-- <input type="text"> -->
                  </div>
                  <!-- <div class="field">
                     <div class="label">
                        Gender
                     </div>
                     <select>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                     </select>
                  </div>  -->
                  <div class="field btns">
                     <button class="prev-2 prev">Previous</button>
                     <button class="next-2 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="title">
                     Parking confirmation:
                  </div>
                  <!-- <div class="field">
                     <div class="label">
                        Username
                     </div>
                     <input type="text">
                  </div>
                  <div class="field">
                     <div class="label">
                        Password
                     </div>
                     <input type="password">
                  </div> -->
                  <div class="field btns">
                     <button class="prev-3 prev">Previous</button>
                     <button class="submit">Pay</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <script src="/resources/scripts/script.js"></script>
   </body>
</html>