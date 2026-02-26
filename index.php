<?php

require 'connection.php';
$stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
$mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e6ecfe;
        }

        h2 {
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .add-btn {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 12px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .add-btn:hover {
            background: #1e40af;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #2563eb;
            color: white;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        a.action {
            color: #2563eb;
            text-decoration: none;
            margin: 0 5px;
        }

        a.delete {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Daftar Mahasiswa</h2>
        <a href="tambah.php" class="add-btn">Tambah Data</a>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
            <?php $no = 1;
            foreach ($mahasiswa as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['npm']); ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['jurusan']); ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
                        <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return
confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>