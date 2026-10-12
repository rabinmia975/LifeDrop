@extends('admin.layouts.admin')
@section('title', 'Settings')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Settings</h2>
            </div>
        </div>
    </div>

    <div class="alert {{ $twilioConfigured ? 'alert-success' : 'alert-warning' }}" role="alert">
        <div>
            <strong>Twilio status: {{ $twilioConfigured ? 'ACTIVE — OTP SMS is live' : 'NOT CONFIGURED — dev mode' }}</strong><br>
            @if ($twilioConfigured)
                New phone verifications are sent as real SMS through Twilio Verify.
            @else
                Until credentials are saved, the site shows the 4-digit OTP on screen instead of sending an SMS. Add your credentials below to switch to real SMS.
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Twilio Configuration</h3>
                    <div class="card-subtitle">Used for phone number verification (OTP SMS)</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.update') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Account SID</label>
                            <input type="text" name="twilio_sid" value="{{ $settings['twilio_sid'] }}" class="form-control" placeholder="ACxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx" autocomplete="off">
                            <div class="text-muted small mt-1">From your Twilio Console dashboard.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Auth Token</label>
                            <input type="password" name="twilio_token" value="{{ $settings['twilio_token'] }}" class="form-control" placeholder="••••••••••••••••" autocomplete="new-password">
                            <div class="text-muted small mt-1">Stored in the database (settings table). Leave blank to keep the existing value from .env.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Verify Service SID</label>
                            <input type="text" name="twilio_verify_sid" value="{{ $settings['twilio_verify_sid'] }}" class="form-control" placeholder="VAxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">
                            <div class="text-muted small mt-1">
                                In Twilio: Verify → Services → create a service (or use the default one) → copy its SID.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">From number (for test SMS)</label>
                            <input type="text" name="twilio_from_number" value="{{ $settings['twilio_from_number'] }}" class="form-control" placeholder="+1xxxxxxxxxx or your Twilio number">
                        </div>
                        <button type="submit" class="btn btn-primary">Save settings</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Send test SMS</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.test-sms') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Bangladeshi phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="01XXXXXXXXX" required>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100">Send test SMS</button>
                    </form>
                    <p class="text-muted small mt-3">
                        Works only after Twilio is configured and a From number is set. Check Twilio Console → Monitor → Logs if the SMS does not arrive.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3 class="card-title">Setup checklist</h3></div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">1. Create a Twilio account and get SID + Auth Token.</div>
                        <div class="list-group-item">2. Verify your own phone in Twilio (trial accounts need this to send).</div>
                        <div class="list-group-item">3. Verify → Services → create a service, copy the SID.</div>
                        <div class="list-group-item">4. Save all values here — the site switches to real SMS instantly.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
