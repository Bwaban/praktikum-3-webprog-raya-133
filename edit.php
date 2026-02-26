<?php
require 'connection.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $sql = "UPDATE mahasiswa SET npm = ?, nama = ?, jurusan = ? WHERE id
= ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$npm, $nama, $jurusan, $id])) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Mahasiswa</title>
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
        <h2>Edit Mahasiswa</h2>
        <form method="POST" action="">
            <label>NIM</label>
            <input type="text" name="npm" value="<?= htmlspecialchars($data['npm']); ?>" required>

            <label>Nama</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>

            <label>Jurusan</label>
            <input type="text" name="jurusan" value="<?= htmlspecialchars($data['jurusan']); ?>" required>

            <button type="submit" class="btn btn-save">Update Data</button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>

</html>