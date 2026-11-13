
<?php
include "db.php";

$sql = "select * from Product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show Products</title>
</head>
<body>

<h1>Product List</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["ProductID"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["PName"] ?? "") . "</td>";
            echo "<td>" . htmlspecialchars($row["Description"] ?? "") . "</td>";
            echo "<td>" . htmlspecialchars($row["Price"] ?? "") . "</td>";
            echo "<td>" . htmlspecialchars($row["Stock"] ?? "") . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No products found</td></tr>";
    }
    ?>
</table>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
