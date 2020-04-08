 <?php
 
$date=date("d");
$month=date("m");
$year=date("Y");
$day=date("l");
 
// print("Date is = ".$date."<br>");
// print("Month is = ".$month."<br>");
// print("Year is = ".$year."<br>");
// print("Day is = ".$day."<br>");
// printf($day);
// $monthnum=11;
// $monthname=date('F',mktime(0,0,0,$month,12));
// printf($monthname);

// printf("<br>");


// days list:
 
//  $ts=strtotime('next day');
//  $d=array();
//  for($i=1;$i<=7;$i++)
//  {
//  	$d[]=strftime('$A',$ts);
//  	$current_day=date("l",$ts);
//  	echo $current_day."<br>";

//  	echo date("d",$ts)."<br>";
//  	echo date("m",$ts)."<br>";
 	

//  	if($current_day=="Monday"||$current_day=="Saturday"||$current_day=="Sunday")
//  	{
//  		echo "10:00 am"."<br>"."11:00"."<br>";
//  	}
//  	printf("<br>");
//  	$ts=strtotime('+1 day',$ts);
//  }
$servername="localhost";
$username="root";
$password="";
$database="make_an_appointment";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("connection failed:".mysqli_connect_error());
}
// echo "Connected SucessFully"."<br>";

$sql="SELECT * FROM appointment_details";
$result= $conn->query($sql);

if($result)
{
 while ($data=$result->fetch_assoc()) {
 $date_data=$data['date'];
 $time_data=$data['time'];
 //echo $date_data;
 //echo $time_data;
  
 }
}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 
  <style type="text/css">
		 
		table{
			border-collapse: collapse;
			width: 93%;
            margin: auto;
			border: 1px solid black;
		}
		th,td{
			padding: 4px;
			border: 1px solid black;
		}
		.btn-group .button{
			 
			text-decoration: none;
			font-size: 12px;
			margin-left: -1px;
			margin-top: -1px;
			cursor: pointer;
			display: inline-block;
			float: left;
			width: 68px;
			height: 30px;
			background-color: white;
			border-radius: 6px ; 
			color: black;
			border: 2px solid #008CBA;
		}
		.col{
			background-color: #9eeaea;
		}
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
          min-width: 300px;
          margin-top: 10px;
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

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
          background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
          display: none;
        }

        .popbutton {
          background-color: #4CAF50;
          color: #ffffff;
          border: none;
          padding: 10px 20px;
          font-size: 17px;
          font-family: Raleway;
          cursor: pointer;
        }

       .popbutton:hover {
          opacity: 0.8;
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
<h2 style="text-align: center;">Select Your Date and Time.</h2>
 <table style="overflow-y: auto;">
    <thead>
      <tr style="background-color: #9eeaea">
        <th><i class="fa fa-calendar" aria-hidden="true"></i><b> /</b>
        	<i class="fa fa-clock-o" area-hidden="true"></i></th>
        <th>Time</th>
        <th>Time</th>
        <th>Time</th>
        <th>Time</th>
        <th>Time</th>
        <th>Time</th>
        <th>Time</th>
        <th>Time</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    	 $ts=strtotime('next day');
		 $d=array();
		 for($i=1;$i<=7;$i++)
		 {
		 	$d[]=strftime('$A',$ts);
		 	$current_day=date("l",$ts);
		 	// echo $current_day."<br>";
		 	// echo date("d",$ts)."<br>";
		 	// echo date("m",$ts)."<br>";
    	?>
      <tr>
      	<th class="col";><?php echo $current_day."<br>";echo date("d",$ts)."<br>"; echo date('F',mktime(0,0,0,$month,12));  ?></th>
        <td><?php if($current_day=="Monday" )
        	{
        	?> <?php  $DATE=gmdate("Y-m-d",$ts); ?> 
                <div class="btn-group">
        			<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:15 AM" data-dateslot="<?php echo $DATE ?>">8:15 AM</button> 
        			<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:30 AM" data-dateslot="<?php echo $DATE ?>">8:30 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:45 AM" data-dateslot="<?php echo $DATE ?>">8:45 AM</button>
        		</div>
        		<?php  
 	 			} ?>

 	 		<?php if($current_day=="Tuesday" )
        	{
        	?> <?php  $DATE=gmdate("Y-m-d",$ts)?> 
                <div class="btn-group">
        			<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:30 AM" data-dateslot="<?php echo $DATE ?>">8:30 AM</button>
        			<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:45 AM" data-dateslot="<?php echo $DATE ?>">8:45 AM</button>
        		</div>        		 
        		<?php
 	 			} ?>

 	 		<?php if($current_day=="Wednesday" )
        	{
        	?> <?php  $DATE=gmdate("Y-m-d",$ts)?> 
                <div class="btn-group">
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:15 AM" data-dateslot="<?php echo $DATE ?>">8:15 AM</button> 
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:30 AM" data-dateslot="<?php echo $DATE ?>">8:30 AM</button>
        		</div>
        		<div class="btn-group">
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:45 AM" data-dateslot="<?php echo $DATE ?>">8:45 AM</button>
        		</div>
        		<?php
 	 			} ?>

 	 		<?php if($current_day=="Thursday" )
        	{
        	?> <?php  $DATE=gmdate("Y-m-d",$ts)?> 
        		<div class="btn-group">
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:30 AM" data-dateslot="<?php echo $DATE ?>">8:30 AM</button>
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="8:45 AM" data-dateslot="<?php echo $DATE ?>">8:45 AM</button>
        		</div>
        		<?php
 	 			}?>
 	 		</td>

        <td><?php if($current_day=="Monday" )
        	{
        		?><?php  $DATE=gmdate("Y-m-d",$ts)?> 
                <div class="btn-group">
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:00 AM" data-dateslot="<?php echo $DATE ?>">9:00 AM</button> 
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:45 AM" data-dateslot="<?php echo $DATE ?>">9:45 AM</button>
        		</div>
        		<?php
 	 			}?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><?php  $DATE=gmdate("Y-m-d",$ts)?> 
                <div class="btn-group">
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:00 AM" data-dateslot="<?php echo $DATE ?>">9:00 AM</button>
        		</div>
        		<?php
 	 			} ?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><?php  $DATE=gmdate("Y-m-d",$ts)?> 
        		<div class="btn-group">
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:00 AM" data-dateslot="<?php echo $DATE ?>">9:00 AM</button> 
        		<button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:45 AM" data-dateslot="<?php echo $DATE ?>">9:45 AM</button>
        		</div>
        		<?php
 	 			}?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><?php  $DATE=gmdate("Y-m-d",$ts)?> 
                <div class="btn-group">
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:00 AM" data-dateslot="<?php echo $DATE ?>">9:00 AM</button> 
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:15 AM" data-dateslot="<?php echo $DATE ?>">9:15 AM</button>
                </div>
        		<div class="btn-group">
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:30 AM" data-dateslot="<?php echo $DATE ?>">9:30 AM</button> 
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:45 AM" data-dateslot="<?php echo $DATE ?>">9:45 AM</button>
                </div>
        		<?php
 	 			} ?>
 	 		<?php if($current_day=="Friday" )
        	{
        		?><?php  $DATE=gmdate("Y-m-d",$ts)?> 
                <div class="btn-group">
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:00 AM" data-dateslot="<?php echo $DATE ?>">9:00 AM</button> 
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:15 AM" data-dateslot="<?php echo $DATE ?>">9:15 AM</button>
                </div>
        		<div class="btn-group">
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:30 AM" data-dateslot="<?php echo $DATE ?>">9:30 AM</button> 
                <button type="submit" class="button time" data-toggle="modal" data-target="#myModal" data-timeslot="9:45 AM" data-dateslot="<?php echo $DATE ?>">9:45 AM</button>
                </div>
        		<?php
 	 			} ?>
 	 			
 	 		</td>

        <td><?php if($current_day=="Monday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >10:00 AM</button> 
        			<button type="submit" class="button" >10:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >10:30 AM</button>
        			<button type="submit" class="button" >10:45 AM</button>
        		</div>
        		<?php
 	 			} ?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >10:00 AM</button> 
        			<button type="submit" class="button" >10:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >10:30 AM</button>
        			<button type="submit" class="button" >10:45 AM</button>
        		</div>
        		<?php
 	 			} ?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >10:00 AM</button> 
        			<button type="submit" class="button" >10:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >10:30 AM</button>
        			<button type="submit" class="button" >10:45 AM</button>
        		</div>
        		<?php
 	 			}  ?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >10:00 AM</button> 
        			<button type="submit" class="button" >10:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >10:30 AM</button>
        			<button type="submit" class="button" >10:45 AM</button>
        		</div>
        		<?php
 	 			}  ?>
 	 		<?php if($current_day=="Friday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >10:00 AM</button> 
        			<button type="submit" class="button" >10:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >10:30 AM</button>
        			<button type="submit" class="button" >10:45 AM</button>
        		</div>
        		<?php
 	 			}  ?>
 	 		<?php if($current_day=="Saturday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >10:00 AM</button> 
        			<button type="submit" class="button" >10:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >10:30 AM</button>
        			<button type="submit" class="button" >10:45 AM</button>
        		</div>
        		<?php
 	 			}  ?>	
 	 		</td>

        <td><?php if($current_day=="Monday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >11:15 AM</button>
        			<button type="submit" class="button" >11:30 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >11:45 AM</button>
        		</div>
        		<?php
 	 			} ?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >11:15 AM</button>
        			<button type="submit" class="button" >11:30 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >11:45 AM</button>
        		</div>
        		<?php
 	 			} ?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >11:00 AM</button>
        			<button type="submit" class="button" >11:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >11:30 AM</button>
        			<button type="submit" class="button" >11:45 AM</button>
        		</div>
        		<?php
 	 			 }?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >11:00 AM</button>
        			<button type="submit" class="button" >11:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >11:30 AM</button>
        			<button type="submit" class="button" >11:45 AM</button>
        		</div>
        		<?php
 	 			 }?>
 	 		<?php if($current_day=="Friday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >11:00 AM</button>
        			<button type="submit" class="button" >11:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >11:30 AM</button>
        			<button type="submit" class="button" >11:45 AM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Saturday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >11:00 AM</button>
        			<button type="submit" class="button" >11:15 AM</button>
        		</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >11:30 AM</button>
        			<button type="submit" class="button" >11:45 AM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		</td>

 	 	<td><?php if($current_day=="Monday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >12:00 PM</button>
        			<button type="submit" class="button" >12:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >12:30 PM</button>
        			<button type="submit" class="button" >12:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >12:00 PM</button>
        			<button type="submit" class="button" >12:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >12:30 PM</button>
        			<button type="submit" class="button" >12:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >12:00 PM</button>
        			<button type="submit" class="button" >12:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >12:30 PM</button>
        			<button type="submit" class="button" >12:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >12:00 PM</button>
        			<button type="submit" class="button" >12:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >12:30 PM</button>
        			<button type="submit" class="button" >12:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Friday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >12:00 PM</button>
        			<button type="submit" class="button" >12:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >12:30 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Saturday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >12:00 PM</button>
        			<button type="submit" class="button" >12:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >12:30 PM</button>
        			<button type="submit" class="button" >12:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>	
 	 		</td>

 	 	<td><?php if($current_day=="Monday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >1:15 PM</button>
        			<button type="submit" class="button" >1:30 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >1:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >1:15 PM</button>
        			<button type="submit" class="button" >1:30 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >1:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >1:15 PM</button>
        			<button type="submit" class="button" >1:30 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >1:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >1:00 PM</button>
        			<button type="submit" class="button" >1:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >1:30 PM</button>
        			<button type="submit" class="button" >1:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Saturday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >1:00 PM</button>
        			<button type="submit" class="button" >1:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >1:30 PM</button>
        			<button type="submit" class="button" >1:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		</td>

 	 	<td><?php if($current_day=="Monday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >2:00 PM</button>
        			<button type="submit" class="button" >2:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >2:30 PM</button>
        			<button type="submit" class="button" >2:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >2:00 PM</button>
        			<button type="submit" class="button" >2:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >2:30 PM</button>
        			<button type="submit" class="button" >2:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >2:30 PM</button>
        			<button type="submit" class="button" >2:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >2:30 PM</button>
        			<button type="submit" class="button" >2:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		</td>

 	 	<td><?php if($current_day=="Monday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >3:00 PM</button>
        			<button type="submit" class="button" >3:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >3:30 PM</button>
        			<button type="submit" class="button" >3:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Tuesday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >3:00 PM</button>
        			<button type="submit" class="button" >3:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >3:30 PM</button>
        			<button type="submit" class="button" >3:45 PM</button>
        		</div>
        		<?php
 	 			 }?>
 	 		<?php if($current_day=="Wednesday" )
        	{
        		?><div class="btn-group">		
        			<button type="submit" class="button" >3:15 PM</button>
        			<button type="submit" class="button" >3:30 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >3:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		<?php if($current_day=="Thursday" )
        	{
        		?><div class="btn-group">
        			<button type="submit" class="button" >3:00 PM</button>
        			<button type="submit" class="button" >3:15 PM</button>
        			</div>
        		<div class="btn-group">
        			<button type="submit" class="button" >3:30 PM</button>
        			<button type="submit" class="button" >3:45 PM</button>
        		</div>
        		<?php
 	 			 } ?>
 	 		</td>
      </tr>
      
      		<?php
		 	  	$ts=strtotime('+1 day',$ts);
				}
          
		 	?>
    </tbody>
  </table>
  

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content" >

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Make an Appointment.</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body" style="background-color: #f1f1f1;">
            <form id="regForm" action="appointment_details.php" method="POST">
                  <h1>Register:</h1>
                  <!-- One "tab" for each step in the form: -->
                  <div class="tab">Date-Time:
                    <p><input readonly oninput="this.className = ''" name="time" id="timeslot"></p>
                    <p><input readonly oninput="this.className = ''" name="date" id="dateslot"></p>
                    <p><input type="text"   name="phone"></p>
                  </div>
                  <!-- <div class="tab">Name:
                    <p><input placeholder="First name..." oninput="this.className = ''" name="fname"></p>
                  </div>
                   
                  <div class="tab">Contact Info:
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
                  </div> -->
                  <div style="overflow:auto;">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="popbutton">Previous</button>
                      <button type="button" id="nextBtn" onclick="nextPrev(1)" class="popbutton">Next</button>
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

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>



<script >
        $(".time").click(function(){
            var timeslot=$(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);

            var dateslot=$(this).attr('data-dateslot');
            $("#slot").html(dateslot);
            $("#dateslot").val(dateslot);

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
 
 
 
 