<?php

$bilangan1 = intval($_GET["bilangan-1"]);
$bilangan2 = intval($_GET["bilangan-2"]);

/* 
        @desc method digunakan untuk penjumlahan
        @param $num1 adalah input bilangan 1 dengan tipe data integer
        @param $num2 adalah input bilangan 2 dengan tipe data integer
        @return $jumlah adalah hasil penjumlahan $num1 dan $num2
    */
function penjumlahan($num1, $num2)
{
    $jumlah = $num1 + $num2;
    return $jumlah;
}

/* 
        @desc method digunakan untuk penjumlahan
        @param $num1 adalah input bilangan 1 dengan tipe data integer
        @param $num2 adalah input bilangan 2 dengan tipe data integer
        @return $kurang adalah hasil pengurangan $num1 dan $num2
    */
function pengurangan($num1, $num2)
{
    $kurang = $num1 - $num2;
    return $kurang;
}

/* 
        @desc method digunakan untuk penjumlahan
        @param $num1 adalah input bilangan 1 dengan tipe data integer
        @param $num2 adalah input bilangan 2 dengan tipe data integer
        @return $kali adalah hasil perkalian $num1 dan $num2
    */
function perkalian($num1, $num2)
{
    $kali = $num1 * $num2;
    return $kali;
}

/* 
        @desc method digunakan untuk penjumlahan
        @param $num1 adalah input bilangan 1 dengan tipe data integer
        @param $num2 adalah input bilangan 2 dengan tipe data integer
        @return $bagi adalah hasil pembagian $num1 dan $num2
    */
function pembagian($num1, $num2)
{
    if ($num2 == 0) {
        $bagi = "Can not divided by zero";
    } else {
        $bagi = $num1 / $num2;
    }

    return $bagi;
}

echo "Bilangan 1: " . $bilangan1 . "<br>";
echo "Bilangan 2: " . $bilangan2 . "<br>";

echo "<br>";
echo "<div style='width:480px; height: 0px; border: 1px solid black;'>";
echo "<div style='width:480px; height: 0px; border: 1px solid black; margin-top: 3px;'>";
echo "<br>";

echo "hasil penjumlahan adalah: " . penjumlahan($bilangan1, $bilangan2) . "<br>";
echo "hasil penguranan adalah: " . pengurangan($bilangan1, $bilangan2) . "<br>";
echo "hasil perkalian adalah: " . perkalian($bilangan1, $bilangan2) . "<br>";
echo "hasil pembagian adalah: " . pembagian($bilangan1, $bilangan2) . "<br>";
