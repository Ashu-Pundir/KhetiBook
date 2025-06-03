<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\User;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin-login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
        'uphone' => 'required|digits:10',
        'upassword' => 'required',
    ]);
        
    // Find user by phone number
    $user = User::where('phone_number', $credentials['uphone'])->first();   

    $mobile_number = 1122334466;

    if (($user->phone_number == $mobile_number) && Hash::check($credentials['upassword'], $user->password)) {
        Auth::login($user);
        $request->session()->regenerate();
        Flasher::addSuccess('Admin logged in Successfully');
        return redirect()->route('admin.dashboard');
    }

    Flasher::addError('Invalid phone number or password');
    return redirect()->route('admin.login');
    }

    public function show(){
        $users = User::where('phone_number', '!=', '1122334466')->get();

        return view('admin.admin-db', compact('users'));    
    }


    public function viewUser($id){
        $user = User::where('id', $id)->first();
        $crop = Crop::where('user_id', $id)->get();

        return view('admin.user-view', compact(['user', 'crop']));
    }


    public function deleteUser($id){

        $user = User::findorFail($id);
        $user->delete();
        Flasher::addDeleted('User deleted succesfully');
        return redirect()->back();
    }

    public function allcrops(){
        $crops = Crop::all();

        return view('admin.allcrops', compact('crops'));
    }

}


