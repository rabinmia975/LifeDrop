<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'phone', 'blood_group', 'age', 'gender',
        'division', 'district', 'upazila', 'area', 'address',
        'last_donation_date', 'is_available', 'status', 'total_donations', 'note',
    ];

    protected $casts = [
        'last_donation_date' => 'date',
        'is_available' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApproved(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeEligible(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->approved()->where('is_available', true)
            ->where(function ($q) {
                $q->whereNull('last_donation_date')
                  ->orWhere('last_donation_date', '<=', now()->subDays(90)->toDateString());
            });
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function isEligible(): bool
    {
        if (! $this->is_available || $this->status !== 'approved') {
            return false;
        }

        if ($this->last_donation_date) {
            return $this->last_donation_date->copy()->addDays(90)->isPast();
        }

        return true;
    }

    public function locationString(): string
    {
        return collect([$this->district, $this->upazila, $this->area])
            ->filter()->implode(', ');
    }
}
