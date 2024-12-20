<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    /*
        FUNGSI UNTUK MENGEMBALIKAN ARRAY KATEGORI
    */
    public function toArray(Request $request): array
    {
    // Mengembalikan data kategori dalam bentuk array yang sudah diformat.

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'icon'              => $this->icon,
            'description'       => $this->description,
            'budget'            => $this->budget,
            'type'              => $this->type,
            'total_transaction' => $this->total_transaction ?? 0,
            'user'              => [
                'fullname'     => $this->user->fullname,
                'phone_number' => $this->user->phone_number,
                'email'        => $this->user->email,
            ]
        ];
    }
}
