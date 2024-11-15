<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'user_id',
        'description',
        'budget',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
