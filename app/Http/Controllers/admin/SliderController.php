<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.slider.addslider.add');
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
            'small_tittle' => 'required',
            'big_tittle' => 'required',
            'big_sub_tittle'=> 'required',
            'slider_photo'=> 'required',
            'delete_price'=> 'required',
            'sell_price'=> 'required',
            'slider_description'=> 'required',
        ]);
        //slider_photos

        $slider_photo = $request->file('slider_photo');

       $slider_photo_name = Str::slug($request->big_tittle).'-'.str::random(5).'.'.$slider_photo->getClientOriginalExtension();


       $link = base_path('public/uploads/slider_photos/' .$slider_photo_name);

       Image::make($slider_photo)->resize(844,517)->save($link);

       Slider::insert([
        'small_tittle'=>$request->small_tittle,
        'big_tittle' => $request->big_tittle,
        'big_sub_tittle' => $request->big_sub_tittle,
        'slider_discription' => $request->slider_description,
        'slider_photo' => $slider_photo_name,
        'del_price' => $request->delete_price,
        'sell_price' => $request->sell_price,
        'created_at' => Carbon::now(),

       ]);
       return redirect()->route('slider.index');
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
        $slider = Slider::find($id);
        return view('dashboard.slider.edit', compact('slider'));
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
        $this->validate($request,[
            'small_tittle' => 'required',
            'big_tittle' => 'required',
            'big_sub_tittle'=> 'required',
            //'slider_photo'=> 'required',
            'delete_price'=> 'required',
            'sell_price'=> 'required',
            'slider_description'=> 'required',
        ]);
        Slider::find($id)->update([
        'small_tittle'=>$request->small_tittle,
        'big_tittle' => $request->big_tittle,
        'big_sub_tittle' => $request->big_sub_tittle,
        'slider_discription' => $request->slider_description,

        'del_price' => $request->delete_price,
        'sell_price' => $request->sell_price,
        ]);
        //return back();

       if($request->hasFile('slider_photo')){
           $current_photo_name = Slider::find($id)->slider_photo;

           $current_photo_location = base_path('public/uploads/slider_photos/' .$current_photo_name);
           unlink($current_photo_location);

        $slider_photo = $request->file('slider_photo');

       $photo_name = Str::slug($request->big_tittle).'-'.str::random(2).'.'.$slider_photo->getClientOriginalExtension();


       $link = base_path('public/uploads/slider_photos/' .$photo_name);

       Image::make($slider_photo)->resize(844,517)->save($link);
       Slider::find($id)->update([
           'slider_photo' => $photo_name
       ]);

       }
       return redirect()->route('slider.index')->with('slider_update', "Slider Update Successfully!");
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
