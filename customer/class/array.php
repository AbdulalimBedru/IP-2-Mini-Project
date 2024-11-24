<?php
$name = array("abdu","licha","case","brouno");
echo $name[2] . "<br>";
unset($name[2]);
$name[] = "abduse" ;
foreach($name as $na){
    echo($na ." <br>");
}
