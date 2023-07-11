<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = request();

        $products = Product::filter($request->query())->orderByDesc('created_at')->paginate(10);
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::orderByDesc('created_at')->get();
        return view('admin.products.create',compact('product','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('name')),
        ]);
        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);

        // Mass assignment
        Product::create($data);

        // Return Message
        return Redirect::route('admin.products.index')->with('success', 'Product added successfully');
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
        try {
            $product = Product::findOrFail($id);
            $categories = Category::orderByDesc('created_at')->get();
        } catch (Exception $e) {
            return Redirect::route('admin.products.index')->with('success', 'The Product not found');
        }


        return view('admin.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        // Validation
        // $request->validate(Product::rules($id));
        $request->merge([
            'slug' => Str::slug($request->post('name')),
        ]);

        $product = Product::findOrFail($id);
        $old_image = $product->image;

        $data = $request->except('image');
        $new_image= $this->uploadImage($request);

        if($new_image){
            $data['image'] = $new_image;
        }


        $product->update($data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        return Redirect::route('admin.products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        //delete image blong to product
        // if ($products->image) {
        //     Storage::disk('public')->delete($products->image);
        // }

        // Product::destroy($id);
        return Redirect::route('admin.products.index')->with('success', 'Product Deleted successfully');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) {
            return;
        }
        $file = $request->file('image'); //Upload Image

        $path = $file->store('uploads', ['disk' => 'public']);
        return $path;
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(5);
        return view('admin.products.trash',compact('products'));
    }

    public function restore(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('admin.products.trash')->with('success','Product restored!');
    }

    public function forceDelete(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->forceDelete();

        //delete image blong to product
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        return redirect()->route('admin.products.trash')->with('success','Product deleted forever!');
    }
}
