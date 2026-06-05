<?php

namespace App\Http\Controllers;

use App\Models\Arealocation;
use App\Models\Category;
use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {   
        $categories = Category::get();
        return view('frontend.home', compact('categories'));
    }

    public function becomeaNurse(){
        $categories = Category::orderBy('name')->get();
        $areas = Arealocation::orderBy('area_name')->get();
        return view('frontend.becomeaNurse', compact('categories', 'areas'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        $data = $request->validate([
            'name'                   => 'required|string|max:150',
            'phone'                  => 'required|string|unique:nurses,phone|max:20',
            'email'                  => 'nullable|email|max:150',
            'dob'                    => 'nullable|date',
            'gender'                 => 'nullable|in:Male,Female,Other',
            'about'                  => 'nullable|string|max:1000',
            'experience_years'       => 'required|integer|min:0|max:60',
            'price_per_day'          => 'nullable|numeric|min:0',
            'price_per_visit'        => 'nullable|numeric|min:0',
            'languages'              => 'nullable|array',
            'categories'             => 'required|array|min:1',
            'categories.*'           => 'exists:categories,id',
            'areas'                  => 'required|array|min:1',
            'areas.*'                => 'exists:arealocations,id',
            'address'                => 'nullable|string|max:255',
            'city'                   => 'nullable|string|max:100',
            'state'                  => 'nullable|string|max:100',
            'pincode'                => 'nullable|string|max:10',
            'identity_proof_type'    => 'required|string|max:50',
            'identity_proof_number'  => 'required|string|max:50',
            'identity_proof_front'   => 'required|image|max:4096',
            'identity_proof_back'    => 'nullable|image|max:4096',
            'certificate_number'     => 'nullable|string|max:100',
            'certificate_document'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:6144',
            'profile_image'          => 'required|image|max:4096',
        ]);

        $data['slug']     = Str::slug($data['name']) . '-' . Str::lower(Str::random(5));
        $data['languages'] = isset($data['languages']) ? implode(',', $data['languages']) : null;

        // File uploads
        foreach (['profile_image','identity_proof_front','identity_proof_back','certificate_document'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->store('nurses/'.$file, 'public');
            }
        }

        $categories = $data['categories']; unset($data['categories']);
        $areas      = $data['areas'];      unset($data['areas']);

        $nurse = Nurse::create($data);
        $nurse->categories()->sync($categories); // ensure relationship defined
        $nurse->areas()->sync($areas);

        return redirect()->route('nurse.register')
            ->with('success', 'Application submitted! Our team will verify your details within 24-48 hours.');
    }
}
