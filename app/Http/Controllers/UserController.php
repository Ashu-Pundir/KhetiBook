<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function view()
    {
        return view('crop.addcrop');
    }

    public function create(Request $request)
    {

        
        $validatedData = $request->validate([
            'uname' => 'required|string|max:255',
            'uphone' => 'required|digits:10',
            'uemail' => 'nullable|email|unique:users,email',
            'upassword' => 'required|min:6',
            'ucpassword' => 'required|same:upassword',
        ]);
        // Log::info('Registration data:', $request->all());
       
        $user = new User();
        $user->name = $request->uname;
        $user->phone_number = $request->uphone;
        $user->email = $request->uemail;
        $user->password = Hash::make($request->upassword);

        $user->save();

        return redirect()->route('login')->with('success', 'Registration Successfull');
    }


     public function login(Request $request)
    {
        Log::info($request);
        $credentials = $request->validate([
            'phone_number' => 'required|digits:10',
            'password' => 'required',
        ]);

        if (Auth::attempt(['phone_number' => $credentials['phone_number'], 'password' => $credentials['password']])) {
            $request->session()->regenerate(); // Prevent session fixation
            return redirect()->route('crop.dashboard')->with('success', 'Login successful');
        }

        return redirect()->route('login')->with('error', 'Invalid phone number or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }


}


