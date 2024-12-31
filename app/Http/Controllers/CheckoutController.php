<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'product_name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $order = Order::create($validated);

        return response()->json(['message' => 'Order created successfully!', 'order' => $order], 201);
    }
}
