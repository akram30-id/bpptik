<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1366, initial-scale=1.0">
    <title>Tugas 5 - BPPTIK JWD</title>
</head>

<body>
    <form method="get">
        <label for="bilangan-1">Bilangan 1</label><br>
        <input style="margin-bottom: 8px;" type="number" name="bilangan-1" <?php if (isset($_GET['bilangan-1'])){echo "value=" . $_GET['bilangan-1'];} else {echo "value=0";} ?> id="bilangan-1">
        <br>
        <label for="bilangan-2">Bilangan 2</label><br>
        <input style="margin-bottom: 8px;" type="number" name="bilangan-2" <?php if (isset($_GET['bilangan-2'])){echo "value=" . $_GET['bilangan-2'];} else {echo "value=0";} ?> id="bilangan-2">
        <br>
        <button type="submit">Hitung</button>
    </form>
</body>

</html>

<?php

if (isset($_GET["bilangan-1"], $_GET["bilangan-2"])) {

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
} else {
    echo "";
}

?>