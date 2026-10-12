@extends('admin.layouts.admin')
@section('title', $bloodBank->exists ? 'Edit Blood Bank' : 'Add Blood Bank')

@section('content')
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">{{ $bloodBank->exists ? 'Edit: ' . $bloodBank->name : 'Add Blood Bank' }}</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('admin.blood-banks.index') }}" class="btn">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ $bloodBank->exists ? route('admin.blood-banks.update', $bloodBank) : route('admin.blood-banks.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name *</label>
                            <input type="text" name="name" value="{{ old('name', $bloodBank->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $bloodBank->phone) }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" value="{{ old('address', $bloodBank->address) }}" class="form-control">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Division</label>
                                <select name="division" class="form-select">
                                    <option value="">—</option>
                                    @foreach (\App\Models\Division::orderBy('name')->get() as $division)
                                        <option value="{{ $division->name }}" {{ old('division', $bloodBank->division) === $division->name ? 'selected' : '' }}>{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">District</label>
                                <input type="text" name="district" value="{{ old('district', $bloodBank->district) }}" class="form-control">
                            </div>
                        </div>
                        <label class="form-check mb-3">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $bloodBank->is_active ? 1 : 1) ? 'checked' : '' }} class="form-check-input">
                            <span class="form-check-label">Visible on the website</span>
                        </label>
                        <button type="submit" class="btn btn-primary">{{ $bloodBank->exists ? 'Save changes' : 'Create blood bank' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
