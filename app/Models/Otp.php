<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\OtpTypeEnum;

class Otp extends Model
{
    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'type' => OtpTypeEnum::class,
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }

}
