<?php include 'db.php'; ?>
<?php
$id = $_GET['id'];
$conn->query("DELETE FROM inventory WHERE item_id=$id");
header("Location: index.php");
?>