<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\En_OTP_Type;

class Otp extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'type' => En_OTP_Type::class,
        ];
    }

}
