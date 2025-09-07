<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;
use App\Models\Logo;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the experiences.
     */
    public function index()
    {
        $experiences = Experience::ordered()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new experience.
     */
    public function create()
    {
        $logos = Logo::where('is_active', true)->orderBy('position')->get();
        return view('admin.experiences.create', compact('logos'));
    }

    /**
     * Store a newly created experience in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'description' => 'nullable|string',
            'logo_class' => 'required|string|max:255',
            'logo_icon' => 'nullable|string|max:255',
            'logo_text' => 'nullable|string|max:10',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_clickable' => 'boolean',
            'target_logos' => 'nullable|array',
            'order_position' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except(['logo_image']);
        $data['is_clickable'] = $request->has('is_clickable');
        $data['is_active'] = $request->has('is_active');
        
        // Handle image upload
        if ($request->hasFile('logo_image')) {
            $data['logo_image'] = $request->file('logo_image')->store('experiences', 'public');
        }
        
        Experience::create($data);

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience created successfully!');
    }

    /**
     * Show the form for editing the specified experience.
     */
    public function edit(Experience $experience)
    {
        $logos = Logo::where('is_active', true)->orderBy('position')->get();
        return view('admin.experiences.edit', compact('experience', 'logos'));
    }

    /**
     * Update the specified experience in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'description' => 'nullable|string',
            'logo_class' => 'required|string|max:255',
            'logo_icon' => 'nullable|string|max:255',
            'logo_text' => 'nullable|string|max:10',
            'logo_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_clickable' => 'boolean',
            'target_logos' => 'nullable|array',
            'order_position' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except(['logo_image']);
        $data['is_clickable'] = $request->has('is_clickable');
        $data['is_active'] = $request->has('is_active');
        
        // Handle image upload
        if ($request->hasFile('logo_image')) {
            // Delete old image if exists
            if ($experience->logo_image && Storage::disk('public')->exists($experience->logo_image)) {
                Storage::disk('public')->delete($experience->logo_image);
            }
            $data['logo_image'] = $request->file('logo_image')->store('experiences', 'public');
        }
        
        $experience->update($data);

        return redirect()->route('admin.experiences.index')
            ->with('success', $experience->company_name . ', has been updated successfully!');
    }

    /**
     * Remove the specified experience from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index')
            ->with('success', 'Experience deleted successfully!');
    }

    /**
     * Update the positions of experiences.
     */
    public function updatePositions(Request $request)
    {
        $positions = $request->input('positions', []);
        
        foreach ($positions as $id => $position) {
            Experience::where('id', $id)->update(['order_position' => $position]);
        }
        
        return response()->json(['success' => true]);
    }
}