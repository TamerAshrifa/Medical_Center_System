<?php

namespace App\Models;

use App\Enums\UnavailabilityReasonTypeEnum;
use App\Enums\UnavailabilityTypeEnum;
use Illuminate\Database\Eloquent\Model;

class Unavailability extends Model
{
    protected $guarded = [
        "id",
    ];
    protected function casts(): array
    {
        return [
            'from_date' => 'datetime:Y-m-d',
            'to_date' => 'datetime:Y-m-d',
            'type' => UnavailabilityTypeEnum::class,
            'reason_type' => UnavailabilityReasonTypeEnum::class,
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}
