<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\MarketPlace;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class MarketPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.marketplace.index', [
            'type_menu' => 'marketplace',
            'marketplaces' => MarketPlace::where('deleted_at', '=', null)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.marketplace.create', [
            'type_menu' => 'marketplace'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'url'=>'required|string|min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            if($request->hasFile('image')){
                $path = $request->file('image')->store("images/marketplaces", 'public');
            }

            $slug = Str::slug($request->name);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (MarketPlace::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $marketplace = new MarketPlace();
            $marketplace->slug = $slug;
            $marketplace->image = $path;
            $marketplace->name = $request->name;
            $marketplace->url = $request->url;
            $marketplace->save();

            return redirect()->route('marketplace.index')->with('status', 'Marketplace created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create marketplace . Please try again.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MarketPlace $marketPlace)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MarketPlace $marketplace)
    {
        try {
            $marketplace = MarketPlace::find($marketplace->id);
            return view('admin.pages.marketplace.edit', [
                'type_menu' => 'marketplace',
                'marketplace' => $marketplace
            ]);
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MarketPlace $marketplace)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'url'=>'required|string|min:3',
            'image'=>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $marketplace = MarketPlace::find($marketplace->id);

            if($request->hasFile('image')){
                $path = $request->file('image')->store("images/marketplaces", 'public');
                $marketplace->image = $path;
            }

            // Create Slug
            $slug = Str::slug($request->name);

            // Validate slug
            if ($slug != $marketplace->slug) {
                $slug = Str::slug($request->name);

                // Check for existing slugs
                $originalSlug = $slug;
                $counter = 1;

                while (MarketPlace::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $marketplace->slug = $slug;
            }

            $marketplace->name = $request->name;
            $marketplace->url = $request->url;
            $marketplace->updated_at = Carbon::now();
            $marketplace->save();

            return redirect()->route('marketplace.index')->with('status', 'Marketplace created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update Marketplace. Please try again. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MarketPlace $marketplace)
    {
        try {
            $marketplace = MarketPlace::findOrFail($marketplace->id);
            if($marketplace){
                $marketplace->deleted_at = Carbon::now();
                $marketplace->save();
                return redirect()->route('marketplace.index')->with('success', 'Marketplace deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete marketplace. Please try again. '. $th->getMessage());

        }
    }
}
