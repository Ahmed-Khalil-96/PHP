
<!-- first question -->
<?php
echo nl2br("Hello from \n PHP");
echo nl2br("\n");
echo nl2br("\n");
echo nl2br("Hello \n world");
// -------------------------------------
// question two

echo '<pre>';
print_r($_SERVER);
echo '</pre>';
// -------------------------------------
// question 3
$arr=[12,45,10,25];
$count=count($arr);
$sum=0;
for ($i = 0; $i < $count; $i++) {
    $sum+=$arr[$i];
}
$avg=$sum/$count;
echo"the avg is.".$avg ."<br>";
rsort($arr);
echo"<br>Sorted array:<br>";
print_r($arr);
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";

// ---------------------------------------
// question 4
$arr2=array("sara"=>31,"john"=>41,"Walaa"=>39,"Ramy"=>40);
arsort($arr2); 
echo "<br> sorted descending by value : <br>";
print_r($arr2);
echo"<br>";

asort($arr2);
echo "<br>sorted ascending array by key : <br>";
print_r($arr2);
echo"<br>";

krsort($arr2);
echo "<br> sorted descending array by keys : <br>";
print_r($arr2);
echo"<br>";


ksort($arr2);   
echo"<br> sorted ascending array by keys : <br>" ;
print_r($arr2);
?>