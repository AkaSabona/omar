<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos = Logo::orderBy('position')->get();
        return view('admin.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:logos,title',
            'description' => 'required|string',
            'start_date' => 'nullable|string|max:255',
            'end_date' => 'nullable|string|max:255',
            'read_more' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required|integer|min:1',
            'is_active' => 'boolean',
            'popup_title' => 'nullable|string|max:255',
            'popup_description' => 'nullable|string',

        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('logos', 'public');
            $validated['image'] = $imagePath;
        }

        // Set default for is_active if not provided
        $validated['is_active'] = $request->has('is_active') ? true : false;



        Logo::create($validated);

        return redirect()->route('admin.logos.index')
            ->with('success', 'Logo created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logo $logo)
    {
        return view('admin.logos.show', compact('logo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logo $logo)
    {
        return view('admin.logos.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logo $logo)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('logos')->ignore($logo->id)],
            'description' => 'required|string',
            'start_date' => 'nullable|string|max:255',
            'end_date' => 'nullable|string|max:255',
            'read_more' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required|integer|min:1',
            'is_active' => 'boolean',
            'popup_title' => 'nullable|string|max:255',
            'popup_description' => 'nullable|string',

        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($logo->image && Storage::disk('public')->exists($logo->image)) {
                Storage::disk('public')->delete($logo->image);
            }
            
            $imagePath = $request->file('image')->store('logos', 'public');
            $validated['image'] = $imagePath;
        }

        // Set default for is_active if not provided
        $validated['is_active'] = $request->has('is_active') ? true : false;



        $logo->update($validated);

        return redirect()->route('admin.logos.edit', $logo)
            ->with('success', 'Logo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logo $logo)
    {
        // Delete image if exists
        if ($logo->image && Storage::disk('public')->exists($logo->image)) {
            Storage::disk('public')->delete($logo->image);
        }

        $logo->delete();

        return redirect()->route('admin.logos.index')
            ->with('success', 'Logo deleted successfully!');
    }

    /**
     * Update logo positions
     */
    public function updatePositions(Request $request)
    {
        $positions = $request->input('positions', []);
        
        foreach ($positions as $position => $id) {
            Logo::where('id', $id)->update(['position' => $position + 1]);
        }
        
        return response()->json(['success' => true]);
    }

    /**
     * Upload image for TinyMCE editor
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:25600'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('tinymce-uploads', $filename, 'public');
            
            return response()->json([
                'location' => asset('storage/' . $path)
            ]);
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }

}