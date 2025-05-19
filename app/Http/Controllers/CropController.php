<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CropController extends Controller
{
    public function index()
    {
        $crops = Auth::user()->crops; // Fetch all crops for the authenticated user
        $crops = Crop::paginate(6);
        return view('crop.dashboard', compact('crops')); // Pass crops to the view
    }

    public function create(){
        return view("crop.addcrop");
    }

    public function store(Request $request){

            Log::info($request);
        $request->validate([
            'cropname'=> 'required|string|max:255',
            'cropweight'=> 'required|numeric',
            'cropprice'=> 'required|numeric',
            'cropcategory'=> 'required|string',
        ]);

        Crop::create([
                'crop_name'=> $request->cropname,
                'crop_category'=> $request->cropcategory,
                'crop_weight'=> $request->cropweight,
                'crop_price'=> $request->cropprice,
                'user_id' => Auth::id(),
        ]);

        return redirect()->route('crop.dashboard')->with('success', 'Cropadded successfully');
    }

    public function edit($id){
        $crop = Crop::findorFail($id);
        return view('crop.edit', compact('crop'));
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'cropname' => 'nullable|string',
        'cropcategory' => 'nullable|string',
        'cropweight' => 'nullable|numeric',
        'cropprice' => 'nullable|numeric',
    ]);

    $crop = Crop::findOrFail($id);

    $crop->update([
        'crop_name' => $request->cropname,
        'crop_category' => $request->cropcategory,
        'crop_weight' => $request->cropweight,
        'crop_price' => $request->cropprice,
    ]);

    return redirect()->route('crop.dashboard');
    // return redirect()->back()->with('success', 'Crop updated successfully');
}

public function destroy($id)
{
    $crop = Crop::findOrFail($id);
    $crop->delete();

    return redirect()->back()->with('success', 'Crop deleted successfully!');
}

}
