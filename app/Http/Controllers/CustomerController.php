<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $customers = null;
        if ($user->hasRole('administrator')) {
            $customers = Customer::with('group')->paginate(20);
        } else {
            $customers = Customer::with('group')->where('created_id', $user->id)->paginate(20);
        }

        return view('customers.index')->withCustomers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = CustomerGroup::all();
        return view('customers.create')->withGroups($groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->phone)
        ]);
        $user->attachRole('customer');

        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'group_id' => $request->group_id,
            'user_id' => $user->id,
            'created_id' => Auth::user()->id
        ]);
        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $groups = CustomerGroup::all();
        $customer = Customer::findOrFail($id);
        $users = User::all();
        return view('customers.edit')
            ->withCustomer($customer)
            ->withGroups($groups)
            ->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'group_id' => 'required',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'note' => $request->note,
            'group_id' => $request->group_id,
        ]);
        $user = User::where('id', $customer->user_id)->first();
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $user = User::find($customer->user_id);
        $customer->delete();
        if ($user) {
            $user->delete();
        }
        return redirect()->route('customers.index');
    }
}
