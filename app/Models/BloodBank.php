<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'address', 'division', 'district', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActiveBanks(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->where('is_active', true);
    }
}
