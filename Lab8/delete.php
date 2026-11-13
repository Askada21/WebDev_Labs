
<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"] ?? "";

    if (filter_var($id, FILTER_VALIDATE_INT) === false ||
        $id <= 0) {
        $message = "Please enter a valid Product ID.";
    } else {
        $sql = "delete from Product where ProductID = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                $message = "Product deleted successfully!";
            } else {
                $message = "Product not found.";
            }
        } else {
            $message = "Error deleting product.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Product</title>
</head>
<body>

<h1>Delete Product</h1>

<p><?php echo htmlspecialchars($message); ?></p>

<form method="post"
      onsubmit="return confirm('Are you sure you want to delete this product?');">

    <label>Product ID:</label>
    <input type="number" name="id" min="1" required>

    <button type="submit">Delete Product</button>

</form>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
