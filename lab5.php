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
?>

<?php
//
?>
