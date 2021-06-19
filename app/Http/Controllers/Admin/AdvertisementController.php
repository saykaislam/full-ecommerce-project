<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Advertisement;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdvertisementController extends Controller
{

    public function index()
    {
        $advertisements = Advertisement::all();
        return view('backend.admin.advertisement.index',compact('advertisements'));
    }

    public function create()
    {
        return view('backend.admin.advertisement.create');
    }

    public function store(Request $request)
    {
        $advertisement = new Advertisement();
        $advertisement->title = $request->title;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage =Image::make($image)->save($image->getClientOriginalExtension() == 'gif');
            Storage::disk('public')->put('uploads/advertisement/' . $imagename, $proImage);

        }else {
            $imagename = "default.png";
        }
        $advertisement->image = $imagename;
        $advertisement->save();
        Toastr::success('Advertisement Created Successfully');
        return redirect()->route('admin.advertisement.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
        return view('backend.admin.advertisement.edit',compact('advertisement'));
    }

    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);
        $advertisement->title = $request->title;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if(Storage::disk('public')->exists('uploads/advertisement/'.$advertisement->image))
            {
                Storage::disk('public')->delete('uploads/advertisement/'.$advertisement->image);
            }

//            resize image for hospital and upload
            $proImage =Image::make($image)->save($image->getClientOriginalExtension() == 'gif');
            Storage::disk('public')->put('uploads/advertisement/' . $imagename, $proImage);


        }else {
            $imagename =$advertisement->image ;
        }

        $advertisement->image = $imagename;
        $advertisement->save();
        Toastr::success('Advertisement Updated Successfully', 'Success');
        return redirect()->route('admin.advertisement.index');
    }

    public function destroy($id)
    {
        Advertisement::destroy($id);
        Toastr::success('Advertisement Deleted Successfully', 'Success');
        return redirect()->route('admin.advertisement.index');
    }
}
