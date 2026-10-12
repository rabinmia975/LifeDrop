@extends('admin.layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Dashboard</h2>
                <div class="text-muted mt-1">LifeDrop overview at a glance</div>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.donors.index', ['status' => 'pending']) }}" class="btn btn-outline-danger">
                    {{ $stats['pendingDonors'] }} donor(s) awaiting approval
                </a>
            </div>
        </div>
    </div>

    <div class="row row-deck row-cards mb-4">
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Approved Donors</div>
                    <div class="h1 mb-0 mt-2">{{ $stats['approvedDonors'] }}</div>
                    <div class="text-muted">{{ $stats['donors'] }} total (incl. pending/rejected)</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Active Requests</div>
                    <div class="h1 mb-0 mt-2">{{ $stats['activeRequests'] }}</div>
                    <div class="text-muted">{{ $stats['foundRequests'] }} marked as found</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Registered Users</div>
                    <div class="h1 mb-0 mt-2">{{ $stats['users'] }}</div>
                    <div class="text-muted">phone-verified accounts</div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="subheader">Recorded Donations</div>
                    <div class="h1 mb-0 mt-2">{{ $stats['donations'] }}</div>
                    <div class="text-muted">{{ $stats['bloodBanks'] }} blood banks listed</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-deck row-cards">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Blood Requests</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.requests.index') }}" class="btn btn-sm">View all</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-vh-sm">
                        <thead>
                            <tr>
                                <th>Patient</th>
                                <th>Group</th>
                                <th>Bags</th>
                                <th>Hospital</th>
                                <th>Needed by</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentRequests as $request)
                                <tr>
                                    <td>{{ $request->patient_name ?: 'Anonymous' }}</td>
                                    <td><span class="badge bg-red-lt">{{ $request->blood_group }}</span></td>
                                    <td>{{ $request->bags_needed }}</td>
                                    <td>{{ Str::limit($request->hospital_name, 30) }}</td>
                                    <td>{{ $request->needed_by->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge {{ $request->status === 'active' ? 'bg-green-lt' : ($request->status === 'found' ? 'bg-blue-lt' : 'bg-muted') }}">
                                            {{ ucfirst($request->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-muted">No requests yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header"><h3 class="card-title">Donors by Blood Group (approved)</h3></div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @foreach ($bloodGroups as $group)
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge bg-red-lt">{{ $group }}</span>
                                <span class="text-muted">{{ $donorsByGroup[$group] ?? 0 }} donors</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pending Donor Approvals</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.donors.index', ['status' => 'pending']) }}" class="btn btn-sm">Manage</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse ($pendingDonorList as $donor)
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="fw-bold">{{ $donor->name }}</div>
                                        <div class="text-muted small">{{ $donor->blood_group }} — {{ $donor->district }}</div>
                                    </div>
                                    <a href="{{ route('admin.donors.show', $donor) }}" class="btn btn-sm btn-outline-primary">Review</a>
                                </div>
                            </div>
                        @empty
                            <div class="list-group-item text-muted">Nothing pending. All caught up!</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
