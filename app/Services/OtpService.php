<?php

namespace App\Services;

use App\Models\OtpCode;
use App\Models\User;

class OtpService
{
    public function __construct(private TwilioService $twilio)
    {
    }

    /**
     * Generate and dispatch an OTP for the given local (01XXXXXXXXX) phone.
     * dev_code is only set when Twilio is not configured (dev mode).
     */
    public function sendOtp(string $localPhone): array
    {
        $e164 = TwilioService::normalizePhone($localPhone);

        if (! $e164) {
            return ['ok' => false, 'error' => 'invalid_phone'];
        }

        if ($this->twilio->isConfigured()) {
            $ok = $this->twilio->sendVerification($e164);

            return ['ok' => $ok, 'error' => $ok ? null : 'twilio_failed'];
        }

        // Dev fallback: store a 4-digit code in the DB and surface it in the
        // UI so the flow stays testable until Twilio credentials are added.
        $code = (string) random_int(1000, 9999);

        OtpCode::query()
            ->where('phone', $e164)
            ->whereNull('consumed_at')
            ->update(['consumed_at' => now()]);

        OtpCode::create([
            'phone' => $e164,
            'code_hash' => hash('sha256', $code),
            'expires_at' => now()->addMinutes(10),
        ]);

        return ['ok' => true, 'dev_code' => $code];
    }

    /**
     * Verify an OTP via Twilio Verify, or against the locally stored code.
     */
    public function verifyOtp(string $localPhone, string $code): bool
    {
        $e164 = TwilioService::normalizePhone($localPhone);

        if (! $e164) {
            return false;
        }

        if ($this->twilio->isConfigured()) {
            return $this->twilio->checkVerification($e164, $code);
        }

        $otp = OtpCode::query()
            ->where('phone', $e164)
            ->whereNull('consumed_at')
            ->where('expires_at', '>', now())
            ->orderByDesc('id')
            ->first();

        if (! $otp) {
            return false;
        }

        $otp->increment('attempts');

        if ($otp->attempts > 5) {
            $otp->update(['consumed_at' => now()]);

            return false;
        }

        if (hash_equals($otp->code_hash, hash('sha256', $code))) {
            $otp->update(['consumed_at' => now()]);

            return true;
        }

        return false;
    }

    /**
     * Find or create the user for a verified phone.
     */
    public function loginUser(string $localPhone): User
    {
        $e164 = TwilioService::normalizePhone($localPhone);

        $user = User::firstOrNew(['phone' => $e164]);
        $user->is_phone_verified = true;
        $user->is_active = true;

        if (! $user->exists && ! $user->email) {
            $user->email = 'user'.substr($e164, -10).'@lifedrop.local';
            $user->name = 'Donor '.substr($e164, -4);
        }

        $user->save();

        return $user;
    }
}
