<?php
$host = getenv('DB_HOST') ?: 'mysql-db';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASS') ?: 'rootpassword';
$db   = getenv('DB_NAME') ?: 'umkm_db';
$port = getenv('DB_PORT') ?: 3306;

$conn = new mysqli($host, $user, $pass, $db, $port);

if ($conn->connect_error) {
    die("Koneksi Database Gagal: " . $conn->connect_error);
}
?>