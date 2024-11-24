<?php
echo "regular expression example"."</br>";
$string="I love Php web programmming lanugaue";
$pattern='/web/';
if(preg_match($pattern, $string)){


	echo "match is found";
}
else
{
	echo "match is not found";
}
?>
<?php
echo "regular expression example"."</br>";
$string="I love Php web programmming lanugaue";
$pattern='/Php/';
$replace="phython";
$new =preg_replace($pattern, $replace, $string);
echo$new;
?>
<?php
echo "regular expression example"."</br>";
$string="monday,tuesday,wensday,thursday,friday,saturday,sunday";
$pattern="/,/";
$split=preg_split($pattern, $string);
foreach($split as $s)
echo$s ."</br>";
?>