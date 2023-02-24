<?php

if (isset($_POST["bilangan_1"], $_POST["bilangan_2"])) {

    $bilangan1 = intval($_POST["bilangan_1"]);
    $bilangan2 = intval($_POST["bilangan_2"]);

    $status = 'available';

    $resultPenjumlahan = 0;
    $resultPengurangan = 0;
    $resultPerkalian = 0;
    $resultPembagian = 0;

    /* 
        @desc method digunakan untuk penjumlahan
        @return $resultPenjumlahan adalah hasil penjumlahan $bilangan1 dan $bilangan2
    */
    function penjumlahan()
    {
        global $bilangan1, $bilangan2;
        $resultPenjumlahan = $bilangan1 + $bilangan2;
        return $resultPenjumlahan;
    }

    /* 
        @desc method digunakan untuk penjumlahan
        @return $resultPengurangan adalah hasil pengurangan $bilangan1 dan $bilangan2
    */
    function pengurangan()
    {
        global $bilangan1, $bilangan2;
        $resultPengurangan = $bilangan1 - $bilangan2;
        return $resultPengurangan;
    }

    /* 
        @desc method digunakan untuk penjumlahan
        @return $resultPerkalian adalah hasil perkalian $bilangan1 dan $bilangan2
    */
    function perkalian()
    {
        global $bilangan1, $bilangan2;
        $resultPerkalian = $bilangan1 * $bilangan2;
        return $resultPerkalian;
    }

    /* 
        @desc method digunakan untuk penjumlahan
        @return $resultPembagian adalah hasil pembagian $bilangan1 dan $bilangan2
    */
    function pembagian()
    {
        global $bilangan1, $bilangan2;
        if ($bilangan2 == 0) {
            $resultPembagian = "Can not divided by zero";
        } else {
            $resultPembagian = $bilangan1 / $bilangan2;
        }

        return $resultPembagian;
    }

    penjumlahan();
    pengurangan();
    perkalian();
    pembagian();

} else {
    $status = 'unavailable';

    $bilangan1 = 0;
    $bilangan2 = 0;

    $resultPenjumlahan = 0;
    $resultPengurangan = 0;
    $resultPerkalian = 0;
    $resultPembagian = 0;
}
