
<!DOCTYPE html>
<html>
<body>

<!-- Form to enter an integer -->
<form action="task4.php" method="post">
    <input type="number" name="num" min="0" max="23" required>
    <input type="submit" value="Submit">
</form>

<?php
// Task 5: POST Form with For Loop

if (isset($_POST["num"])) {
    $num = (int) $_POST["num"];

    // Loop from 1 to the entered number
    for ($i = 1; $i <= $num; $i++) {
        echo "<p style='font-size: {$i}px;'>Hello PHP!</p>";
    }
}
?>

</body>
</html>
