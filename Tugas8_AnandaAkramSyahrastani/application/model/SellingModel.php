<?php 

class SellingModel {

    const JSON = './application/lib/json/';

    function getListHarga()
    {
        $data = file_get_contents(self::JSON . 'data_harga.json');
        return $data;
    }

    function getListCustomer()
    {
        $data = file_get_contents(self::JSON . 'data_customer.json');
        return $data;
    }

}

?>