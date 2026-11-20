<?php
include "db.php";

$message = "";
$product = null;
$idValue = $_SERVER["REQUEST_METHOD"] === "POST"
    ? ($_POST["id"] ?? "")
    : ($_GET["id"] ?? "");
$id = is_string($idValue) ? $idValue : "";
$name = "";
$description = "";
$price = "";
$stock = "";

// Load the current details before offering the edit form.
if (isset($_GET["id"]) || $_SERVER["REQUEST_METHOD"] === "POST") {
    if (filter_var($id, FILTER_VALIDATE_INT) === false || $id <= 0) {
        $message = "Please enter a valid Product ID.";
    } else {
        $stmt = $conn->prepare("SELECT ProductID, PName, Description, Price, Stock FROM Product WHERE ProductID = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $product = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($product) {
            $name = $product["PName"] ?? "";
            $description = $product["Description"] ?? "";
            $price = $product["Price"] ?? "";
            $stock = $product["Stock"] ?? "";
        } else {
            $message = "Product not found.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && $product) {
    $name = is_string($_POST["name"] ?? null) ? trim($_POST["name"]) : "";
    $description = is_string($_POST["description"] ?? null) ? trim($_POST["description"]) : "";
    $price = is_string($_POST["price"] ?? null) ? $_POST["price"] : "";
    $stock = is_string($_POST["stock"] ?? null) ? $_POST["stock"] : "";

    if ($name === "" || strlen($name) > 100 ||
        !is_numeric($price) || !is_finite((float) $price) || $price < 0 || $price > 99999999.99 ||
        filter_var($stock, FILTER_VALIDATE_INT) === false || $stock < 0 || $stock > 2147483647) {
        $message = "Please enter valid product details. Price must be a number from 0 to 99999999.99 and stock must be a non-negative whole number.";
    } else {
        $stmt = $conn->prepare("UPDATE Product SET PName = ?, Description = ?, Price = ?, Stock = ? WHERE ProductID = ?");
        $stmt->bind_param("ssdii", $name, $description, $price, $stock, $id);
        if ($stmt->execute()) {
            $message = $stmt->affected_rows > 0
                ? "Product updated successfully!"
                : "No changes were made.";
            $product["PName"] = $name;
        } else {
            $message = "Error updating product.";
        }
        $stmt->close();
    }
}

function escape($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>

<h1>Update Product</h1>

<p role="status"><?php echo escape($message); ?></p>

<form method="get" action="update.php">

    <label for="product-id">Product ID:</label>
    <input id="product-id" type="number" name="id" min="1" step="1" required value="<?= escape($id) ?>">
    <button type="submit">Load Product</button>
</form>

<?php if ($product): ?>
<h2>Editing: <?= escape($product["PName"] ?? "") ?> (ID: <?= escape($product["ProductID"]) ?>)</h2>
<p>The current details are filled in below. Change only the fields you need.</p>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= escape($product["ProductID"]) ?>">

    <label for="name">Product Name:</label>
    <input id="name" type="text" name="name" maxlength="100" required value="<?= escape($name) ?>">
    <br><br>

    <label for="description">Description:</label>
    <input id="description" type="text" name="description" value="<?= escape($description) ?>">
    <br><br>

    <label for="price">Price:</label>
    <input id="price" type="number" name="price" step="0.01" min="0" max="99999999.99" required value="<?= escape($price) ?>">
    <br><br>

    <label for="stock">Stock:</label>
    <input id="stock" type="number" name="stock" min="0" max="2147483647" step="1" required value="<?= escape($stock) ?>">
    <br><br>

    <button type="submit">Update Product</button>

</form>
<?php endif; ?>

<p><a href="index.php">Back to Home</a></p>

</body>
</html>
