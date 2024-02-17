<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
    {

        return view('facebook');
    }


    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
    
            // Check if the user exists by Facebook ID
            $finduser = User::where('facebook_id', $user->id)->first();
    
            if ($finduser) {
                // If user exists, log them in
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                // If user does not exist, create a new user
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->facebook_id = $user->id;
    
                // Check if email is available, otherwise use a default email
                $newUser->email = $user->email ?? $user->id . '@facebook.com';
    
                // Set a dummy password (you might want to handle this differently)
                $newUser->password = bcrypt('123456dummy');
    
                // Save the new user
                $newUser->save();
    
                // Log in the new user
                Auth::login($newUser);
    
                return redirect()->intended('dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}
