<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\City;
use Illuminate\Http\Request;

/**
 * Class CityController
 * @package App\Http\Controllers
 */
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:cities-list',  ['only' => ['index']]);
        $this->middleware('permission:cities-view',  ['only' => ['show']]);
        $this->middleware('permission:cities-create',['only' => ['create','store']]);
        $this->middleware('permission:cities-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:cities-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get();

        return view('admin.city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City();
        return view('admin.city.create', compact('city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $city = City::create($request->all());
        return redirect()->route('cities.index')
            ->with('success', 'City created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);

        return view('admin.city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        return view('admin.city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->update($request->all());

        return redirect()->route('cities.index')
            ->with('success', 'City updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $city = City::find($id)->delete();

        return redirect()->route('cities.index')
            ->with('success', 'City deleted successfully');
    }
}
