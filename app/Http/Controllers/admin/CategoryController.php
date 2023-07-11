<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = request();
        $categories = Category::filter($request->query())->orderByDesc('created_at')->paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->merge([
            'slug' => Str::slug($request->post('name')),
        ]);

        $data = $request->except('image');

        $data['image'] = $this->uploadImage($request);
        // Mass assignment
        Category::create($data);

        // dd($data);

        // Return Message
        return Redirect::route('admin.categories.index')->with('success', 'Category added successfully');
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
            $category = Category::findOrFail($id);
        } catch (Exception $e) {
            return Redirect::route('admin.categories.index')->with('success', 'The Category not found');
        }


        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        
        if($request->name){
            $request->merge([
                'slug' => Str::slug($request->post('name')),
            ]);

        }

        $category = Category::findOrFail($id);
        $old_image = $category->image;

        $data = $request->except('image');
        $new_image= $this->uploadImage($request);

        if($new_image){
            $data['image'] = $new_image;
        }


        $category->update($data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        return Redirect::route('admin.categories.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        //delete image blong to category
        // if ($categories->image) {
        //     Storage::disk('public')->delete($categories->image);
        // }

        // Category::destroy($id);
        return Redirect::route('admin.categories.index')->with('success', 'Category Deleted successfully');
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
        $categories = Category::onlyTrashed()->orderBy('deleted_at','DESC')->paginate(5);
        return view('admin.categories.trash',compact('categories'));
    }

    public function restore(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('admin.categories.trash')->with('success','Category restored!');
    }

    public function forceDelete(Request $request, $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->forceDelete();

        //delete image blong to category
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }

        return redirect()->route('admin.categories.trash')->with('success','Category deleted forever!');
    }
}
