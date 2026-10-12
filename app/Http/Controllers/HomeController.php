<?php

namespace App\Http\Controllers;

use App\Models\BloodBank;
use App\Models\BloodRequest;
use App\Models\Donor;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'donorCount' => Donor::approved()->count(),
            'requestCount' => BloodRequest::active()->count(),
            'bankCount' => BloodBank::activeBanks()->count(),
            'latestRequests' => BloodRequest::active()->orderByDesc('urgency')->latest()->take(6)->get(),
            'topDonors' => Donor::approved()->orderByDesc('total_donations')->take(6)->get(),
            'bloodBanks' => BloodBank::activeBanks()->orderBy('name')->take(8)->get(),
        ]);
    }
}
