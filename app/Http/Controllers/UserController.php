<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $users = User::with(['userType', 'role'])->paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $userTypes = UserType::all();
        $roles = Role::all();
        return view('users.create', compact('userTypes', 'roles'));
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|max:20',
            'role_id' => 'nullable|exists:roles,id',
            'user_type_id' => 'nullable|exists:user_types,id',
            'username' => 'nullable|string|max:255|unique:users',
            'password' => 'nullable|string|min:8|confirmed',
            'active_status' => 'boolean',
        ]);

        // Set password only if add_credentials is checked
        if ($request->has('add_credentials') && $request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Set can_login based on checkbox, defaulting to false if not set
        $validated['can_login'] = $request->has('allow_login') ? true : false;

        User::create($validated);

        return Redirect::route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified user.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        $userTypes = UserType::all();
        return view('users.edit', compact('user', 'roles', 'userTypes'));
    }

    /**
     * Update the specified user in the database.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number' => 'nullable|string|max:20',
            'role_id' => 'nullable|exists:roles,id',
            'user_type_id' => 'nullable|exists:user_types,id',
            'username' => ['nullable', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:8|confirmed',
            'active_status' => 'boolean',
        ]);

        // Hash and update password only if provided
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']); // Keep the original password if not updated
        }

        // Set can_login based on checkbox
        $validated['can_login'] = $request->has('allow_login') ? true : false;

        $user->update($validated);

        return Redirect::route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from the database.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('users.index')->with('success', 'User deleted successfully.');
    }

    /**
     * Search users for dropdown selection with AJAX.
     */
    public function search(Request $request)
    {
        $query = $request->get('q', '');

        // Query users based on name, username, email, or phone
        $users = User::where('full_name', 'like', "%{$query}%")
            ->orWhere('username', 'like', "%{$query}%")
            ->orWhere('email', 'like', "%{$query}%")
            ->orWhere('phone_number', 'like', "%{$query}%")
            ->limit(10) // Limit results for efficiency
            ->get(['id', 'first_name', 'last_name', 'username', 'full_name']); // Select only needed fields

        return response()->json($users);
    }
}
