<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('front.cart',[
            'cart'=>$this->cart,
        ]);
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
            'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['nullable','int','min:1'],
        ]);

        $product = Product::findOrFail($request->post('product_id'));
        $this->cart->add($product,$request->post('quantity'));

        return  redirect()->back()->with('success', 'added to cart');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            // 'product_id'=>['required','int','exists:products,id'],
            'quantity'=>['required','int','min:1'],
        ]);

        // $product = Product::findOrFail($request->post('product_id'));
        $this->cart->update($id,$request->post('quantity'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->cart->delete($id);
        return[
            'message' => 'Item deleted!',
        ];
    }


}
