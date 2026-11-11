<?php
$hasil = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $angka1 = filter_input(INPUT_POST, "angka1", FILTER_VALIDATE_FLOAT);
    $angka2 = filter_input(INPUT_POST, "angka2", FILTER_VALIDATE_FLOAT);
    $operator = $_POST["operator"] ?? "";

    if ($angka1 === false || $angka1 === null || $angka2 === false || $angka2 === null) {
        $error = "Masukkan kedua angka dengan benar.";
    } elseif (!in_array($operator, ["+", "-", "*", "/"], true)) {
        $error = "Operator tidak valid.";
    } elseif ($operator === "/" && (float)$angka2 == 0.0) {
        $error = "Pembagian dengan nol tidak diperbolehkan.";
    } else {
        switch ($operator) {
            case "+": $hasil = $angka1 + $angka2; break;
            case "-": $hasil = $angka1 - $angka2; break;
            case "*": $hasil = $angka1 * $angka2; break;
            case "/": $hasil = $angka1 / $angka2; break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<main class="container">
    <a href="index.php">← Kembali ke menu</a>
    <h1>Kalkulator Sederhana</h1>
    <form method="post">
        <label>Angka pertama
            <input type="number" name="angka1" step="any" required>
        </label>
        <label>Operator
            <select name="operator" required>
                <option value="+">Penjumlahan (+)</option>
                <option value="-">Pengurangan (-)</option>
                <option value="*">Perkalian (*)</option>
                <option value="/">Pembagian (/)</option>
            </select>
        </label>
        <label>Angka kedua
            <input type="number" name="angka2" step="any" required>
        </label>
        <button type="submit">Hitung</button>
    </form>
    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php elseif ($hasil !== null): ?>
        <p class="success">Hasil: <strong><?= htmlspecialchars((string)$hasil) ?></strong></p>
    <?php endif; ?>
</main>
</body>
</html>
