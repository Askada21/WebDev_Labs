
<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $price = $_POST["price"] ?? "";
    $stock = $_POST["stock"] ?? "";

    if ($name == "" || !is_numeric($price) || $price < 0 ||
        filter_var($stock, FILTER_VALIDATE_INT) === false || $stock < 0) {
        $message = "Please enter valid product details.";
    } else {
        $sql = "insert into Product (PName, Description, Price, Stock)
                values (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdi", $name, $description, $price, $stock);

        if ($stmt->execute()) {
            $message = "Product added successfully!";
        } else {
            $message = "Error adding product.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add New Product</h1>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="post">

    <label>Product Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>Description:</label>
    <input type="text" name="description">
    <br><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" min="0" required>
    <br><br>

    <label>Stock:</label>
    <input type="number" name="stock" min="0" required>
    <br><br>

    <button type="submit">Add Product</button>

</form>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
