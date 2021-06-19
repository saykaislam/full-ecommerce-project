<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.admin.sliders.index',compact('sliders'));
    }

    public function create()
    {
        return view('backend.admin.sliders.create');
    }

    public function store(Request $request)
    {
        $slider = new Slider();
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(1920, 1170)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/sliders/' . $imagename, $proImage);

        }else {
            $imagename = "default.png";
        }
        $slider->image = $imagename;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->save();
        Toastr::success('Slider Created Successfully');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.admin.sliders.edit',compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider =  Slider::find($id);
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            if(Storage::disk('public')->exists('uploads/sliders/'.$slider->icon))
            {
                Storage::disk('public')->delete('uploads/sliders/'.$slider->icon);
            }
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for slider and upload
            $proImage = Image::make($image)->resize(1920, 1170)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/sliders/' . $imagename, $proImage);

        }else {
            $imagename = $slider->image;
        }
        $slider->image = $imagename;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->save();
        Toastr::success('Slider Updated Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        if(Storage::disk('public')->exists('uploads/sliders/'.$slider->image))
        {
            Storage::disk('public')->delete('uploads/sliders/'.$slider->image);
        }
        $slider->delete();
        Toastr::success('Sliders Deleted Successfully');
        return back();

    }
}
