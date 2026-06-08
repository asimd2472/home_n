<?php

namespace App\Http\Controllers;

use App\Models\Arealocation;
use App\Models\Category;
use App\Models\Nurse;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // public function show($category_slug, $area_slug)
    // {   
    //     echo "ok";exit;
    //     $category = Category::where('slug', $category_slug)->firstOrFail();

    //     $area = Area::where('slug', $area_slug)->firstOrFail();

    //     return view('service-area', compact(
    //         'category',
    //         'area'
    //     ));
    // }

    public function show($slug)
    {
        preg_match('/^(.*)-in-(.*)$/', $slug, $matches);

        $category_slug = $matches[1];
        $area_slug = $matches[2];

        

        $category = Category::where('slug', $category_slug)->first();

        $area = Arealocation::where('slug', $area_slug)->first();

        // dd($category_slug, $area_slug);

        $nurses = Nurse::with(['categories', 'areas'])
            ->whereHas('categories', function ($query) use ($category) {
                $query->where('categories.id', $category->id);
            })
            ->whereHas('areas', function ($query) use ($area) {
                $query->where('arealocations.id', $area->id);
            })
            ->paginate(12);

        // dd($nurses);

        $all_category = Category::all();
        $all_area = Arealocation::all();


            return view(
                'frontend.nurse-listing',
                compact(
                    'category',
                    'area',
                    'nurses',
                    'all_category',
                    'all_area'
                )
            );
    }
}
