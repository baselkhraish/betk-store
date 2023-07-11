<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutRequest;
use App\Models\About;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AboutController extends Controller
{

    public function index()
    {
        $abouts = About::get();
        return view('admin.about',compact('abouts'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::findOrFail($id);
        // dd($about);
        return view('admin.aboutEdit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(AboutRequest $request, $id)
    {
        // Validation
        // $request->validate(About::rules($id));

        $about = About::findOrFail($id);
        $old_image = $about->image;

        $data = $request->except('image');
        $new_image= $this->uploadImage($request);

        if($new_image){
            $data['image'] = $new_image;
        }


        $about->update($data);

        if ($old_image && $new_image) {
            Storage::disk('public')->delete($old_image);
        }

        return Redirect::route('admin.about')->with('success', 'About updated successfully');
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
}
