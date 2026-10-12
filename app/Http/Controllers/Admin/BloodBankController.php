<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodBank;
use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    public function index()
    {
        return view('admin.blood-banks', [
            'bloodBanks' => BloodBank::orderBy('name')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.blood-banks-form', ['bloodBank' => new BloodBank()]);
    }

    public function store(Request $request)
    {
        BloodBank::create($this->validated($request));

        return redirect()->route('admin.blood-banks.index')->with('success', 'Blood bank created.');
    }

    public function edit(BloodBank $bloodBank)
    {
        return view('admin.blood-banks-form', ['bloodBank' => $bloodBank]);
    }

    public function update(Request $request, BloodBank $bloodBank)
    {
        $bloodBank->update($this->validated($request));

        return redirect()->route('admin.blood-banks.index')->with('success', 'Blood bank updated.');
    }

    public function destroy(BloodBank $bloodBank)
    {
        $bloodBank->delete();

        return back()->with('success', 'Blood bank deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'division' => ['nullable', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }
}
