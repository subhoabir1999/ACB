<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Headline;
use Illuminate\Support\Facades\Storage;

class HeadlineController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $headline = Headline::all();
        return view('headlines.index', compact('headline'));
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
            'priority' => 'nullable|integer',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:jpeg,png,gif,pdf,doc,docx|max:2048',
        ]);

    $headline = new Headline();
    $headline->title = $request->title;
    $headline->title_mr = $request->title_mr;
    $headline->title_hi = $request->title_hi;
    $headline->link = $request->link;
    if ($request->hasFile('file')) {
        $folder = 'headlines';
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }
    $headline->file = $request->file('file')->store('headlines', 'public');
    }
    // If priority is not provided, find the highest priority and increment by 1
    $headline->priority = $request->has('priority') ? $request->priority : (Headline::max('priority') + 1);

    $headline->save();
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
            'priority' => 'nullable|integer',
            'link' => 'nullable|url',
            'file' => 'nullable|file|mimes:jpeg,png,gif,pdf,doc,docx|max:2048',
        ]);

        $headline->title = $request->title;
        $headline->title_mr = $request->title_mr;
        $headline->title_hi = $request->title_hi;
        $headline->link = $request->link;

        // Remove old file if new file is provided
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::disk('public')->delete($headline->file);

            // Store new file
            $headline->file = $request->file('file')->store('headlines', 'public');
        }

        // If priority is not provided, find the highest priority and increment by 1
        $headline->priority = $request->has('priority') ? $request->priority : (Headline::max('priority') + 1);

        $headline->save();
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
