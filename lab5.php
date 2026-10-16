<?php
// Task 1 If Else

$time = date("H");

if ($time < 10) {
    echo "Have a good morning!";
} elseif ($time < 20) {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
echo "<br>";
?>

<?php
// Task 2 While Do...While
$i = 5;
while ($i <= 40){
    if ($i != 25){
        echo $i . " "; // Add space after each number
    }
    $i += 5;
}
echo "<br>";
?>

<?php
// Task 2 Do...While
$i = 5;
do{
    if ($i != 25){
        echo $i . " ";
    }
    $i += 5;
}
while ($i <= 40)
?>

<?php
// Task 2 Foreach & Array Iterator 
echo "<br>";
$programmingLanguagesArray = ["PHP", "C++", "C#", "Python", "Java"];
foreach ($programmingLanguagesArray as $language){
    echo $language . " ";
}
echo "<br>";

$iterator = new ArrayIterator($programmingLanguagesArray);
while ($iterator->valid()){
    echo $iterator->current() . "<br>";
    $iterator->next();
}
?>





