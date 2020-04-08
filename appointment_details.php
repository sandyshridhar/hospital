<?php
$servername="localhost";
$username="root";
$password="";
$database="make_an_appointment";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
	die("connection failed:".mysqli_connect_error());
}
echo "Connected SucessFully"."<br>";


$date = ''; 
$time = '';
$date = $_POST['date'];
$time = $_POST['time']; 
$phone=$_POST['phone'];
// echo $date;
// echo $time;
// echo $phone;

$sql="INSERT INTO appointment_details (date,time,phone) VALUES('$date','$time','$phone')";

if($conn->query($sql)===true)
{
	echo "<script>alert('sucess');</script>";
	echo "<script>window.location='login.php';</script>";
}
else
{
	echo "Error: ".$sql."<br>".$conn->error;
}

// $sql="SELECT * FROM appointment_details";
// $result= $conn->query($sql);

// if($result)
// {
// 	while ($data=$result->fetch_assoc()) {
// 	$date=$data['date'];
// 	$time=$data['time'];
// 	echo $date;
// 	echo $time;
// 	}
// }

$conn->close();

?>