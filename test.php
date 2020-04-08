<!--  <?php

if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");

if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");

?>

Lets also set the variables that we are going to use in our calandar:

<?php

$cMonth = $_REQUEST["month"];

$cYear = $_REQUEST["year"];



$prev_year = $cYear;

$next_year = $cYear;

$prev_month = $cMonth-1;

$next_month = $cMonth+1;



if ($prev_month == 0 ) {

	$prev_month = 12;

	$prev_year = $cYear - 1;

}

if ($next_month == 13 ) {

	$next_month = 1;

	$next_year = $cYear + 1;

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table width="200">

<tr align="center">

<td bgcolor="#999999" style="color:#FFFFFF">

<table width="100%" border="0" cellspacing="0" cellpadding="0">

<tr>

<td   align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Previous</a></td>

<td><?php echo date("Y-m-d");?></td>

<td   align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Next</a>  </td>

</tr>

</table>

</td>

</tr>

<tr>

<td align="center">

<table width="100%" border="0" cellpadding="2" cellspacing="2">

<tr align="center">

 
</tr>

<tr>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>M</strong></td>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>W</strong></td>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>F</strong></td>

<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>

</tr>

</body>
</html>
<?php 

$timestamp = mktime(0,0,0,$cMonth,1,$cYear);

$maxday = date("t",$timestamp);

$thismonth = getdate ($timestamp);

$startday = $thismonth['wday'];

for ($i=0; $i<($maxday+$startday); $i++) {

	if(($i % 7) == 0 ) echo "<tr>";

	if($i < $startday) echo "<td></td>";

	else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";

	if(($i % 7) == 6 ) echo "</tr>";

}

?>

Now we add just the finishing touches of the html and we have finished the calendar.

</table>

</td>

</tr>

</table> -->




<?php
$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
"August", "September", "October", "November", "December");
?>
<?php
if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
?>
<?php
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
	<table width="200" class="table table-bordred">
<tr align="center">
<td  style="color:black">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td  align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:black">Previous</a></td>
<td  align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:black">Next</a>  </td>
</tr>

</td>
</tr>
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
<tr align="center">
<td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
</tr>
<tr>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>M</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>W</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>F</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>
</tr>
<?php 
$timestamp = mktime(0,0,0,$cMonth,1,$cYear);//Return the Unix timestamp for a date. Then use it to find the day of that date:
$maxday = date("t",$timestamp);//'t' will tells the max day in a month
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];//[wday] - day of the week (0=Sunday, 1=Monday,...)
for ($i=0; $i<($maxday+$startday); $i++) {
    if(($i % 7) == 0 ) echo "<tr>";
    if($i < $startday) echo "<td></td>";
    else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";
    if(($i % 7) == 6 ) echo "</tr>";
}
?>
</table>
</body>
</html>