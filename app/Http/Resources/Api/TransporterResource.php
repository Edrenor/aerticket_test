<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class TransporterResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "code" => $this->code,
            "name" => $this->name,
        ];
    }
}
