<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() {
        $customers = User::where('role', 'customer')->paginate(10);
        return view('backend.customers.index', compact('customers'));
    }
    public function create() {
        return view('backend.customers.create');
    }
    public function store(CreateCustomerRequest $request) {

        $userCostumer = User::where('phone', $request->input('phone'))->first();
        if ($userCostumer != null) {
            alert()->warning('WarningAlert','Nomer hp sudah terdaftar pada customer dengan nama ' . $userCostumer->name);
            return redirect()->back();
        }

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'role' => 'customer',
            'password' => null
        ]);

        toast('Berhasil menambah data customer','success');

        return redirect()->back();
    }

    public function edit($id) {
        $customer = User::find($id);
        return view('backend.customers.edit', compact('customer'));
    }

    public function update(CreateCustomerRequest $request, $id) {

        $customer = User::find($id);

        $userCostumer = User::where('phone', $request->input('phone'))->where('phone', '!=', $customer->phone )->first();
        if ($userCostumer != null) {
            alert()->warning('WarningAlert','Nomer hp sudah terdaftar pada customer dengan nama ' . $userCostumer->name);
            return redirect()->back();
        }

        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->save();
        toast('Berhasil mengubah data customer','success');

        return redirect()->back();
    }
}
