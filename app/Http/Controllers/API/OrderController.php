<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;

use App\Contracts\OrderInterface;
use App\Http\Controllers\API\BaseController;

class OrderController extends BaseController
{
    protected $order;

    function __construct(OrderInterface $order)
    {
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders = $this->order->list('customerapi');
            return $this->sendResponse($orders, 'Orders list get successfully.');
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $responce = $this->order->store('customerapi', $request->all());
            if($responce['status']){
                return $this->sendResponse('', $responce['message']);
            }
            return $this->sendError('Order Not Placed', $responce['message']); 
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $order)
    {
        try {
            $responce = $this->order->cancel('customerapi', $order);
            if($responce){
                return $this->sendResponse('', 'Order canceled successfully.');
            }
            return $this->sendError('Order Not canceled', 'You can not cancel order your order is in under process!'); 
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $responce = $this->order->delete('customerapi', $id);
            if($responce){
                return $this->sendResponse('', 'Order deleted successfully.');
            }
            return $this->sendError('Order Not Deleted', 'You can not delete order your order is in under process!'); 
        } catch (\Throwable $th) {
            return $this->sendException($th->getMessage());
        }
    }
}
