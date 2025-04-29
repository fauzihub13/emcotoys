<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.store.index', [
            'type_menu' => 'store',
            'stores' => Store::where('deleted_at', '=', null)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.store.create', [
            'type_menu' => 'store',
            'stores' => Store::where('deleted_at', '=', null)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'url'=>['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {

            $slug = Str::slug($request->name);

            // Check for existing slugs
            $originalSlug = $slug;
            $counter = 1;

            while (Store::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $store = new Store();
            $store->slug = $slug;
            $store->name = $request->name;
            $store->url = $request->url;
            $store->latitude = $request->latitude;
            $store->longitude = $request->longitude;
            $store->save();

            return redirect()->route('store.index')->with('success', 'Store created successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to create store . Please try again.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        try {
            $store = Store::find($store->id);
            return view('admin.pages.store.edit', [
                'type_menu' => 'store',
                'store' => $store
            ]);
        } catch (\Throwable $th) {
            return back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'url'=>['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $store = Store::find($store->id);

            // Create Slug
            $slug = Str::slug($request->name);

            // Validate slug
            if ($slug != $store->slug) {
                $slug = Str::slug($request->name);

                // Check for existing slugs
                $originalSlug = $slug;
                $counter = 1;

                while (Store::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
                $store->slug = $slug;
            }

            $store->name = $request->name;
            $store->url = $request->url;
            $store->latitude = $request->latitude;
            $store->longitude = $request->longitude;
            $store->updated_at = Carbon::now();
            $store->save();

            return redirect()->route('store.index')->with('success', 'Store updated successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update store. Please try again. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        try {
            $store = Store::findOrFail($store->id);
            if($store){
                $store->deleted_at = Carbon::now();
                $store->save();
                return redirect()->route('store.index')->with('success', 'Store deleted successfully.');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete store. Please try again. '. $th->getMessage());

        }
    }
}
