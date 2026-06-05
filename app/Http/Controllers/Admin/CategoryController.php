<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Arealocation;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:categories,slug',
            'description' => 'nullable|string',
            'image' => 'nullable',
            'image_icon' => 'nullable',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($request->input('name'));

        // For files: store using slug-based filenames (with icon suffix for icon)
        $slug = $data['slug'];

        if ($request->hasFile('image')) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $filename = $slug . '.' . $ext;
            $path = 'categories/' . $filename;
            if (Storage::disk('public')->exists($path)) {
                $filename = $slug . '-' . time() . '.' . $ext;
                $path = 'categories/' . $filename;
            }
            $request->file('image')->storeAs('categories', $filename, 'public');
            $data['image'] = $path;
        }

        if ($request->hasFile('image_icon')) {
            $ext = $request->file('image_icon')->getClientOriginalExtension();
            $filename = $slug . '-icon.' . $ext;
            $path = 'categories/' . $filename;
            if (Storage::disk('public')->exists($path)) {
                $filename = $slug . '-icon-' . time() . '.' . $ext;
                $path = 'categories/' . $filename;
            }
            $request->file('image_icon')->storeAs('categories', $filename, 'public');
            $data['image_icon'] = $path;
        }

        Category::create($data);

        return redirect()->route('admin.category')->with('success', 'Category created.');
    }


    public function upload_areas()
    {
        $jsonPath = public_path('assets/kolkata_areas_lat_long.json');

        if (!file_exists($jsonPath)) {
            return redirect()->back()->with('error', 'Areas JSON file not found.');
        }

        $content = file_get_contents($jsonPath);
        $areas = json_decode($content, true);

        if (!is_array($areas)) {
            return redirect()->back()->with('error', 'Invalid areas JSON format.');
        }

        $imported = 0;

        foreach ($areas as $area) {
            $areaName = trim($area['area_name'] ?? '');
            if ($areaName === '') {
                continue;
            }

            $zone = $area['zone'] ?? null;
            $coords = $area['coordinates'] ?? [];
            $latitude = isset($coords['latitude']) ? (string) $coords['latitude'] : null;
            $longitude = isset($coords['longitude']) ? (string) $coords['longitude'] : null;
            $imageUrl = $area['image_url'] ?? null;
            $imagePath = null;

            if ($imageUrl) {
                try {
                    $response = Http::timeout(20)->get($imageUrl);

                    if ($response->successful()) {
                        $extension = $this->resolveImageExtension($imageUrl, $response);
                        $slug = Str::slug($areaName);
                        $filename = $slug . '.' . $extension;
                        $storagePath = 'arealocations/' . $filename;
                        $storagePath = $this->uniqueStoragePath($storagePath);

                        Storage::disk('public')->put($storagePath, $response->body());
                        $imagePath = $storagePath;
                    }
                } catch (\Exception $exception) {
                    // Continue importing other areas even if one image fails.
                }
            }

            Arealocation::updateOrCreate(
                ['area_name' => $areaName],
                [
                    'zone' => $zone,
                    'image' => $imagePath,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'slug' => Str::slug($areaName),
                ]
            );

            $imported++;
        }

        return redirect()->back()->with('success', "Imported {$imported} area locations.");
    }

    private function resolveImageExtension(string $url, $response): string
    {
        $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
            return $extension === 'jpeg' ? 'jpg' : $extension;
        }

        $contentType = $response->header('Content-Type');

        return match ($contentType) {
            'image/jpeg', 'image/jpg' => 'jpg',
            'image/png' => 'png',
            'image/gif' => 'gif',
            'image/webp' => 'webp',
            default => 'jpg',
        };
    }

    private function uniqueStoragePath(string $path): string
    {
        if (!Storage::disk('public')->exists($path)) {
            return $path;
        }

        $info = pathinfo($path);
        $index = 1;

        do {
            $path = $info['dirname'] . '/' . $info['filename'] . '-' . $index . '.' . $info['extension'];
            $index++;
        } while (Storage::disk('public')->exists($path));

        return $path;
    }
}
