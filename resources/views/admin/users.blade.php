@extends('admin.layouts.admin')
@section('title', 'Users')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Users</h2>
                <div class="text-muted">Phone-verified accounts</div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <form method="GET" class="row g-2">
                <div class="col">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search name, phone or email...">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table card-table table-vh-sm">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Verified</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone ?? '—' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge {{ $user->isAdmin() ? 'bg-purple-lt' : 'bg-blue-lt' }}">{{ ucfirst($user->role) }}</span>
                            </td>
                            <td>
                                @if ($user->is_phone_verified)
                                    <span class="badge bg-green-lt">Yes</span>
                                @else
                                    <span class="badge bg-muted">No</span>
                                @endif
                            </td>
                            <td>
                                @if ($user->is_active)
                                    <span class="badge bg-green-lt">Active</span>
                                @else
                                    <span class="badge bg-red-lt">Blocked</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="btn-list flex-nowrap">
                                    @unless ($user->isAdmin())
                                        <form method="POST" action="{{ route('admin.users.toggle-active', $user) }}" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-sm {{ $user->is_active ? 'btn-outline-warning' : 'btn-outline-success' }}">
                                                {{ $user->is_active ? 'Block' : 'Unblock' }}
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="d-inline" onsubmit="return confirm('Delete this user? Their posts and donor profile remain but get unlinked.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    @endunless
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-muted">No users found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
@endsection
