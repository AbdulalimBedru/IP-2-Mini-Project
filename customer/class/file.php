<?php
echo "basic file operation"."</br>";
$fil="message.txt";
$file=fopen($fil, "r");//file opend for reading mode
if($file){

while(($data=fgetc($file))){

echo$data;

}
fclose($file);
}
else
{
	echo "file was not existed";
}
?>
<?php
echo "basic file operation"."</br>";
$fil="message.txt";
$file=fopen($fil, "w");//file opend for writing mode
$new="we are gc student in this year";
if($file)
{
	fwrite($file, $new);
	echo "data is written";
fclose($file);
}
else
{
	echo "file was not existed";
}
?>