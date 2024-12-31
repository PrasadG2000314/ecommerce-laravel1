<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|integer',
            'payment_method' => 'required|string',
            'transaction_id' => 'required|string',
        ]);

        $payment = Payment::create($validated);

        $order = Order::find($validated['order_id']);
        $order->update(['status' => 'paid']);

        return response()->json(['message' => 'Payment processed successfully!', 'payment' => $payment], 200);
    }
}
