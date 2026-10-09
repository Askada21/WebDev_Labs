
<?php
// Task 1
$around = "around";

echo 'What goes ' . $around . ' comes ' . $around . '.';
echo "<br>";

echo "What goes $around comes $around.";
echo "<br><br>";
?>


<?php
// Task 2
$color = array('white', 'green', 'red', 'blue', 'black');

echo "The memory of that scene for me is like a frame of film forever frozen at that moment: the "
    . $color[2] . " carpet, the "
    . $color[1] . " lawn, the "
    . $color[0] . " house, the leaden sky. The new president and his first lady. - Richard M. Nixon";

echo "<br><br>";
?>


<?php
// Task 3
$a1 = false;

$result1 = (5 < 6) ? "True" : "False";
$result2 = ($a1 == false) ? "True" : "False";
$result3 = ("123" === 123) ? "True" : "False";

echo "Condition 1: " . $result1 . "<br>";
echo "Condition 2: " . $result2 . "<br>";
echo "Condition 3: " . $result3 . "<br><br>";
?>

<?php

// Task 4
echo "<br>Equality:<br>"; 
echo "<br>"; 
if (123 == "123") 
    print("Equality 1<br>");
if (123 == "100" + 23) 
    print("Equality 2<br>");

echo "<br>Identity:<br>"; 
echo "<br>"; 
if (123 === "123") 
    print("Identity 1<br>");
if (123 === "100" + 23) 
    print("Identity 2<br>");


