<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all users who are NOT the current admin (optional)
        // $users = User::where('id', '!=', auth()->id())->get();

        // Change ->get() to ->paginate(10)
        // This tells Laravel to only grab 10 users at a time
        $users = User::where('id', '!=', auth()->id())->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        /**
         * Simple way repetitive
         */
//         $validated = $request->validate([
//                 'name'     => 'required|string|max:255',
//                 'email'    => 'required|email|unique:users,email',
//                 'password' => 'required|string|min:8|confirmed',
//                 'role'     => 'required|string',
//                 'active'   => 'boolean',
//         ]);
//
//         User::create([
//                 'name'     => $validated['name'],
//                 'email'    => $validated['email'],
//                 'password' => bcrypt($validated['password']),
//                 'role'     => $validated['role'],
//                 'active'   => $request->has('active') ? 1 : 0,
//             ]);
            /**
             * Professional standard way
             */

            User::create([
                ...$request->validated(),
                'password' => Hash::make($request->password),
                'active'   => $request->has('active') ? 1 : 0,
            ]);

            return redirect()->route('admin.users.index')
                             ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not needed for admin, show fields only in read only
        // Or
        return redirect()->route('admin.users.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            } else {
                unset($data['password']);
            }

            $data['active'] = $request->has('active') ? 1 : 0;

            $user->update($data);

            return redirect()->route('admin.users.index')
                                 ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')
                              ->with('success', 'User deleted successfully.');
    }

     /**
       * My functions.
     */
     public function scopeActive($query)
     {
         return $query->where('active', true);
     }
}
