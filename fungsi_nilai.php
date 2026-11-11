<?php
function konversiNilai(int $nilai): string
{
    if ($nilai < 0 || $nilai > 100) {
        return "Nilai tidak valid";
    }

    if ($nilai >= 81) return "A";
    if ($nilai >= 76) return "B";
    if ($nilai >= 61) return "C";
    if ($nilai >= 36) return "D";
    return "E";
}
