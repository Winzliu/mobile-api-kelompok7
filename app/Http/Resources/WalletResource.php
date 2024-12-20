<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Mengembalikan data wallet dalam bentuk array yang sudah diformat.

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'initial_balance'   => $this->initial_balance,
            'total_income'      => $this->total_income ?? 0,
            'total_expense'     => $this->total_expense ?? 0,
            'total_balance'     => $this->total_balance ?? (($this->initial_balance ?? 0) + ($this->total_income ?? 0) - ($this->total_expense ?? 0)),
            'is_active'         => $this->is_active,
            'created_at'        => Carbon::parse($this->created_at)->format('d/m/Y'),
            'transactions'      => $this->transactions->map(function ($transaction){
                return [
                    'category'              => $transaction->category->name,
                    'transaction_type'      => $transaction->category->type,
                    'date'                  => $transaction->created_at->format('d M Y'),
                    'description'           => $transaction->description,
                    'amount'                => $transaction->amount,
                ];
            }),
            'user'        => [
                'fullname'     => $this->user->fullname,
                'phone_number' => $this->user->phone_number,
                'email'        => $this->user->email,
            ]
        ];
    }
}
