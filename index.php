<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama  = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok  = $_POST['stok'];

    $stmt = $conn->prepare("INSERT INTO produk (nama_produk, harga, stok) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $nama, $harga, $stok);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $stmt = $conn->prepare("DELETE FROM produk WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: index.php");
    exit();
}

$result = $conn->query("SELECT * FROM produk ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Katalog UMKM Sederhana</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; }
        .container { max-width: 800px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .form-group { margin-bottom: 10px; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background-color: #28a745; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        .btn-danger { background-color: #dc3545; color: white; text-decoration: none; padding: 5px 10px; border-radius: 3px; font-size: 12px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Katalog Produk UMKM</h2>
    
    <form method="POST" action="">
        <h3>Tambah Produk Baru</h3>
        <div class="form-group">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" required>
        </div>
        <div class="form-group">
            <label>Harga (Rp):</label>
            <input type="number" name="harga" required>
        </div>
        <div class="form-group">
            <label>Stok:</label>
            <input type="number" name="stok" required>
        </div>
        <button type="submit" name="tambah">Simpan Produk</button>
    </form>

    <hr>

    <h3>Daftar Produk</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama_produk']; ?></td>
            <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><?= $row['stok']; ?></td>
            <td>
                <a href="index.php?hapus=<?= $row['id']; ?>" class="btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>