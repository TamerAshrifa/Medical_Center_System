<?php

namespace App\GeneralClasses;

use App\GeneralClasses\Enums\ResponseStatusEnum;

class Response
{
    public ResponseStatusEnum $result;
    public ?array $message;
    public $data;
    public int $statusCode;

    public function __construct(
        ResponseStatusEnum $result,
        ?array $message = null,
        $data = null,
        int $statusCode = 200,
    ) {
        $this->result = $result;
        $this->message = $message;
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

    public static function messageToArray(string $message)
    {
        return ['base_message' => $message];
    }


}