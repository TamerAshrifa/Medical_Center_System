<?php

namespace App\DTOs\Unavailability;

use App\Enums\UnavailabilityReasonTypeEnum;
use App\Enums\UnavailabilityTypeEnum;

readonly class UnavailabilityDTO
{
    public function __construct(
        public string $from_date,
        public string $to_date,
        public UnavailabilityTypeEnum $type,
        public UnavailabilityReasonTypeEnum $reason_type,
        public ?string $justification,
    ) {
    }
    public static function fromRequest(array $request): self
    {
        return new self(
            from_date: $request['from_date'],
            to_date: $request['to_date'],
            type: $request['type'],
            reason_type: $request['reason_type'],
            justification: isset($request['justification']) ? $request['justification'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'type' => $this->type->value,
            'reason_type' => $this->reason_type->value,
            'justification' => $this->justification,
        ];
    }
}