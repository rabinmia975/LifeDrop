<?php

namespace App\Http\Controllers;

use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{
    public function __construct(private OtpService $otp)
    {
    }

    public function sendOtp(Request $request)
    {
        $validated = $request->validate(['phone' => ['required', 'string', 'regex:/^01[3-9]\d{8}$/']]);

        $result = $this->otp->sendOtp($validated['phone']);

        if (! $result['ok']) {
            return response()->json([
                'ok' => false,
                'message' => $result['error'] === 'invalid_phone'
                    ? 'সঠিক ফোন নম্বর দিন (01XXXXXXXXX)'
                    : 'SMS পাঠানো যায়নি, কিছুক্ষণ পর আবার চেষ্টা করুন।',
            ]);
        }

        return response()->json([
            'ok' => true,
            'dev_code' => $result['dev_code'] ?? null,
            'dev_mode' => empty($result['dev_code']) ? false : true,
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $validated = $request->validate([
            'phone' => ['required', 'string', 'regex:/^01[3-9]\d{8}$/'],
            'otp' => ['required', 'digits:4'],
        ]);

        if (! $this->otp->verifyOtp($validated['phone'], $validated['otp'])) {
            return response()->json(['ok' => false, 'message' => 'কোডটি সঠিক নয় বা মেয়াদ শেষ হয়েছে।']);
        }

        $user = $this->otp->loginUser($validated['phone']);
        Auth::login($user, true);

        return response()->json(['ok' => true]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
