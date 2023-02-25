<?php

require './application/system/Core.php';

class Flight extends Core
{

    protected const JSON_URL = './application/library/json/';

    public function __construct()
    {
        if (isset($_POST['input'])) {
            return $this->input();
        }
    }

    public function index()
    {
        $data['bandara'] = json_decode(file_get_contents(self::JSON_URL . 'bandara.json'));
        $data['rute'] = json_decode(file_get_contents(self::JSON_URL . 'data.json'));

        sort($data['rute']);

        $this->view('template/header');
        $this->view('flight/index', $data);
        $this->view('template/footer');
    }

    public function input()
    {
        $maskapai = $_POST['maskapai'];

        $asal = $_POST['asal'];
        $asal = explode('$', $asal);
        $asalBandara = $asal[0];
        $asalPajak = $asal[1];

        $tujuan = $_POST['tujuan'];
        $tujuan = explode('$', $tujuan);
        $tujuanBandara = $tujuan[0];
        $tujuanPajak = $tujuan[1];

        $harga = $_POST['harga'];

        $pajak = $asalPajak + $tujuanPajak;
        $totalHarga = $harga + $pajak;

        $dataInput = [$maskapai, $asalBandara, $tujuanBandara, $harga, $pajak, $totalHarga];

        $data = json_decode(file_get_contents(self::JSON_URL . 'data.json'));
        array_push($data, $dataInput);

        unlink(self::JSON_URL . 'data.json');
        file_put_contents(self::JSON_URL . 'data.json', json_encode($data));

        unset($_POST);
        header('location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        die();
    }
}
