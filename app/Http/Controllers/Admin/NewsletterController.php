<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Newsletter;
use Illuminate\Http\Request;

/**
 * Class NewsletterController
 * @package App\Http\Controllers
 */
class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:newsletters-list',  ['only' => ['index']]);
        $this->middleware('permission:newsletters-create',['only' => ['create','store']]);
        $this->middleware('permission:newsletters-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::get();

        return view('admin.newsletter.index', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newsletter = new Newsletter();
        return view('admin.newsletter.create', compact('newsletter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $newsletter = Newsletter::create($request->all());
        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $newsletter = Newsletter::find($id)->delete();

        return redirect()->route('newsletters.index')
            ->with('success', 'Newsletter deleted successfully');
    }
}
