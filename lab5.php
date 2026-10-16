<?php
$time = date("H");

if ($time < 10) {
    echo "Have a good morning!";
} elseif ($time < 20) {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
?>
