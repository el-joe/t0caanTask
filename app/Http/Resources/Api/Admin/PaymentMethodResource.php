<?php

namespace App\Http\Resources\Api\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'class' => $this->class,
            'configuration' => $this->configuration,
            'required_fields' => $this->required_fields,
            'active' => $this->active,
            'created_at' => $this->created_at,
        ];
    }
}
