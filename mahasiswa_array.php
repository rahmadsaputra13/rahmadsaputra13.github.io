<?php
$mahasiswa = [
    ["nim" => "231001", "nama" => "Andi",  "nilai" => 85],
    ["nim" => "231002", "nama" => "Budi",  "nilai" => 78],
    ["nim" => "231003", "nama" => "Citra", "nilai" => 92],
    ["nim" => "231004", "nama" => "Dewi",  "nilai" => 68],
    ["nim" => "231005", "nama" => "Eko",   "nilai" => 74],
];

$total = 0;
foreach ($mahasiswa as $mhs) {
    $total += $mhs["nilai"];
}
$rataRata = $total / count($mahasiswa);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Array Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
    <a href="index.php">← Kembali ke menu</a>
    <h1>Daftar 5 Mahasiswa</h1>
    <table>
        <thead><tr><th>No.</th><th>NIM</th><th>Nama</th><th>Nilai</th></tr></thead>
        <tbody>
        <?php foreach ($mahasiswa as $index => $mhs): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($mhs["nim"]) ?></td>
                <td><?= htmlspecialchars($mhs["nama"]) ?></td>
                <td><?= $mhs["nilai"] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p class="success">Rata-rata nilai: <strong><?= number_format($rataRata, 2) ?></strong></p>
</main>
</body>
</html>
