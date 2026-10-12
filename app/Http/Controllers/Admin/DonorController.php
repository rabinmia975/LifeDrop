<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index(Request $request)
    {
        $query = Donor::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->filled('group')) {
            $query->where('blood_group', $request->input('group'));
        }
        if ($request->filled('search')) {
            $term = '%'.$request->input('search').'%';
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', $term)->orWhere('phone', 'like', $term);
            });
        }

        return view('admin.donors', [
            'donors' => $query->paginate(15)->withQueryString(),
            'filters' => $request->only(['status', 'group', 'search']),
        ]);
    }

    public function show(Donor $donor)
    {
        return view('admin.donors-show', [
            'donor' => $donor->load('donations', 'user'),
        ]);
    }

    public function updateStatus(Request $request, Donor $donor)
    {
        $validated = $request->validate(['status' => ['required', 'in:pending,approved,rejected']]);

        $donor->update($validated);

        return back()->with('success', 'Donor status updated.');
    }

    public function updateAvailability(Request $request, Donor $donor)
    {
        $donor->update(['is_available' => $request->boolean('is_available')]);

        return back()->with('success', 'Donor availability updated.');
    }

    public function recordDonation(Request $request, Donor $donor)
    {
        $validated = $request->validate([
            'donated_at' => ['required', 'date', 'before_or_equal:today'],
            'bag_count' => ['required', 'integer', 'min:1'],
            'note' => ['nullable', 'string', 'max:1000'],
        ]);

        Donation::create([
            'donor_id' => $donor->id,
            'donated_at' => $validated['donated_at'],
            'bag_count' => $validated['bag_count'],
            'note' => $validated['note'] ?? null,
        ]);

        $donor->update([
            'last_donation_date' => $validated['donated_at'],
            'total_donations' => $donor->total_donations + $validated['bag_count'],
        ]);

        return back()->with('success', 'Donation recorded.');
    }

    public function destroy(Donor $donor)
    {
        $donor->delete();

        return redirect()->route('admin.donors.index')->with('success', 'Donor deleted.');
    }
}
