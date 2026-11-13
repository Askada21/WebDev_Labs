
<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"] ?? "";
    $name = trim($_POST["name"] ?? "");
    $description = trim($_POST["description"] ?? "");
    $price = $_POST["price"] ?? "";
    $stock = $_POST["stock"] ?? "";

    if (filter_var($id, FILTER_VALIDATE_INT) === false ||
        $id <= 0 || $name == "" ||
        !is_numeric($price) || $price < 0 ||
        filter_var($stock, FILTER_VALIDATE_INT) === false ||
        $stock < 0) {
        $message = "Please enter valid product details.";
    } else {
        $sql = "update Product
                set PName = ?, Description = ?, Price = ?, Stock = ?
                where ProductID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);

        if ($stmt->execute()) {
            $message = $stmt->affected_rows > 0
                ? "Product updated successfully!"
                : "No product was changed. Check the ID or values.";
        } else {
            $message = "Error updating product.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Product</title>
</head>
<body>

<h1>Update Product</h1>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="post">

    <label>Product ID:</label>
    <input type="number" name="id" min="1" required>
    <br><br>

    <label>New Product Name:</label>
    <input type="text" name="name" required>
    <br><br>

    <label>New Description:</label>
    <input type="text" name="description">
    <br><br>

    <label>New Price:</label>
    <input type="number" name="price" step="0.01" min="0" required>
    <br><br>

    <label>New Stock:</label>
    <input type="number" name="stock" min="0" required>
    <br><br>

    <button type="submit">Update Product</button>

</form>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
