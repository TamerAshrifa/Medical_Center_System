<?php

namespace App\GeneralClasses;

use App\GeneralClasses\Enums\ServiceResponseEnum;

class ServiceResponse
{
    public ServiceResponseEnum $result;
    public ?string $message;
    public $data;
    public int $statusCode;

    public function __construct(
        ServiceResponseEnum $result,
        string $message = null,
        $data = null,
        int $statusCode = 200,
    ) {
        $this->result = $result;
        $this->message = $message;
        $this->data = $data;
        $this->statusCode = $statusCode;
    }

}