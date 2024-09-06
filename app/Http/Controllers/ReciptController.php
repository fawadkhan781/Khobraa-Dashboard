<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receipt;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class ReciptController extends Controller
{

    public function recipts()
    {
        $customers = Customer::all();
        $receipts = Receipt::with('customer')->paginate(4);
        return view('recipts.list', compact('receipts', 'customers'));
    }

    public function storeRecipts(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'total_amount' => 'required',
            'payment_method' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recipt = new Receipt();
        $recipt->customer_id = $request->customer_id;
        $recipt->total_amount = $request->total_amount;
        $recipt->payment_method = $request->payment_method;
        $recipt->selected_date = $request->date;
        $recipt->save();

        return redirect()->back()->with('success', 'Receipt created successfully!');
    }

    public function updateRecipts(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'total_amount' => 'required',
            'payment_method' => 'required',
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recipt = Receipt::findOrFail($id);
        $recipt->customer_id = $request->customer_id;
        $recipt->total_amount = $request->total_amount;
        $recipt->payment_method = $request->payment_method;
        $recipt->selected_date = $request->date;
        $recipt->save();

        return redirect()->back()->with('success', 'Receipt updated successfully!');
    }

    public function destroyRecipts(Request $request, $id)
    {
        $recipt = Receipt::findOrFail($id);
        $recipt->delete();
        return redirect()->back()->with('success', 'Receipt deleted successfully!');
    }
}