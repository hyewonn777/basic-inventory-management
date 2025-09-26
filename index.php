<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inventory Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body,html {margin:0;height:100%;overflow-x:hidden;color:#fff}
    .bg-video {
      position:fixed;top:0;left:0;width:100%;height:100%;
      object-fit:cover;filter:blur(5px) brightness(.7);z-index:-1;
    }
    .card {background:rgba(0,0,0,.7);border-radius:12px}
    .table {color:#fff}
    .fade-row:hover {background:rgba(0,255,204,.1)!important;transition:.3s}
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
  <h2 class="text-center mb-4">Inventory Management</h2>

  <!-- Search + Add -->
  <div class="d-flex justify-content-between mb-3">
    <form method="get" class="d-flex">
      <input class="form-control me-2" type="search" name="search" placeholder="Search item...">
      <button class="btn btn-outline-light">Search</button>
    </form>
    <a href="add.php" class="btn btn-success">Add Item</a>
  </div>

  <!-- Inventory -->
  <div class="card shadow">
    <div class="card-body p-4">
      <table class="table table-hover align-middle">
        <thead class="table-dark">
          <tr>
            <th>ID</th><th>Name</th><th>Description</th>
            <th>Qty</th><th>Price</th><th>Supplier</th><th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $s = $_GET['search'] ?? '';
            $s = $conn->real_escape_string($s);
            $where = $s ? "WHERE item_name LIKE '%$s%' OR description LIKE '%$s%'" : "";
            $res = $conn->query("SELECT * FROM inventory $where ORDER BY item_id DESC");
            while ($r = $res->fetch_assoc()):
          ?>
          <tr class="fade-row">
            <td><?= $r['item_id'] ?></td>
            <td><?= $r['item_name'] ?></td>
            <td><?= $r['description'] ?></td>
            <td><?= $r['quantity'] ?></td>
            <td>₱<?= $r['price'] ?></td>
            <td><?= $r['supplier'] ?></td>
            <td>
              <a href="edit.php?id=<?= $r['item_id'] ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="delete.php?id=<?= $r['item_id'] ?>" class="btn btn-danger btn-sm"
                 onclick="return confirm('Delete this item?');">Delete</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
const music = document.getElementById("bg-music");
const btn   = document.getElementById("mute-btn");

// restores mute state
if (localStorage.musicMuted === "true") {
  music.muted = true;
  btn.textContent = "🔇";
}

// toggle mute
btn.onclick = () => {
  music.muted = !music.muted;
  localStorage.musicMuted = music.muted;
  btn.textContent = music.muted ? "🔇" : "🔊";
};
</script>
</body>
</html>
