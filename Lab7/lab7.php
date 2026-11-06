
<?php
$conn = new mysqli("localhost", "root", "", "LabDb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Product";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

echo "<h2>Product List</h2>";

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
      </tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . (int)$row["ProductID"] . "</td>";
    echo "<td>" . htmlspecialchars($row["PName"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["Description"] ?? "") . "</td>";
    echo "<td>" . htmlspecialchars($row["Price"]) . "</td>";
    echo "<td>" . (int)$row["Stock"] . "</td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>
