<?php

class Selling
{

    function __construct()
    {
        include './application/model/SellingModel.php';
        $view = [

        ];
        if (isset($_POST['hitung'])) {
            return $this->sold();
        }
    }

    function index()
    {
        // var_dump($_POST);
        // die();
        $selling = new SellingModel();
        $dataHarga = json_decode($selling->getListHarga());
        $dataCustomer = json_decode($selling->getListCustomer());
        $data = [
            'buah' => $dataHarga,
            'customer' => $dataCustomer
        ];

        // var_dump($data['customer']->response->data);
        // die();

        include './application/view/template/header.php';
        include './application/view/selling/index.php';
        include './application/view/template/footer.php';
        // return $data;
    }

    function sold()
    {
        $pembeli = $_POST['nama-pembeli'];
        $buah = $_POST['buah'];

        $buah = explode("-", $buah);
        $hargaBuah = $buah[0];
        $namaBuah = $buah[1];

        $jumlah = $_POST['jumlah-beli'];
        $total = intval($hargaBuah) * intval($jumlah);

        $dataNew = [
            "pembeli" => $pembeli,
            "buah" => $namaBuah,
            "jumlah" => $jumlah,
            "harga" => $hargaBuah,
            "total" => $total
        ];

        $selling = new SellingModel();
        $dataCustomer = json_decode($selling->getListCustomer());
        array_push($dataCustomer->response->data, $dataNew);

        unlink($selling::JSON . 'data_customer.json');
        file_put_contents($selling::JSON . 'data_customer.json', json_encode($dataCustomer));

        unset($_POST);
        header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        die();
    }
}
