<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TwilioService
{
    public function isConfigured(): bool
    {
        return ! empty($this->sid()) && ! empty($this->token()) && ! empty($this->verifySid());
    }

    public function sid(): ?string
    {
        return Setting::get('twilio_sid') ?: config('services.twilio.sid');
    }

    public function token(): ?string
    {
        return Setting::get('twilio_token') ?: config('services.twilio.token');
    }

    public function verifySid(): ?string
    {
        return Setting::get('twilio_verify_sid') ?: config('services.twilio.verify_sid');
    }

    public function fromNumber(): ?string
    {
        return Setting::get('twilio_from_number') ?: config('services.twilio.from_number');
    }

    /**
     * Normalize a Bangladeshi phone number to E.164 (+8801XXXXXXXXX).
     */
    public static function normalizePhone(string $phone): ?string
    {
        $digits = preg_replace('/\D+/', '', $phone);

        if (preg_match('/^(?:880)?0?1[3-9]\d{8}$/', $digits, $m)) {
            return '+880'.substr($m[0], -10);
        }

        return null;
    }

    /**
     * Start a Twilio Verify verification for the given E.164 phone.
     */
    public function sendVerification(string $e164Phone): bool
    {
        if (! $this->isConfigured()) {
            return false;
        }

        try {
            $response = Http::withBasicAuth($this->sid(), $this->token())
                ->asForm()
                ->post("https://verify.twilio.com/v2/Services/{$this->verifySid()}/Verifications", [
                    'To' => $e164Phone,
                    'Channel' => 'sms',
                ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Twilio verification failed: '.$e->getMessage());

            return false;
        }
    }

    /**
     * Check the OTP for the given E.164 phone.
     */
    public function checkVerification(string $e164Phone, string $code): bool
    {
        if (! $this->isConfigured()) {
            return false;
        }

        try {
            $response = Http::withBasicAuth($this->sid(), $this->token())
                ->asForm()
                ->post("https://verify.twilio.com/v2/Services/{$this->verifySid()}/VerificationCheck", [
                    'To' => $e164Phone,
                    'Code' => $code,
                ]);

            return $response->successful()
                && data_get($response->json(), 'status') === 'approved';
        } catch (\Exception $e) {
            Log::error('Twilio verification check failed: '.$e->getMessage());

            return false;
        }
    }

    /**
     * Send a plain SMS via Twilio Messaging (used for the admin test button).
     */
    public function sendSms(string $e164Phone, string $message): bool
    {
        $from = $this->fromNumber();

        if (! $this->isConfigured() || empty($from)) {
            return false;
        }

        try {
            $response = Http::withBasicAuth($this->sid(), $this->token())
                ->asForm()
                ->post("https://api.twilio.com/2010-04-01/Accounts/{$this->sid()}/Messages.json", [
                    'To' => $e164Phone,
                    'From' => $from,
                    'Body' => $message,
                ]);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Twilio SMS failed: '.$e->getMessage());

            return false;
        }
    }
}
