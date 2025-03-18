<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pages.order.index', [
            'type_menu' => 'order',
            'orders' => Order::where('deleted_at', '=', null)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        // dd(vars: Order::with(['orderItems'])->notInTrash()->find($order->id));
        return view('admin.pages.order.edit', [
            'type_menu' => 'order',
            'order'=> Order::with(['orderItems'])->notInTrash()->find($order->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'tracking_number'=>'required|string|min:8|max:24',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $order = Order::find($order->id);

            $order->tracking_number = $request->tracking_number;
            $order->status = 'shipped';
            $order->save();

            return redirect()->back()->with('success', 'Tracking number updated successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update tracking number. Please try again. ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
