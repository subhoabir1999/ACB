<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Headline;

class HeadlineController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $headlines = Headline::all();
        return view('headlines.index', compact('headlines'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('headlines.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'title_mr' => 'required',
            'title_hi' => 'required',
            'priority' => 'required|integer',
            'link' => 'nullable|url',
            'file' => 'nullable|file',
            'user_id' => 'required|exists:users,id',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('uploads', 'public');
            $validatedData['file'] = $filePath;
        }

        Headline::create($validatedData);

        return redirect()->route('headlines.index')
            ->with('success', 'Headline created successfully.');
    }

    // Display the specified resource.
    public function show(Headline $headline)
    {
        return view('headlines.show', compact('headline'));
    }

    // Show the form for editing the specified resource.
    public function edit(Headline $headline)
    {
        return view('headlines.edit', compact('headline'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Headline $headline)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'title_mr' => 'required',
            'title_hi' => 'required',
            'priority' => 'required|integer',
            'link' => 'nullable|url',
            'file' => 'nullable|file',
            'user_id' => 'required|exists:users,id',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('uploads', 'public');
            $validatedData['file'] = $filePath;
        }

        $headline->update($validatedData);

        return redirect()->route('headlines.index')
            ->with('success', 'Headline updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Headline $headline)
    {
        // Delete file if exists
        if ($headline->file) {
            Storage::disk('public')->delete($headline->file);
        }

        $headline->delete();

        return redirect()->route('headlines.index')
            ->with('success', 'Headline deleted successfully.');
    }
}
