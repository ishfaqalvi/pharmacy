<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\{Order, Product, OrderDetail, ProductPrice};
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:orders-list',  ['only' => ['index']]);
        $this->middleware('permission:orders-view',  ['only' => ['show']]);
        $this->middleware('permission:orders-create',['only' => ['create','store']]);
        $this->middleware('permission:orders-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:orders-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::whereAdminState('Show')->get();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        return view('admin.order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $order = Order::create($request->all());
        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with('details')->find($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function actions(Request $request, Order $order)
    {
        $order->update($request->all());
        $order->updateNotification();
        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully!');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->update(['admin_state' => 'Hide']);

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }

    /**
     * Validate a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productSearch(Request $request)
    {
        $parameter = $request->q;
        $page      = $request->page;
        $products  = Product::where(function ($query) use ($parameter) {
                        $query->where('name', 'LIKE', '%' . $parameter . '%')
                        ->orWhere('description', 'LIKE', '%' . $parameter . '%');
                    })->paginate(10, ['*'], 'page', $page)->toArray();
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function productStore(Request $request)
    {
        OrderDetail::create($request->all());
        return redirect()->back()->with('success', 'Product added successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function productUdate(Request $request, OrderDetail $item)
    {
        $item->update($request->all());
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function productDestroy($id)
    {
        OrderDetail::find($id)->delete();

        return redirect()->back()->with('success', 'Product removed successfully.');
    }

    /**
     * Check the record existance from a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productCheck(Request $request)
    {
        $product = OrderDetail::whereOrderId($request->order_id)->whereProductId($request->product)->first();
        if ($product) { echo "false"; }else{ echo "true"; }
    }

    /**
     * get a listing of the resource
     *
     * @return void
     */
    public function productPrices(Request $request)
    {
        $prices = ProductPrice::whereProductId($request->id)->get();
        echo json_encode($prices);
    }
}
