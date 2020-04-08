 <?php

 if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];

echo $cMonth."<br>";
echo $cYear."<br>";

$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
echo $timestamp."<br>";
$maxday = date("t",$timestamp);
echo $maxday."<br>";
$thismonth = getdate ($timestamp);
echo $thismonth."<br>";
$startday = $thismonth['wday'];
echo $startday."<br>";

for ($i=0; $i<($maxday+$startday); $i++) {
    if(($i % 7) == 0 ) echo "<tr>";
    if($i < $startday) echo "<td></td>";
    else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";
    if(($i % 7) == 6 ) echo "</tr>";
}
printf("<br>");

$timestamp = mktime(0,0,0,4,1,2020);
echo $timestamp."<br>";
echo date('t')."<br>"."nxt startday";
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
echo $startday."<br>";
echo date('wday');
 ?>
