<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AirportResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "code" => $this->code,
            "name" => $this->name,
            "timezone" => $this->timezone->name,
        ];
    }
}
