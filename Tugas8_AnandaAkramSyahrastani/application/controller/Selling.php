<?php

/* 
    | @desc class Controller digunakan penghubung antara koneksi database dari Class Model ke Client / view
    | @desc class Controller Seliling digunakan sebagai jembatan dari class SellingModel ke view/selling
    | @author Ananda Akram Syahrastani (anandaakrams@gmail.com)
    | @required SellingModel.php
    | @version v.1.0.0
    | @date 24 Februari 2023
*/
class Selling
{

    /* 
        | @desc constructor method akan dijalankan pertama kali tiap object dibuat
     */
    function __construct()
    {
        include './application/model/SellingModel.php'; // memanggil Class Model SellingModel
        if (isset($_POST['hitung'])) { // pengecekan apakah ada form yang di-submit untuk penambahan data penjualan
            return $this->sold();
        }
    }

    /* 
        | @desc index method akan dijalankan pertama kali setelah constructor
        | @desc index method akan me-load skrip HTML di view/selling untuk tampil di client-side
     */
    function index()
    {
        $selling = new SellingModel(); // instansiasi object dari Class Model SellingModel

        $dataHarga = json_decode($selling->getListHarga()); // mendapatkan data harga dari db
        $dataCustomer = json_decode($selling->getListCustomer()); // mendapatkan data customer dari db
        
        $data = [
            'buah' => $dataHarga,
            'customer' => $dataCustomer
        ];

        // menjalankan view selling dan parsing variabel $data ke view
        include './application/view/template/header.php';
        include './application/view/selling/index.php';
        include './application/view/template/footer.php';
    }

    /* 
        | @desc sold method akan dijalankan jika ada form submit untuk input penjualan
        | @desc sold method akan dicek terlebih dahulu di method constructor
     */
    function sold()
    {
        $pembeli = $_POST['nama-pembeli']; // tampung input nama pembeli di variabel
        $buah = $_POST['buah']; // input buah berisi HargaBuah-NamaBuah

        $buah = explode("-", $buah); // pecah input buah menjadi array dengan pemisah "-"
        $hargaBuah = $buah[0];
        $namaBuah = $buah[1];

        $jumlah = $_POST['jumlah-beli']; // tampung input jumlah beli di variabel
        $total = intval($hargaBuah) * intval($jumlah); // perhitungan total harga beli

        // tampung seluruh data ke array asosiatf
        $dataNew = [
            "pembeli" => $pembeli,
            "buah" => $namaBuah,
            "jumlah" => $jumlah,
            "harga" => $hargaBuah,
            "total" => $total
        ];

        $selling = new SellingModel(); // instansiasi object dari Class Model SellingModel
        $dataCustomer = json_decode($selling->getListCustomer()); // ubah json object menjadi PHP associative array
        array_push($dataCustomer->response->data, $dataNew); // tambahkan data yang baru diiinput ke array customer

        unlink($selling::JSON . 'data_customer.json'); // hapus file data_customer.json yang lama
        file_put_contents($selling::JSON . 'data_customer.json', json_encode($dataCustomer)); // buat file data_customer.json yang baru dengan penambahan input data baru

        unset($_POST);
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); // redirect ke method index
        die();
    }
}
