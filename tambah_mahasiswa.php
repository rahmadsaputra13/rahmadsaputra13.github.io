<?php
require_once "koneksi.php";

$error = "";
$pesan = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nim = trim($_POST["nim"] ?? "");
    $nama = trim($_POST["nama"] ?? "");
    $nilai = filter_input(INPUT_POST, "nilai", FILTER_VALIDATE_INT);

    if ($nim === "" || $nama === "" || $nilai === false || $nilai === null || $nilai < 0 || $nilai > 100) {
        $error = "Lengkapi semua data. Nilai harus berupa angka 0 sampai 100.";
    } else {
        try {
            $sql = "INSERT INTO mahasiswa (nim, nama, nilai) VALUES (:nim, :nama, :nilai)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ":nim" => $nim,
                ":nama" => $nama,
                ":nilai" => $nilai
            ]);
            $pesan = "Data mahasiswa berhasil ditambahkan.";
        } catch (PDOException $e) {
            $error = "Data gagal disimpan. Pastikan NIM belum digunakan.";
        }
    }
}

$stmt = $pdo->query("SELECT nim, nama, nilai FROM mahasiswa ORDER BY nim ASC");
$daftarMahasiswa = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa PDO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
    <a href="index.php">← Kembali ke menu</a>
    <h1>Tambah Mahasiswa</h1>
    <form method="post">
        <label>NIM
            <input type="text" name="nim" maxlength="20" required>
        </label>
        <label>Nama
            <input type="text" name="nama" maxlength="100" required>
        </label>
        <label>Nilai
            <input type="number" name="nilai" min="0" max="100" step="1" required>
        </label>
        <button type="submit">Simpan Mahasiswa</button>
    </form>

    <?php if ($pesan): ?><p class="success"><?= htmlspecialchars($pesan) ?></p><?php endif; ?>
    <?php if ($error): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>

    <h2>Daftar Mahasiswa</h2>
    <?php if (count($daftarMahasiswa) > 0): ?>
        <table>
            <thead><tr><th>No.</th><th>NIM</th><th>Nama</th><th>Nilai</th></tr></thead>
            <tbody>
            <?php foreach ($daftarMahasiswa as $i => $mhs): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= htmlspecialchars($mhs["nim"]) ?></td>
                    <td><?= htmlspecialchars($mhs["nama"]) ?></td>
                    <td><?= htmlspecialchars((string)$mhs["nilai"]) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="muted">Belum ada data mahasiswa.</p>
    <?php endif; ?>
</main>
</body>
</html>
