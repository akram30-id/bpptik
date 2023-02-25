<?php

class Core
{
    public function view($view, $data = [])
    {
        require_once './application/view/' . $view . '.php';
    }

}
