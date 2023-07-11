<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {
        if($cart->get()->count() == 0){
            return redirect()->route('home');
        }

        return view('front.checkoute',[
            'cart'=>$cart
        ]);
    }

    public function store(Request $request, CartRepository $cart)
    {
        $request->validate([
        ]);

        $items =  $cart->get();


        DB::beginTransaction();
        try{
                $order = Order::create([
                    'user_id'=>Auth::id(),
                ]);

                foreach($cart->get() as $item){
                    OrderItem::create([
                        'order_id'=>$order->id,
                        'product_id'=>$item->product_id,
                        'product_name'=>$item->product->name,
                        'price'=>$item->product->price,
                        'quantity'=>$item->quantity,
                    ]);
                }

                OrderAddress::create([
                    'order_id'=>$order->id,
                    'name'=>$request['name'],
                    'email'=>$request['email'],
                    'phone_number'=>$request['phone_number'],
                ]);
                $cart->empty();
                DB::commit();
            }catch(Throwable $e) {
            DB::rollBack();
            throw $e;
        }


        return redirect()->route('home')->with('success', 'Your request has been received. We will contact you shortly');
    }


}
