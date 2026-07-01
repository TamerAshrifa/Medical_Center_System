<?php

namespace App\GeneralClasses;

class Response
{
    public bool $did_succeed;
    public ?array $message;
    public $data;
    public int $statusCode;

    public function __construct(
        bool $did_succeed,
        ?array $message = null,
        $data = null,
        int $statusCode = 200,
    ) {
        $this->did_succeed = $did_succeed;
        $this->message = $message;
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public static function messageToArray(string $message)
    {
        return ['base_message' => $message];
    }

}