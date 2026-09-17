<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Index()
    {
        $reviews = \App\Models\Review::latest()->get();
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required|string',
        ]);

        $review = new \App\Models\Review();
        $review->name = $request->input('name');
        $review->position = $request->input('position');
        $review->message = $request->input('message');

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('backend/assets/images/reviews'), $filename);

            $manager = new ImageManager(new Driver());

            // create new image instance with 800 x 600 (4:3)
            $image = $manager->read($image->getRealPath())->resize(800, 600);

            $review->photo = $filename;
        }

        $review->save();

        return redirect()->route('review.index')->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
