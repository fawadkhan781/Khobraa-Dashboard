<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
// pigination
use Illuminate\Pagination\Paginator;

class CustomerController extends Controller
{
    public function index(Request $request)
    {

        $data = Customer::Paginate(1);
        return view('customer.list', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Customer::create($data);
        return redirect()->back();
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.partials.customer_from', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'description' => 'nullable',
            'rate_type' => ' required',
            'rate_option' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('customer')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customer')->with('success', 'Customer deleted successfully');
    }
}