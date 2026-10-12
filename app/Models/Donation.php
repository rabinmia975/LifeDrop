<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = ['donor_id', 'blood_request_id', 'donated_at', 'bag_count', 'note'];

    protected $casts = ['donated_at' => 'date'];
}
