<?php
include 'db.php';
if (isset($_POST['submit'])) {
  $n = $_POST['item_name'];
  $d = $_POST['description'];
  $q = $_POST['quantity'];
  $p = $_POST['price'];
  $s = $_POST['supplier'];

  $sql = "INSERT INTO inventory (item_name,description,quantity,price,supplier)
          VALUES('$n','$d','$q','$p','$s')";
  echo $conn->query($sql)
    ? "<script>alert('Item added!');</script>"
    : "<div class='alert alert-danger'>Error: {$conn->error}</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Add Item</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body,html {margin:0;height:100%;overflow-x:hidden;color:#fff}
    .bg-video {
      position:fixed;top:0;left:0;width:100%;height:100%;
      object-fit:cover;filter:blur(5px) brightness(.7);z-index:-1;
    }
    .card {background:rgba(0,0,0,.7);border-radius:12px}
  </style>
</head>
<body>

<!-- Background -->
<video autoplay loop muted playsinline class="bg-video">
  <source src="images/One Piece 1015.mp4" type="video/mp4">
</video>

<!-- Music -->
<audio id="bg-music" autoplay loop>
  <source src="images/pitgorl.m4a" type="audio/flac">
</audio>
<button id="mute-btn" class="btn btn-light position-fixed bottom-0 end-0 m-3 rounded-circle shadow">🔊</button>

<div class="container mt-5">
  <a href="index.php" class="btn btn-light mb-3">⬅ Back</a>
  <div class="card shadow p-4">
    <h2 class="text-center text-info">Add Item</h2>
    <form method="post">
      <input type="text" name="item_name" placeholder="Item Name" class="form-control mb-2" required>
      <textarea name="description" placeholder="Description" class="form-control mb-2"></textarea>
      <input type="number" name="quantity" placeholder="Quantity" class="form-control mb-2" required>
      <input type="number" step="0.01" name="price" placeholder="Price (₱)" class="form-control mb-2" required>
      <input type="text" name="supplier" placeholder="Supplier" class="form-control mb-3">
      <button name="submit" class="btn btn-primary w-100">Save</button>
    </form>
  </div>
</div>

<script>
const music = document.getElementById("bg-music");
const btn   = document.getElementById("mute-btn");

if (localStorage.musicMuted === "true") {
  music.muted = true;
  btn.textContent = "🔇";
}

btn.onclick = () => {
  music.muted = !music.muted;
  localStorage.musicMuted = music.muted;
  btn.textContent = music.muted ? "🔇" : "🔊";
};
</script>
</body>
</html>
