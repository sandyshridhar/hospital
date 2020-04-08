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
$start="09:00";
$end="15:00";

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
                         <button class="btn btn-success book"  data-toggle="modal" data-target="#myModal" data-timeslot="<?php echo $ts;?>"><?php echo $ts;?></button> 
                    <?php }?>
                       
                   </div>                   
                </div>


        <?php
           }
           ?>
        </div>
    </div>

            <!-- The Modal -->
        <div class="modal fade" id="myModal" role="dialog" >
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Booking..<span id="slot"></span></h4>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                    <div class="row">
                        <div  class="col-md-12">
                            <form action="" method="POST">
                            <div class="form-group">
                                <label>Time-slot</label>
                                <input type="text" readonly name="timeslot" id="timeslot" class="form-control" required="">
                            </div>  
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text"   name="name" class="form-control" required="">
                            </div> 
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email"   name="email" class="form-control" required="">
                            </div>
                            <div class="form-group pull-n">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: right;">Close</button>
                                
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
    <script type="text/javascript">
         
    </script>
  </body>

</html>
