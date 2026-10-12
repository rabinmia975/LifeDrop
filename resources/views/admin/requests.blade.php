@extends('admin.layouts.admin')
@section('title', 'Blood Requests')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Blood Requests</h2>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form method="GET" class="row g-2">
                <div class="col-auto">
                    <select name="status" class="form-select">
                        <option value="">All statuses</option>
                        @foreach (['active', 'found', 'closed'] as $status)
                            <option value="{{ $status }}" {{ ($filters['status'] ?? '') === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <select name="group" class="form-select">
                        <option value="">All groups</option>
                        @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $group)
                            <option value="{{ $group }}" {{ ($filters['group'] ?? '') === $group ? 'selected' : '' }}>{{ $group }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vh-sm">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Group</th>
                        <th>Bags</th>
                        <th>Hospital</th>
                        <th>Location</th>
                        <th>Needed by</th>
                        <th>Contact</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{ $request->patient_name ?: 'Anonymous' }}</td>
                            <td><span class="badge bg-red-lt">{{ $request->blood_group }}</span></td>
                            <td>{{ $request->bags_needed }}</td>
                            <td>{{ Str::limit($request->hospital_name, 25) }}</td>
                            <td>{{ $request->locationString() }}</td>
                            <td>{{ $request->needed_by->format('d M Y') }}</td>
                            <td>{{ $request->contact_phone }}</td>
                            <td>
                                <span class="badge {{ $request->status === 'active' ? 'bg-green-lt' : ($request->status === 'found' ? 'bg-blue-lt' : 'bg-muted') }}">{{ ucfirst($request->status) }}</span>
                            </td>
                            <td class="text-end">
                                <div class="btn-list flex-nowrap">
                                    <form method="POST" action="{{ route('admin.requests.status', $request) }}" class="d-flex gap-1">
                                        @csrf
                                        <select name="status" class="form-select form-select-sm w-auto">
                                            @foreach (['active', 'found', 'closed'] as $status)
                                                <option value="{{ $status }}" {{ $request->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-outline-primary">Set</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.requests.destroy', $request) }}" onsubmit="return confirm('Delete this request?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="9" class="text-muted">No requests found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $requests->links() }}
        </div>
    </div>
@endsection
