<?php
require_once "fungsi_nilai.php";
$nilai = null;
$hasil = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nilai = filter_input(INPUT_POST, "nilai", FILTER_VALIDATE_INT);
    if ($nilai === false || $nilai === null) {
        $hasil = "Masukkan nilai berupa bilangan bulat.";
    } else {
        $hasil = konversiNilai($nilai);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Konversi Nilai RPS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
    <a href="index.php">← Kembali ke menu</a>
    <h1>Konversi Nilai RPS</h1>
    <p>A: 81–100 | B: 76–80 | C: 61–75 | D: 36–60 | E: 0–35</p>
    <form method="post">
        <label>Masukkan nilai (0–100)
            <input type="number" name="nilai" min="0" max="100" step="1" required>
        </label>
        <button type="submit">Konversi</button>
    </form>
    <?php if ($hasil !== ""): ?>
        <p class="success">Hasil: <strong><?= htmlspecialchars($hasil) ?></strong></p>
    <?php endif; ?>
</main>
</body>
</html>
