<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::latest();

        if ($request->filled('search')) {
            $term = '%'.$request->input('search').'%';
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', $term)
                  ->orWhere('phone', 'like', $term)
                  ->orWhere('email', 'like', $term);
            });
        }

        return view('admin.users', [
            'users' => $query->paginate(15)->withQueryString(),
        ]);
    }

    public function toggleActive(User $user)
    {
        if ($user->isAdmin() && $user->is_active) {
            return back()->with('error', 'Cannot deactivate an admin.');
        }

        $user->update(['is_active' => ! $user->is_active]);

        return back()->with('success', 'User '.($user->is_active ? 'activated' : 'deactivated').'.');
    }

    public function destroy(User $user)
    {
        if ($user->isAdmin()) {
            return back()->with('error', 'Cannot delete an admin.');
        }

        $user->delete();

        return back()->with('success', 'User deleted.');
    }
}
