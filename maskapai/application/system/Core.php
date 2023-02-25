<?php

/* 
    | @desc class Core digunakan sebagai blueprint untuk memudahkan pembuatan aplikasi di Controller.
    | @author Ananda Akram Syahrastani (anandaakrams@gmail.com)
    | @version v.1.0.0
    | @date 25 Februari 2023
*/

class Core
{
    /* 
        | @desc method view adalah blueprint khusus untuk view templating di controller
        | @params $view adalah nama file/path view tanpa extension (Contoh: 'index.php' maka cukup ditulis 'index')
        | @params $data adalah penampung data yang akan diparsing ke view
    */
    public function view($view, $data = [])
    {
        require_once './application/view/' . $view . '.php';
    }

}
