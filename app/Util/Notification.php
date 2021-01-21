<?php

namespace App\Util;

class Notification {
    public $msg;
    public $type;

    public function __construct($msg, $type)
    {
        $this->msg = $msg;
        $this->type = $type;
    }
}
