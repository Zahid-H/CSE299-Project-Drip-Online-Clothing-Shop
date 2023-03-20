<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductBooking;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;


class ProductBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_id = $request->cart_id;
        $data = array();
        $amount = 0;

        foreach ($cart_id as $i=>$value) {
            $cart = Cart::find($value);
            $amount = $amount + $cart->product->price;
            $data[$i]['user_id'] = $cart->user_id;
            $data[$i]['product_id'] = $cart->product_id;
            $data[$i]['qty'] = $cart->qty;
            $data[$i]['payment_status'] = '0';
        }

        $ProductBooking = ProductBooking::insert($data);
        $bookIds = ProductBooking::orderBy('id', 'desc')->take(count($data))->pluck('id');
                
        if ($ProductBooking) {
            Cart::destroy($cart_id);

            
            if($request->payment_type == 'eway'){
                Session::put('bookIds', $bookIds);
                $url = $this->ewayPayment($amount);
                return response()->json(['type'=>'eway','url'=>$url]);
            }else{
                return response()->json(['type'=>'pay_person']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBooking $productBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBooking $productBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBooking  $productBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBooking $productBooking)
    {
        //
    }
}
