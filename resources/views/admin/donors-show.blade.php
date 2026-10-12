@extends('admin.layouts.admin')
@section('title', 'Donor Details')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $donor->name }}</h2>
                <div class="text-muted">{{ $donor->blood_group }} donor — {{ $donor->locationString() }}</div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.donors.index') }}" class="btn">Back to list</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Profile</h3></div>
                <div class="card-body">
                    <div class="datagrid">
                        <div class="datagrid-item"><div class="datagrid-title">Phone</div><div class="datagrid-content">{{ $donor->phone }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Age</div><div class="datagrid-content">{{ $donor->age ?? '—' }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Gender</div><div class="datagrid-content">{{ $donor->gender ?? '—' }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Division</div><div class="datagrid-content">{{ $donor->division }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">District</div><div class="datagrid-content">{{ $donor->district }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Upazila</div><div class="datagrid-content">{{ $donor->upazila ?? '—' }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Address</div><div class="datagrid-content">{{ $donor->address ?? '—' }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Last donation</div><div class="datagrid-content">{{ $donor->last_donation_date?->format('d M Y') ?? 'Never (on record)' }}</div></div>
                        <div class="datagrid-item"><div class="datagrid-title">Eligible now</div>
                            <div class="datagrid-content">
                                @if ($donor->isEligible())
                                    <span class="badge bg-green-lt">Yes — past 90-day cooldown</span>
                                @else
                                    <span class="badge bg-orange-lt">No (paused or within 90 days)</span>
                                @endif
                            </div>
                        </div>
                        <div class="datagrid-item"><div class="datagrid-title">Account</div>
                            <div class="datagrid-content">
                                @if ($donor->user)
                                    {{ $donor->user->phone }} {{ $donor->user->is_phone_verified ? '(verified)' : '(unverified)' }}
                                @else
                                    <span class="text-muted">No linked user (seeded/imported)</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-list">
                        @if ($donor->status !== 'approved')
                            <form method="POST" action="{{ route('admin.donors.status', $donor) }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="approved">
                                <button type="submit" class="btn btn-success">Approve donor</button>
                            </form>
                        @endif
                        @if ($donor->status !== 'rejected')
                            <form method="POST" action="{{ route('admin.donors.status', $donor) }}" class="d-inline">
                                @csrf
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-warning">Reject donor</button>
                            </form>
                        @endif
                        <form method="POST" action="{{ route('admin.donors.availability', $donor) }}" class="d-inline">
                            @csrf
                            <input type="hidden" name="is_available" value="{{ $donor->is_available ? 0 : 1 }}">
                            <button type="submit" class="btn {{ $donor->is_available ? 'btn-outline-secondary' : 'btn-outline-success' }}">
                                {{ $donor->is_available ? 'Mark unavailable' : 'Mark available' }}
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.donors.destroy', $donor) }}" class="d-inline" onsubmit="return confirm('Delete this donor permanently?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Record a donation</h3></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.donors.donations', $donor) }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Donation date</label>
                            <input type="date" name="donated_at" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bags</label>
                            <input type="number" name="bag_count" value="1" min="1" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Note (optional)</label>
                            <input type="text" name="note" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Save donation</button>
                    </form>
                    <p class="text-muted small mt-2">Saving a donation updates the last donation date and total count automatically.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h3 class="card-title">Donation history ({{ $donor->donations->count() }})</h3></div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse ($donor->donations->sortByDesc('donated_at') as $donation)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="fw-bold">{{ $donation->donated_at->format('d M Y') }} — {{ $donation->bag_count }} bag(s)</div>
                                    @if ($donation->note)
                                        <div class="text-muted small">{{ $donation->note }}</div>
                                    @endif
                                </div>
                                <span class="badge bg-red-lt">{{ $donor->blood_group }}</span>
                            </div>
                        @empty
                            <div class="list-group-item text-muted">No donations recorded yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
