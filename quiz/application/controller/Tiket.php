<?php

require './application/system/Core.php';

/* 
    | @desc class controller Tiket digunakan sebagai blueprint pada modul Tiket untuk mengelola dan parsing data ke view.
    | @required Core.php
    | @author Ananda Akram Syahrastani (anandaakrams@gmail.com)
    | @version v.1.0.0
    | @date 25 Februari 2023
*/

class Tiket extends Core
{

    protected const JSON_URL = './application/library/json/'; // path ke folder json

    public function __construct()
    {
        // pengecekan apakah ada input yang di-post
        if (isset($_POST['input'])) {
            return $this->input();
        }
    }

    /* 
        | @desc method index adalah method yang pertama kali dipanggil setelah constructor
    */
    public function index()
    {
        $data['master'] = json_decode(file_get_contents(self::JSON_URL . 'master.json')); // load data master dari master.json
        $data['penumpang'] = json_decode(file_get_contents(self::JSON_URL . 'penumpang.json')); // load data penumpang dari master.json

        sort($data['penumpang']); // sorting data penumpang berdasarkan nama penumpang

        $this->view('template/header'); // load header template
        $this->view('tiket/index', $data); // load index template
        $this->view('template/footer'); // load footer template
    }

    /* 
        | @desc apabila constructor mendeteksi post input, maka saat objek class ini di-instansiasi method input akan langsung dipanggil
    */
    public function input()
    {
        // tampung semua POST ke dalam variabel
        $ktp = $_POST['ktp'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $hari = $_POST['hari'];
        $tgl_berangkat = $_POST['tgl-berangkat'];
        $jml_penumpang = intval($_POST['jml-penumpang']);

        $jurusan = $_POST['jurusan'];
        $jurusan = explode('$', $jurusan);
        $jurusanTiket = $jurusan[0];
        $tarif = intval($jurusan[1]);
        $diskon = $jurusan[2];

        $amountDiscount = 0;
        if ($jml_penumpang > 5) {
            $amountDiscount = ($tarif * $jml_penumpang) * $diskon;
        }

        $totalBayar = ($tarif * $jml_penumpang) - $amountDiscount;

        // semua POST ditampung di dalam array untuk diinput ke file json
        $dataInput = [
            'ktp' => $ktp,
            'nama' => $nama,
            'alamat' => $alamat,
            'hari' => $hari,
            'tgl_berangkat' => $tgl_berangkat,
            'jurusan' => $jurusanTiket,
            "jml_penumpang" => $jml_penumpang,
            "tarif" => $tarif * $jml_penumpang,
            "diskon" => $amountDiscount,
            "total_bayar" => $totalBayar
        ];

        $data = json_decode(file_get_contents(self::JSON_URL . 'penumpang.json')); // load data penumpang dari penumpang.json
        array_push($data, $dataInput); // menambah $dataInput ke array $data

        // menimpa file data.json yang lama dengan yang baru
        unlink(self::JSON_URL . 'penumpang.json');
        file_put_contents(self::JSON_URL . 'penumpang.json', json_encode($data));

        unset($_POST); // menghapus variabel $_POST
        header('location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); // redirect ke method index
        die();
    }
}
