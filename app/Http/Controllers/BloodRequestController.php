<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BloodRequestController extends Controller
{
    public function create()
    {
        return view('post-request');
    }

    public function store(Request $request)
    {
        if (! Auth::check()) {
            return redirect()->route('post-request')->with('error', 'পোস্ট করতে ফোন নম্বর যাচাই করুন।');
        }

        $validated = $request->validate([
            'patient_name' => ['nullable', 'string', 'max:255'],
            'patient_age' => ['nullable', 'integer', 'min:0', 'max:120'],
            'patient_gender' => ['nullable', 'string', 'max:20'],
            'blood_group' => ['required', 'in:A+,A-,B+,B-,AB+,AB-,O+,O-'],
            'bags_needed' => ['required', 'integer', 'min:1', 'max:20'],
            'needed_by' => ['required', 'date', 'after_or_equal:today'],
            'urgency' => ['required', 'in:জরুরি,সাধারণ,পূর্বনির্ধারিত'],
            'hospital_name' => ['required', 'string', 'max:255'],
            'hospital_address' => ['nullable', 'string', 'max:500'],
            'division' => ['required', 'string'],
            'district' => ['required', 'string'],
            'upazila' => ['nullable', 'string'],
            'description' => ['nullable', 'string', 'max:2000'],
        ]);

        $validated['user_id'] = Auth::id();
        $validated['contact_phone'] = Auth::user()->phone;
        $validated['status'] = 'active';

        BloodRequest::create($validated);

        return redirect()->route('my-posts')->with('success', 'আপনার রক্তের অনুরোধ পোস্ট হয়েছে।');
    }

    public function updateStatus(Request $request, BloodRequest $bloodRequest)
    {
        abort_unless($bloodRequest->user_id === Auth::id(), 403);

        $validated = $request->validate(['status' => ['required', 'in:active,found,closed']]);

        $bloodRequest->update($validated);

        return back()->with('success', 'পোস্টের অবস্থা আপডেট হয়েছে।');
    }

    public function destroy(BloodRequest $bloodRequest)
    {
        abort_unless($bloodRequest->user_id === Auth::id(), 403);

        $bloodRequest->delete();

        return back()->with('success', 'পোস্টটি মুছে ফেলা হয়েছে।');
    }
}
