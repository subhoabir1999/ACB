<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_mr' => 'required|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'priority' => 'required|integer',
        ]);

        $slider = new Slider();

        $slider->title = $request->input('title');
        $slider->title_mr = $request->input('title_mr');
        $slider->title_hi = $request->input('title_hi');
        $slider->priority = $request->input('priority');
        $slider->link = $request->input('link');
        $slider->user_id = \Auth::user()->id;

    
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $photoName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->store('gallery', 'public');
        $slider->photo = $filePath;
    }

        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider created successfully');
    }

    public function show(Slider $slider)
    {
        return view('sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'title_mr' => 'nullable|string|max:255',
            'title_hi' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'priority' => 'required|integer',
            'user_id' => 'required|exists:users,id'
        ]);

        $slider->title = $request->input('title');
        $slider->title_mr = $request->input('title_mr');
        $slider->title_hi = $request->input('title_hi');
        $slider->priority = $request->input('priority');
        $slider->link = $request->input('link');
        $slider->user_id = \Auth::user()->id;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
            $filePath = $photo->store('gallery', 'public');
            $slider->photo = $filePath;
        }

        $slider->save();

        return redirect()->route('sliders.index')->with('success', 'Slider updated successfully');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('sliders.index')->with('success', 'Slider deleted successfully');
    }
}
