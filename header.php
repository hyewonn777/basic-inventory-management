<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD Inventory</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #1d2671, #c33764);
      min-height: 100vh;
      color: #f8f9fa;
    }
    .navbar {
      border-bottom: 3px solid #ffc107;
    }
    .table {
      background-color: #fff;
      color: #212529;
      border-radius: 10px;
      overflow: hidden;
    }
    .btn-primary {
      background: #c33764;
      border: none;
    }
    .btn-primary:hover {
      background: #1d2671;
    }
    .page-title {
      font-weight: 600;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.3);
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <div class="container">
    <a class="navbar-brand fw-bold text-warning" href="index.php">✨ Inventory System</a>
  </div>
</nav>
