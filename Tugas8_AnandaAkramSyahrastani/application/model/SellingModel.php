<?php 
/* 
    | @desc class Model digunakan untuk koneksi program ke database
    | @desc class SellingModel digunakan untuk koneksi ke database dan parsing data return ke SellingController
    | @author Ananda Akram Syahrastani (anandaakrams@gmail.com)
    | @required data_harga.json & data_customer.json
    | @version v.1.0.0
    | @date 24 Februari 2023
*/
class SellingModel {

    const JSON = './application/lib/json/'; // base url database json

    /* 
        | @desc method digunakan untuk mendapatkan list seluruh data harga buah
        | @return $data mengembalikan json object list harga buah
     */
    function getListHarga()
    {
        $data = file_get_contents(self::JSON . 'data_harga.json');
        return $data;
    }

    /* 
        | @desc method digunakan untuk mendapatkan list seluruh data customer/pembeli
        | @return $data mengembalikan json object list data customer
     */
    function getListCustomer()
    {
        $data = file_get_contents(self::JSON . 'data_customer.json');
        return $data;
    }

}
