@extends('admin.layouts.admin')
@section('title', 'Donors')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Donors</h2>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form method="GET" class="row g-2">
                <div class="col">
                    <input type="text" name="search" value="{{ $filters['search'] ?? '' }}" class="form-control" placeholder="Search name or phone...">
                </div>
                <div class="col-auto">
                    <select name="status" class="form-select">
                        <option value="">All statuses</option>
                        @foreach (['pending', 'approved', 'rejected'] as $status)
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Group</th>
                        <th>Location</th>
                        <th>Available</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($donors as $donor)
                        <tr>
                            <td><a href="{{ route('admin.donors.show', $donor) }}">{{ $donor->name }}</a></td>
                            <td>{{ $donor->phone }}</td>
                            <td><span class="badge bg-red-lt">{{ $donor->blood_group }}</span></td>
                            <td>{{ $donor->locationString() }}</td>
                            <td>
                                @if ($donor->is_available)
                                    <span class="badge bg-green-lt">Yes</span>
                                @else
                                    <span class="badge bg-muted">Paused</span>
                                @endif
                            </td>
                            <td>
                                @if ($donor->status === 'approved')
                                    <span class="badge bg-green-lt">Approved</span>
                                @elseif ($donor->status === 'pending')
                                    <span class="badge bg-orange-lt">Pending</span>
                                @else
                                    <span class="badge bg-red-lt">Rejected</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-list flex-nowrap">
                                    @if ($donor->status !== 'approved')
                                        <form method="POST" action="{{ route('admin.donors.status', $donor) }}" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-sm btn-outline-success">Approve</button>
                                        </form>
                                    @endif
                                    @if ($donor->status !== 'rejected')
                                        <form method="POST" action="{{ route('admin.donors.status', $donor) }}" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="btn btn-sm btn-outline-warning">Reject</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('admin.donors.show', $donor) }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    <form method="POST" action="{{ route('admin.donors.destroy', $donor) }}" class="d-inline" onsubmit="return confirm('Delete this donor permanently?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-muted">No donors found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $donors->links() }}
        </div>
    </div>
@endsection
