<?php
for($i = 0 ; $i <= 10; $i++){
    echo($i . "<br>");
}
$a = 1;
while ($a <= 10) {
    echo("number " . $a . "<br>");
   $a++;
}
$b = 1;
do {
    echo("hello " . "<br>");
    $b++;
} while ($b <= 10);
$day = "sunday";
switch ($day) {
    case 'monday':
        echo"the day is monday";
        break;
    case 'tuseday':
        echo"the day is tuseday";
        break;
    case 'wensday':
        echo"the day is wensday";
        break; 
    case 'thursday':
        echo"the day is thursday";
        break;
    case 'friday':
        echo"the day is friday";
        break;
    case 'saturday':
        echo"the day is saturday";
        break; 
    case 'sunday':
        echo"the day is sunday";
        break;                                               
    default:
        echo"enter correct day";
        break;
}
?>