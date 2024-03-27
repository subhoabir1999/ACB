<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dgmessage;
use Illuminate\Support\Facades\Storage;

class DgMessageController extends Controller
{
    public function edit()
    {
        // Assuming you have only one record, you can directly fetch it
        $dgMessage = Dgmessage::first();

        return view('dgmessages.index', compact('dgMessage'));
    }

    public function update(Request $request)
    {
        $dgMessage = Dgmessage::first();

    // Validate request data
    $validatedData = $request->validate([
        'name' => 'required|string',
        'name_mr' => 'required|string',
        'name_hi' => 'nullable|string',
        'post' => 'required|string',
        'post_mr' => 'required|string',
        'post_hi' => 'nullable|string',
        'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the file validation rules as needed
        'about' => 'required|string',
        'about_mr' => 'required|string',
        'about_hi' => 'nullable|string',
    ]);

    // Update fields
    $dgMessage->update([
        'name' => $validatedData['name'],
        'name_mr' => $validatedData['name_mr'],
        'name_hi' => $validatedData['name_hi'],
        'post' => $validatedData['post'],
        'post_mr' => $validatedData['post_mr'],
        'post_hi' => $validatedData['post_hi'],
        'about' => $validatedData['about'],
        'about_mr' => $validatedData['about_mr'],
        'about_hi' => $validatedData['about_hi'],
    ]);

    // Handle photo upload if provided
    if ($request->hasFile('photo')) {
        // Ensure the directory exists, create it if not
        $folder = 'dgmessage_photos';
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }
        // Delete previous photo if exists
        if ($dgMessage->photo) {
            Storage::delete($dgMessage->photo);
        }

        // Upload new photo
        $photoPath =$request->file('photo')->store('dgmessage_photos', 'public');
        $dgMessage->photo = $photoPath;
        $dgMessage->save();
    }

        return redirect()->route('dgmessages')->with('message', 'DG Message updated successfully');
    }
}
