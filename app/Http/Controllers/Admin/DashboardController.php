<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodBank;
use App\Models\BloodRequest;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $bloodGroups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

        return view('admin.dashboard', [
            'stats' => [
                'donors' => Donor::count(),
                'approvedDonors' => Donor::approved()->count(),
                'pendingDonors' => Donor::where('status', 'pending')->count(),
                'activeRequests' => BloodRequest::active()->count(),
                'foundRequests' => BloodRequest::found()->count(),
                'users' => User::count(),
                'donations' => Donation::count(),
                'bloodBanks' => BloodBank::count(),
            ],
            'donorsByGroup' => Donor::approved()
                ->selectRaw('blood_group, count(*) as total')
                ->groupBy('blood_group')
                ->pluck('total', 'blood_group'),
            'recentRequests' => BloodRequest::latest()->take(8)->get(),
            'pendingDonorList' => Donor::where('status', 'pending')->latest()->take(5)->get(),
            'bloodGroups' => $bloodGroups,
        ]);
    }
}
