<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $users = User::latest()->paginate(10);
        return view('app.user.list', compact('users'));
    }

    public function create()
    {
        return view('app.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|email|unique:users,email',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt('admin');
        $user->save();

        return redirect()->route('user.index')->with('success', 'user created successfully');
    }

    public function edit(User $user)
    {
        return view('app.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users,username, ' . $user->id,
            'email' => 'required|string|email|unique:users,email, ' . $user->id,
        ]);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->update();

        return redirect()->route('user.index')->with('success', 'user updated successfully');
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'user deleted successfully');
    }
}
