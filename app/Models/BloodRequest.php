<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'patient_name', 'patient_age', 'patient_gender',
        'blood_group', 'bags_needed', 'needed_by', 'urgency',
        'hospital_name', 'hospital_address', 'division', 'district', 'upazila',
        'contact_phone', 'description', 'status',
    ];

    protected $casts = [
        'needed_by' => 'date',
    ];

    public function scopeActive(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFound(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->where('status', 'found');
    }

    public function scopeClosed(\Illuminate\Database\Eloquent\Builder $query)
    {
        return $query->where('status', 'closed');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function locationString(): string
    {
        return collect([$this->district, $this->upazila])->filter()->implode(', ');
    }
}
