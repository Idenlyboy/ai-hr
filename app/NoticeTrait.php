<?php

namespace App;

trait NoticeTrait
{
    public function notice($code, $message = null, $data = null)
    {
        return [
            [
                'message' => $message,
                'data' => $data,
            ],
            'code' => $code,
        ];
    }
}
