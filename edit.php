<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM inventory WHERE item_id=$id");
$row = $result->fetch_assoc();
?>

<div class="container mt-5">
    <h2>Edit Inventory Item</h2>
    <form method="POST">
        <input type="text" name="item_name" value="<?= htmlspecialchars($row['item_name']); ?>" class="form-control mb-2" required>
        <textarea name="description" class="form-control mb-2"><?= htmlspecialchars($row['description']); ?></textarea>
        <input type="number" name="quantity" value="<?= $row['quantity']; ?>" class="form-control mb-2" required>
        <input type="number" step="0.01" name="price" value="<?= $row['price']; ?>" class="form-control mb-2" required>
        <input type="text" name="supplier" value="<?= htmlspecialchars($row['supplier']); ?>" class="form-control mb-2">
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE inventory SET item_name=?, description=?, quantity=?, price=?, supplier=? WHERE item_id=?");
    $stmt->bind_param("ssidsi", $_POST['item_name'], $_POST['description'], $_POST['quantity'], $_POST['price'], $_POST['supplier'], $id);
    $stmt->execute();
    header("Location: index.php");
}
?>
