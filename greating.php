
<!DOCTYPE html>
<html>
<body>

<!-- creates an html form that sends information to a PHP file -->
<form action="greating.php" method="post">
<!--POST is an http method used to send data from a webpage to a server-->
    <input type="number" name="hour" min="0" max="23" required> <!--creates an input field where the user can enter a number-->
    <input type="submit" value="Submit">
</form>

<?php
include "header.php";
// Task 4: POST Form with If-Else

// checks whether the user has submitted an hour through the html form
if (isset($_POST["hour"])) {
    $hour = $_POST["hour"];

    if ($hour < 10) {
        echo "Have a good morning!";
    } elseif ($hour < 18) {
        echo "Have a good day!";
    } elseif ($hour < 23) {
        echo "Good evening!";
    } else {
        echo "Switch off the computer!";
    }
}
?>

</body>
</html>
