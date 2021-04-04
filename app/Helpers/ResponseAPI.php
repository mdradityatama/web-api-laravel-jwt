<?php

namespace App\Helpers;

class ResponseAPI {
    public $status;
    public $success;
    public $errorMessages = [];
    public $data = [];

    public function __construct() {
        $this->success = count($this->errorMessages) > 0 ? false : true;
    }
}
