<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\TwilioService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit(TwilioService $twilio)
    {
        return view('admin.settings', [
            'settings' => [
                'twilio_sid' => Setting::get('twilio_sid', config('services.twilio.sid')),
                'twilio_token' => Setting::get('twilio_token', config('services.twilio.token')),
                'twilio_verify_sid' => Setting::get('twilio_verify_sid', config('services.twilio.verify_sid')),
                'twilio_from_number' => Setting::get('twilio_from_number', config('services.twilio.from_number')),
            ],
            'twilioConfigured' => $twilio->isConfigured(),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'twilio_sid' => ['nullable', 'string', 'max:100'],
            'twilio_token' => ['nullable', 'string', 'max:200'],
            'twilio_verify_sid' => ['nullable', 'string', 'max:100'],
            'twilio_from_number' => ['nullable', 'string', 'max:30'],
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return back()->with('success', 'Settings saved. Twilio is now '.(app(TwilioService::class)->isConfigured() ? 'ACTIVE' : 'INACTIVE (dev mode)').'.');
    }

    public function testSms(Request $request, TwilioService $twilio)
    {
        $validated = $request->validate(['phone' => ['required', 'string']]);

        $e164 = TwilioService::normalizePhone($validated['phone']);

        if (! $e164) {
            return back()->with('error', 'Invalid Bangladeshi phone number.');
        }

        if (! $twilio->isConfigured()) {
            return back()->with('error', 'Twilio is not configured yet. Save your credentials first.');
        }

        $ok = $twilio->sendSms($e164, 'LifeDrop: This is a test SMS from your admin panel.');

        return back()->with($ok ? 'success' : 'error', $ok
            ? 'Test SMS sent to '.$e164.'.'
            : 'Test SMS failed — check your Twilio credentials (SID, token and From number).');
    }
}
