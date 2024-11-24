<?php
function mesg($l,$w){
$person = array("name"=>"abdu","age"=>20,"sex"=>"male","job"=>"student");
echo("Name : " . $person["name"] . "<br>");
echo("Sex : " . $person["sex"] . "<br>");
echo("Age : " . $person["age"] . "<br>");
echo("Job : " . $person["job"] . "<br>");
$a= $l*$w;
return $a;
}
$a= mesg(2,7);
echo$a
?>