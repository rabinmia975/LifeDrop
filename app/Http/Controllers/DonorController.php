<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    public function index(Request $request)
    {
        $query = Donor::approved();

        if ($request->filled('group')) {
            $query->where('blood_group', (string) $request->input('group'));
        }
        if ($request->filled('division')) {
            $query->where('division', (string) $request->input('division'));
        }
        if ($request->filled('district')) {
            $query->where('district', (string) $request->input('district'));
        }
        if ($request->filled('upazila')) {
            $query->where('upazila', (string) $request->input('upazila'));
        }
        if ($request->boolean('available')) {
            $query->eligible();
        }

        $donors = (clone $query)->orderByDesc('is_available')->orderBy('name')->paginate(12)->withQueryString();
        $donorIds = (clone $query)->pluck('id');

        return view('find-donor', [
            'donors' => $donors,
            'filters' => $request->only(['group', 'division', 'district', 'upazila', 'available']),
        ]);
    }

    public function create()
    {
        $donor = Auth::user()?->donor;

        return view('become-donor', ['donor' => $donor]);
    }

    public function store(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('become-donor')->with('error', 'প্রথমে ফোন নম্বর যাচাই করুন।');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'blood_group' => ['required', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'age' => ['nullable', 'integer', 'min:18', 'max:65'],
            'gender' => ['nullable', 'string', 'max:20'],
            'division' => ['required', 'string'],
            'district' => ['required', 'string'],
            'upazila' => ['nullable', 'string'],
            'area' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:500'],
            'last_donation_date' => ['nullable', 'date', 'before:today'],
            'availability' => ['nullable', 'in:available,unavailable'],
        ]);

        $donor = Auth::user()->donor ?? new Donor(['user_id' => Auth::id()]);
        $donor->fill($validated);
        $donor->phone = Auth::user()->phone;
        $donor->user_id = Auth::id();
        $donor->is_available = $request->input('availability', 'available') === 'available';

        // Re-submitting an approved profile keeps the approved status only when
        // nothing significant changed; otherwise it goes back to moderation.
        if ($donor->status === 'rejected') {
            $donor->status = 'pending';
        } elseif (! $donor->exists) {
            $donor->status = 'pending';
        }

        $donor->save();

        return redirect()->route('find-donor')->with('success', 'ধন্যবাদ! আপনার রক্তদাতা প্রোফাইল জমা হয়েছে। অনুমোদনের পর তালিকায় দেখা যাবে।');
    }
}
