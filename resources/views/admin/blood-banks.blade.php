@extends('admin.layouts.admin')
@section('title', 'Blood Banks')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Blood Banks & Organizations</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.blood-banks.create') }}" class="btn btn-primary">
                                    + Add blood bank
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table card-table table-vh-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bloodBanks as $bank)
                        <tr>
                            <td>{{ $bank->name }}</td>
                            <td>{{ $bank->phone ?? '—' }}</td>
                            <td>{{ Str::limit($bank->address, 40) }}</td>
                            <td>{{ $bank->district ?? '—' }}</td>
                            <td>
                                @if ($bank->is_active)
                                    <span class="badge bg-green-lt">Visible</span>
                                @else
                                    <span class="badge bg-muted">Hidden</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-list flex-nowrap">
                                    <a href="{{ route('admin.blood-banks.edit', $bank) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                                    <form method="POST" action="{{ route('admin.blood-banks.destroy', $bank) }}" onsubmit="return confirm('Delete this blood bank?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-muted">No blood banks yet.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $bloodBanks->links() }}
        </div>
    </div>
@endsection
