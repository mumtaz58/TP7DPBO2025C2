<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Bunga</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        header {
            background-color: #ff69b4;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        nav {
            background-color: #f06292;
            padding: 0.5rem;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            margin: 0 0.5rem;
            border-radius: 3px;
            display: inline-block;
        }
        nav a:hover {
            background-color: #e91e63;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
        .search-box {
            margin: 1rem 0;
            padding: 0.5rem;
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 0.5rem;
            text-align: left;
        }
        th {
            background-color: #f06292;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            color: white;
            background-color: #ff69b4;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            margin: 0.2rem;
        }
        .btn-primary {
            background-color: #ff69b4;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-success {
            background-color: #4CAF50;
        }
        .btn-warning {
            background-color: #ff9800;
        }
        form {
            background-color: white;
            padding: 1rem;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form div {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
        }
        input[type="text"], input[type="email"], input[type="number"], textarea, select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .message {
            padding: 0.5rem;
            margin: 1rem 0;
            border-radius: 3px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <header>
        <h1>Toko Bunga "A&Y Blossom Haus"</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="index.php?page=flower">Daftar Bunga</a>
        <a href="index.php?page=supplier">Pemasok</a>
        <a href="index.php?page=order">Pesanan</a>
    </nav>
    <div class="container">
        <?php if(isset($_SESSION['message'])): ?>
            <div class="message <?= $_SESSION['message_type'] ?>">
                <?= $_SESSION['message'] ?>
            </div>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['message_type']);
            ?>
        <?php endif; ?>