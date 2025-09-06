<?php

namespace App;

trait NoticeTrait
{
    public function notice($code, $message = null, $data = null)
    {
        return [
            'data' => [
                'data' => $data,
                'message' => $message,
            ],
            'code' => $code,
        ];
    }
}
