<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('index',['users' =>$users]);
    }

   
    public function create()
    {
       return view('create');
    }

    
    public function store(Request $request)
    {
        
        // return redirect()->route('user.index')->with('success', 'User created successfully.');        
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->save();
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }

    
    public function show(string $id)
    {
        $user = User::find($id);
        return view('show',['user' =>$user]);
    }

   
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('edit',['user' =>$user]);
    }

    
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

    return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    public function destroy(string $id)
    {
     
        $user = User::findOrFail($id);
        $user->delete();
    return redirect()->route('user.index')->with('success', 'User deleted successfully');}
}
