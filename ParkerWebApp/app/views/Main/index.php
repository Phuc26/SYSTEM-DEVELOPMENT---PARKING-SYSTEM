<!-- <!DOCTYPE html>
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
               <p>Plate</p>
               <div class="bullet"><span>1</span></div>
               <div class="check fas fa-check"></div>
            </div>

            <div class="step">
               <p>Location</p>
               <div class="bullet"><span>2</span></div>
               <div class="check fas fa-check"></div>
            </div>

            <div class="step">
               <p>Time</p>
               <div class="bullet"><span>3</span></div>
               <div class="check fas fa-check"></div>
            </div>

            <div class="step">
               <p>Receipt</p>
               <div class="bullet"><span>4</span></div>
               <div class="check fas fa-check"></div>
            </div>

         </div>

         <div class="form-outer">
            <form name="myForm" action='' method='post'>

               <div class="page slide-page">
                  <div class="title">Car information</div>
                  <div class="field">
                     <div class="label">License plate</div>
                     <input type="text" id="license" name="license">
                  </div>
                  <div class="field btns">
                     <button class="firstNext next">Next</button>
                  </div>
               </div>

               <div class="page">
                  <div class="title">Location</div>

                  <div class="field">
                     <div class="label">Parking location</div>
                     <select id="location" name="location" required>
                        <option value="" disabled selected>--Choose a Location--</option>
                        <option value="laval">Laval</option>
                        <option value="longueil">Longeuil</option>
                    </select>
                  </div>

                  <div class="field btns">
                     <button class="prev-1 prev" formnovalidate>Previous</button>
                     <button class="next-1 next">Next</button>
                  </div>
               </div>

               <div class="page">
                  <div class="title">Parking duration</div>
                  <div class="field">
                     <div class="label">Duration</div>
                     <input type="number" list="hourlist" id="hours" name="hours"/>
                     <datalist id="hourlist">
                       <option>1</option>
                       <option>2</option>
                       <option>3</option>
                       <option>4</option>
                     </datalist>
                  </div>

                  <div class="field btns">
                     <button class="prev-2 prev" formnovalidate>Previous</button>
                     <button class="next-2 next">Next</button>
                  </div>
               </div>

               <div class="page">
                  <div class="title">Parking confirmation</div>
                  <form>
                     <label for="fname">License Plate:</label>
                     <input type="text" id="license" name="license" value="" readonly><br>
                     <label for="lname">Location:</label>
                     <input type="text" id="location" name="location" value="" readonly><br>
                     <label for="lname">Time:</label>
                     <input type="text" id="time" name="time" value="" readonly><br>
                  </form>
                  <div class="field btns">
                     <button class="prev-3 prev" formnovalidate>Previous</button>
                     <button class="submit">Pay</button>
                  </div>
               </div>
            </form>
         </div>
      </div>

      <script src="/resources/scripts/script.js"></script>
   </body>
</html> -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>VIP VALET</title>
    <link rel="stylesheet" href="resources/styles/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <form id="myForm" action="" method="post" autocomplete = "off">
      <h1 align = center>Parking Reservation</h1>

      <div style="text-align:center;">
        <span class="step" id = "step-1">1</span>
        <span class="step" id = "step-2">2</span>
        <span class="step" id = "step-3">3</span>
        <span class="step" id = "step-4">4</span>
      </div>

      <div class="tab" id = "tab-1">
        <p>License Plate</p>
         <input type="text" id="license" placeholder="Enter license plate" name="license">
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(1, 2);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-2">
        <p>Parking Location</p>
         <select id="location" name="location" required>
            <option value="" disabled selected>--Choose a Location--</option>
            <option value="laval">Laval</option>
            <option value="longueil">Longeuil</option>
        </select>
        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(2, 1);">Previous</div>
          <div class="index-btn" onclick="run(2, 3);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-3">
        <p>Parking Duration</p>

        <p>Hours</p>
        <input type="number" id="hours" name="hours" min="1" max="24">
        <!--<p>Minutes</p>
        <input type="number" id="minutes" name="minutes" min="0" max="59">-->

        <div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(3, 2);">Previous</div>
          <div class="index-btn" onclick="run(3, 4);">Next</div>
        </div>
      </div>

      <div class="tab" id = "tab-4">
        <p>Parking Confirmation</p>

        <p>License Plate:</p>
        <input type="text" id="license" name="license" value="" >
        <p>Location:</p>
        <input type="text" id="location" name="location" value="" >
        <p>Hours</p>
        <input type="number" id="hours" name="hours" value="" >
        <p>Minutes</p>
        <input type="number" id="minutes" name="minutes" value="" >



         <button class = "index-btn" type="submit" name="submit" style = "background: blue;">Pay</button>
        <!--<div class="index-btn-wrapper">
          <div class="index-btn" onclick="run(4, 3);">Previous</div>
          <div class="index-btn" onclick="run(4, 5);">Next</div>
        </div>-->
      </div>

    </form>

    <!--<script>
      // Default tab
      $(".tab").css("display", "none");
      $("#tab-1").css("display", "block");

      function run(hideTab, showTab){
        if(hideTab < showTab){ // If not press previous button
          // Validation if press next button
          var currentTab = 0;
          x = $('#tab-'+hideTab);
          y = $(x).find("input")
          for (i = 0; i < y.length; i++){
            if (y[i].value == ""){
              $(y[i]).css("background", "#ffdddd");
              return false;
            }
          }
        }
        if(hideTab < showTab){ // If not press previous button
          // Validation if press next button
          var currentTab = 0;
          x = $('#tab-'+hideTab);
          y = $(x).find("select")
          for (i = 0; i < y.length; i++){
            if (y[i].value == ""){
              $(y[i]).css("background", "#ffdddd");
              return false;
            }
          }
        }


        // Progress bar
        for (i = 1; i < showTab; i++){
          $("#step-"+i).css("opacity", "1");
        }

        // Switch tab
        $("#tab-"+hideTab).css("display", "none");
        $("#tab-"+showTab).css("display", "block");
        $("input").css("background", "#fff");
      }
    </script> -->
    <script src="/resources/scripts/script.js"></script>
  </body>
</html> 