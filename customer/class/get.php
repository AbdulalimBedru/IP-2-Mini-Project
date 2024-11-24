<?php
$num = $_GET['num'];
$res = $num * $num;
if($num == ""){
    echo "plse enter number";
}
echo "<h1> result = $res </h1>";

/*
$num1 = $_GET['num1'];
$num2 = $_GET['num2'];
$operatr = $_GET['operater'];
$result;
if($operatr === "add"){
    $result = $num1 + $num2;
    echo "<h1>result = $result</h1>";
}
elseif($operatr === "mul"){
    $result = $num1 * $num2;
    echo "<h1>result = $result</h1>";
}
elseif($operatr === "sub"){
    $result = $num1 - $num2;
    echo "<h1>result = $result</h1>";
}
elseif($operatr === "div"){

     if($num1 == 0 || $num2 == 0){
        echo "<h1>you cannot diviaide by zero</h1>";   
     }
     else{
        $result = $num1 / $num2;
        echo "<h1>result = $result</h1>";
    }   
}
else{
    echo "<h1>operater not found</h1>";
}*/