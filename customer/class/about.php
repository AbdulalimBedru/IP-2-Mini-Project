<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <h1> abduselam</h1>
<?php
$name = "abduselam";
$age = 20;
$sex = "male";
$wegiht = 55.2;
 
echo ("<h6>personal information </h6>");
echo("<h6>Full name : " . $name ."</h6>");
echo("<h6>Age : " . $age ."</h6>");
echo("<h6>sex : " . $sex ."</h6>");
echo("<h6>wegith : " . $wegiht ."</h6>");

$num1 = 34;
$num2 = 12;
$sum = $num1 + $num2;
$div = $num1 / $num2;
$mul = $num1 * $num2;
$sub = $num1 - $num2;

echo("sum = ".$sum ."<br>");
echo("div = ".$div ."<br>");
echo("mul = ".$mul ."<br>");
echo("sub = ".$sub ."<br>");

$age1 = 10 ;
$isdrivingLicence = true;
if ($age1 >= 18 AND $isdrivingLicence){
  echo("<br>you are eliagebel to drive <br>");
}
else{
  echo("you are not eliagebel to drive <br>");
}
?>
</body>
</html>