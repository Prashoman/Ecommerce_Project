<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category', compact('categories'));
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
        $this->validate($request,[
            'category_name' =>'required',
            //'is_top_category' =>'required',
            'category_photo' =>'required',
        ]);
        if(isset($request->is_top_category)){
            $is_top_category = 'yes';
        }
        else{
            $is_top_category = 'no';
        }
        $category_photo = $request->file('category_photo');

       $photo_name = Str::slug($request->category_name).'-'.str::random(2).'.'.$category_photo->getClientOriginalExtension();


       $link = base_path('public/uploads/category_photos/' .$photo_name);

       Image::make($category_photo)->resize(200,256)->save($link);

       Category::insert([
           'category_name' => $request->category_name,
           'category_photo' => $photo_name,
           'is_top_category' => $is_top_category,
           'created_at' => Carbon::now()
       ]);
       return back();
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
        $category = Category::find($id);
        return view('dashboard.category_edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(isset($request->is_top_category)){
            $is_top_category = 'yes';
        }
        else{
            $is_top_category = 'no';
        }
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'is_top_category' => $is_top_category,
        ]);
        //return back();

       if($request->hasFile('category_photo')){
           $current_photo_name = Category::find($id)->category_photo;

           $current_photo_location = base_path('public/uploads/category_photos/' .$current_photo_name);
           unlink($current_photo_location);

        $category_photo = $request->file('category_photo');

       $photo_name = Str::slug($request->category_name).'-'.str::random(2).'.'.$category_photo->getClientOriginalExtension();


       $link = base_path('public/uploads/category_photos/' .$photo_name);

       Image::make($category_photo)->resize(200,256)->save($link);
       Category::find($id)->update([
           'category_photo' => $photo_name
       ]);

       }
       return redirect()->route('category.index')->with('category_update', "Category Update Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
