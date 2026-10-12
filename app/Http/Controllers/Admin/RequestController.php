<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        $query = BloodRequest::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        if ($request->filled('group')) {
            $query->where('blood_group', $request->input('group'));
        }

        return view('admin.requests', [
            'requests' => $query->paginate(15)->withQueryString(),
            'filters' => $request->only(['status', 'group']),
        ]);
    }

    public function updateStatus(Request $request, BloodRequest $bloodRequest)
    {
        $validated = $request->validate(['status' => ['required', 'in:active,found,closed']]);

        $bloodRequest->update($validated);

        return back()->with('success', 'Request status updated.');
    }

    public function destroy(BloodRequest $bloodRequest)
    {
        $bloodRequest->delete();

        return back()->with('success', 'Request deleted.');
    }
}
