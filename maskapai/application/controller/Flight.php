<?php

require './application/system/Core.php';

/* 
    | @desc class controller Flight digunakan sebagai blueprint pada modul Flight untuk mengelola dan parsing data ke view.
    | @required Core.php
    | @author Ananda Akram Syahrastani (anandaakrams@gmail.com)
    | @version v.1.0.0
    | @date 25 Februari 2023
*/

class Flight extends Core
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
        $data['bandara'] = json_decode(file_get_contents(self::JSON_URL . 'bandara.json'));
        $data['rute'] = json_decode(file_get_contents(self::JSON_URL . 'data.json'));

        sort($data['rute']);

        $this->view('template/header');
        $this->view('flight/index', $data);
        $this->view('template/footer');
    }

    /* 
        | @desc apabila constructor mendeteksi post input, maka saat objek class ini di-instansiasi method input akan langsung dipanggil
    */
    public function input()
    {
        // tampung semua POST ke dalam variabel
        $maskapai = $_POST['maskapai'];

        $asal = $_POST['asal'];
        $asal = explode('$', $asal); // memecah string dan memisahkan asal bandara dengan pajaknya
        $asalBandara = $asal[0];
        $asalPajak = $asal[1];

        $tujuan = $_POST['tujuan'];
        $tujuan = explode('$', $tujuan); // memecah string dan memisahkan tujuan bandara dengan pajaknya
        $tujuanBandara = $tujuan[0];
        $tujuanPajak = $tujuan[1];

        $harga = $_POST['harga'];

        $pajak = $asalPajak + $tujuanPajak;
        $totalHarga = $harga + $pajak;

        $dataInput = [$maskapai, $asalBandara, $tujuanBandara, $harga, $pajak, $totalHarga];

        $data = json_decode(file_get_contents(self::JSON_URL . 'data.json'));
        array_push($data, $dataInput); // menambah $dataInput ke array $data

        // menimpa file data.json yang lama dengan yang baru
        unlink(self::JSON_URL . 'data.json');
        file_put_contents(self::JSON_URL . 'data.json', json_encode($data));

        unset($_POST);
        header('location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']); // redirect ke method index
        die();
    }
}
