<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Banner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BannerController extends Controller
{

    public function index()
    {
        //
    }

    public function create($position)
    {
        return view('backend.admin.banner.create',compact('position'));
    }


    public function store(Request $request)
    {
        if($request->hasFile('photo')){
            $banner = new Banner();
            $banner->photo = $request->photo->store('uploads/banners');
            $banner->url = $request->url;
            $banner->position = $request->position;
            $banner->save();
            Toastr::success('Banner has been inserted successfully');

        }
        return redirect()->route('admin.home_settings.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.admin.banner.edit', compact('banner'));
    }


    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        if($request->hasFile('photo')){
            $banner->photo = $request->photo->store('uploads/banners');
        }
        $banner->url = $request->url;
        $banner->save();
        Toastr::success('Banner has been updated successfully');
        return redirect()->route('admin.home_settings.index');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if(Banner::destroy($id)){
            //unlink($banner->photo);
            Toastr::success('Banner has been deleted successfully');
        }
        else{
            Toastr::error('Something went wrong');

        }
        return redirect()->route('admin.home_settings.index');
    }
    public function update_status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->published = $request->status;
        if($request->status == 1){
            if(count(Banner::where('published', 1)->where('position', $banner->position)->get()) < 2)
            {
                if($banner->save()){
                    return '1';
                }
                else {
                    return '0';
                }
            }
        }
        else{
            if($banner->save()){
                return '1';
            }
            else {
                return '0';
            }
        }

        return '0';
    }
    public function update_status_2(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->published = $request->status;
        if($request->status == 1){
            if(count(Banner::where('published', 1)->where('position', $banner->position)->get()) < 3)
            {
                if($banner->save()){
                    return '1';
                }
                else {
                    return '0';
                }
            }
        }
        else{
            if($banner->save()){
                return '1';
            }
            else {
                return '0';
            }
        }

        return '0';
    }
}
