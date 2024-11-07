<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{

    public function index(Request $request)
    {
        $query = UserType::query();

        $resourceName = 'User Types';
        // If search query is present, filter results
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('description', 'like', '%' . $request->input('search') . '%');
        }

        $userTypes = $query->paginate(10);

        return view('user_types.index', compact('userTypes','resourceName'));
    }

    public function create()
    {
        $resourceName = 'User Types';
        return view('user_types.create', compact('resourceName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:user_types|max:255',
            'description' => 'nullable|max:500',
        ]);

        UserType::create($request->only('name', 'description'));

        return redirect()->route('user_types.index')->with('success', 'User Type created successfully.');
    }

    public function show(UserType $userType)
    {
        return view('user_types.show', compact('userType'));
    }

    public function edit(UserType $userType)
    {
        $resourceName = 'User Types';
        return view('user_types.edit', compact('userType', 'resourceName'));
    }

    public function update(Request $request, UserType $userType)
    {
        $request->validate([
            'name' => 'required|unique:user_types,name,' . $userType->id . '|max:255',
            'description' => 'nullable|max:500',
        ]);

        $userType->update($request->only('name', 'description'));

        return redirect()->route('user_types.index')->with('success', 'User Type updated successfully.');
    }

    public function destroy(UserType $userType)
    {
        $userType->delete();

        return redirect()->route('user_types.index')->with('success', 'User Type deleted successfully.');
    }
}
