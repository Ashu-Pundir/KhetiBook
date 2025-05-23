<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Crop;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function view()
    {
        Log::info();
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
        Flasher::addSuccess('Registration Successfull');
        return redirect()->route('login');  
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
            Flasher::addSuccess('User logged in Successfully');
            return redirect()->route('crop.dashboard');
        }
        Flasher::addError('Invalid phone number or password');
        return redirect()->back()->withErrors($credentials)->withInput()->with('form', 'login');;
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Flasher::addSuccess('Logged out successfully');
        return redirect()->route('login');
    }


}


