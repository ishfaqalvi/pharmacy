<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:customers-list',  ['only' => ['index']]);
        $this->middleware('permission:customers-view',  ['only' => ['show']]);
        $this->middleware('permission:customers-create',['only' => ['create','store']]);
        $this->middleware('permission:customers-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:customers-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.customer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();

        return view('admin.customer.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required|unique:users,phone_number'
        ]);
        $user = User::create($request->all());
        return redirect()->route('customers.index')->with('success','Customer created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.customer.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.customer.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name'         => 'required',
            'email'        => 'required|email',
            'phone_number' => 'required|unique:users,phone_number,' . $user->id,
        ]);
        $user->update($request->all());
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->orders()->delete();
        $user->cartProducts()->delete();
        $user->wishProducts()->delete();
        $user->delete();
        return redirect()->route('customers.index')->with('success','Customer deleted successfully!');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkPhone(Request $request)
    {
        if ($request->id) {
            $user = User::where('id','!=',$request->id)->wherePhoneNumber($request->phone_number)->first();
        }else{
            $user = User::wherePhoneNumber($request->phone_number)->first();
        }

        if($user){ echo "false"; }else{ echo "true";}
    }
}
