<?php
  $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date=?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot=$_POST['timeslot'];
     $stmt = $mysqli->prepare("select * from bookings where date=? AND timeslot=?");
    $stmt->bind_param('ss', $date,$timeslot);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-success'>Already Booked</div>";
           
        }else
        {
            $stmt = $mysqli->prepare("INSERT INTO bookings (name,timeslot, email, date) VALUES (?,?,?,?)");
            $stmt->bind_param('ssss', $name, $timeslot, $email, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[]=$timeslot;
            $stmt->close();
            $mysqli->close();

        }
    }
  
   
}


$duration=20;
$cleanup=0;
$start="08:00";
$end="19:00";

 

function timeslots($duration,$cleanup,$start,$end){
    $start =new DateTime($start);
    $end= new DateTime($end);
    $interval=new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");
    $slot =array();

    for($i=$start;$i<$end;$i->add($interval)->add($cleanupInterval))
    {
        $endPeriod=clone $i;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }
        $slots[]=$i->format("H:iA")."-".$endPeriod->format("H:iA");
    }
    return $slots;
}

?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <style type="text/css">
        * {
          box-sizing: border-box;
        }

        body {
          background-color: #f1f1f1;
        }

        #regForm {
          background-color: #ffffff;
          margin: 100px auto;
          font-family: Raleway;
          padding: 40px;
          width: 70%;
          margin-top: 10px;
          min-width: 300px;
        }

        h1 {
          text-align: center;  
        }

        input {
          padding: 10px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }
        .dropdown {
          padding: 10px;
          width: 100%;
          font-size: 17px;
          font-family: Raleway;
          border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
          background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
          display: none;
        }
        button {
          position: relative;
          background-color: #4CAF50;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;

          transition-duration: 0.4s;
          text-decoration: none;
          overflow: hidden;
          cursor: pointer;
        }

        button:after {
          content: "";
          background: #f1f1f1;
          display: block;
          position: absolute;
          padding-top: 300%;
          padding-left: 350%;
          margin-left: -20px !important;
          margin-top: -120%;
          opacity: 0;
          transition: all 0.8s
        }

        button:active:after {
          padding: 0;
          margin: 0;
          opacity: 1;
          transition: 0s
        }
 

        #prevBtn {
          background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
          height: 15px;
          width: 15px;
          margin: 0 2px;
          background-color: #bbbbbb;
          border: none;  
          border-radius: 50%;
          display: inline-block;
          opacity: 0.5;
        }

        .step.active {
          opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
          background-color: #4CAF50;
        }
    </style>
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
          
            <div class="col-md-12">
                <?php echo  isset($msg)?$msg:"";?>      
            </div>
           <?php $timeslots=timeslots($duration,$cleanup,$start,$end);
           foreach ($timeslots as $ts) {
               # code...
                ?>
                 
                <div class="col-md-2">
                   <div class="form-group">
                    <?php if(in_array($ts, $bookings)){?>
                         <button class="btn btn-danger"><?php echo $ts;?></button> 

                    <?php }else{?>
                         <button class="btn btn-primary book"  data-toggle="modal" data-target="#myModal" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button> 
                    <?php
                     }
                    ?>
                       
                   </div>                   
                </div>
        <?php
           }
           ?>
        </div>
    </div>

            <!-- The Modal -->
        <div class="modal fade" id="myModal" role="dialog" >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Fill the Details and Confirm your Booking..</h4>
              </div>
                

              <!-- Modal body -->
              <div class="modal-body" style=" background-color: #f1f1f1;">
                    <div class="row">
                        <div  class="col-md-12">
                            <form id="regForm" action="/action_page.php">
                                  
                                  <!-- One "tab" for each step in the form: -->
                                <div class="tab"><label>Time-Slot:</label>
                                    <p><input type="text" name="timeslot" id="timeslot" oninput="this.className = ''" name="fname"></p>
                                </div>
                                  <div class="tab">
                                    <label>Name:</label>
                                    <p><input type="text" placeholder="First name..." oninput="this.className = ''" name="fname"></p>
                                    <label>Gender:</label>
                                    <p><select id="gender" name="gender" class="dropdown">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                      </select></p>
                                    
                                  </div>
                                  <div class="tab"><label>Contact Info:</label>
                                    <p><input placeholder="E-mail..." oninput="this.className = ''" name="email"></p>
                                    <p><input placeholder="Phone..." oninput="this.className = ''" name="phone"></p>
                                  </div>
                                  <div class="tab">Birthday:
                                    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
                                    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
                                    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
                                  </div>
                                  <div class="tab">Login Info:
                                    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
                                    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
                                  </div>
                                  <div style="overflow:auto;">
                                    <div style="float:right;">
                                      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                    </div>
                                  </div>
                                  <!-- Circles which indicates the steps of the form: -->
                                  <div style="text-align:center;margin-top:40px;">
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                    <span class="step"></span>
                                  </div>
                            </form>
                        </div>
                    </div>
              </div>

              <!-- Modal footer -->
            </div>
          </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script >
        $(".book").click(function(){
            var timeslot=$(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").model("show");
        });
    </script>

    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script>

  </body>

</html>
