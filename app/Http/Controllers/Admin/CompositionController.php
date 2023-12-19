<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Composition;
use Illuminate\Http\Request;

/**
 * Class CompositionController
 * @package App\Http\Controllers
 */
class CompositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:compositions-list',  ['only' => ['index']]);
        $this->middleware('permission:compositions-view',  ['only' => ['show']]);
        $this->middleware('permission:compositions-create',['only' => ['create','store']]);
        $this->middleware('permission:compositions-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:compositions-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compositions = Composition::get();

        return view('admin.composition.index', compact('compositions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $composition = new Composition();
        return view('admin.composition.create', compact('composition'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $composition = Composition::create($request->all());
        return redirect()->route('compositions.index')
            ->with('success', 'Composition created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $composition = Composition::find($id);

        return view('admin.composition.show', compact('composition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $composition = Composition::find($id);

        return view('admin.composition.edit', compact('composition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Composition $composition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Composition $composition)
    {
        $composition->update($request->all());

        return redirect()->route('compositions.index')
            ->with('success', 'Composition updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $composition = Composition::find($id)->delete();

        return redirect()->route('compositions.index')
            ->with('success', 'Composition deleted successfully');
    }
}
