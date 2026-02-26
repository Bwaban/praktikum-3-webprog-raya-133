<?php
require 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    // Gunakan Prepared Statement (?) untuk keamanan
    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nim, $nama, $jurusan])) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 40%;
            margin: 80px auto;
            background: white;
            padding: 25px;
            border-radius: 6px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 6px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-save {
            background: #2563eb;
            color: white;
        }

        .btn-save:hover {
            background: #1e40af;
        }

        .btn-cancel {
            margin-left: 10px;
            color: #2563eb;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tambah Mahasiswa</h2>
        <form method="POST" action="">
            <label>NIM:</label><br>
            <input type="text" name="npm" required><br>
            <label>Nama:</label><br>
            <input type="text" name="nama" required><br>
            <label>Jurusan:</label><br>
            <input type="text" name="jurusan" required><br><br>
            <button type="submit" class="btn btn-save">Simpan Data</button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </form>
</body>

</html>