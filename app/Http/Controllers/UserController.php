<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.all',['users'=>User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create(array_merge($request->except(['_token','password']),['password'=>Hash::make($request->password)]));

        return back()->with('success','user successfully created');

    }

    /**
     * Display the specified resource.
     */
    public function passwrodForm()
    {
       return view('reset');
    }

    public function updatePasswrod(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = auth()->user();

        if (!Hash::check($request->input('old_password'), $user->password)) {
            // Old password doesn't match
            return redirect()->back()->withInput()->with('error', 'Old password is incorrect.');
        }
        $user->update(['password'=>Hash::make($request->input('password'))]);
        return redirect()->route('user.add.sanitize')->with('success', 'Password updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $user=User::find($id);
        return view('admin.user.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=User::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user->update(array_merge($request->except(['_token','password']),['password'=>Hash::make($request->password)]));

        return back()->with('success','user successfully updated');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success','user successfully deleted');
    }
}
