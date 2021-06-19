<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\HomeCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomeCategoryController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('backend.admin.home_categories.create');
    }

    public function store(Request $request)
    {
        $home_category = new HomeCategory();
        $home_category->category_id = $request->category_id;
        if($home_category->save()){
            Toastr::success('Home Page Category has been inserted successfully', 'Success');
            return redirect()->route('admin.home_settings.index');
        }
        Toastr::error('Something went wrong', 'Success');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $homeCategory = HomeCategory::findOrFail($id);
        return view('backend.admin.home_categories.edit', compact('homeCategory'));
    }


    public function update(Request $request, $id)
    {
        $home_category = HomeCategory::findOrFail($id);
        $home_category->category_id = $request->category_id;
        if($home_category->save()){
            Toastr::success('Home Page Category has been updated successfully', 'Success');
            return redirect()->route('admin.home_settings.index');
        }

        Toastr::error('Something went wrong', 'Success');
        return back();
    }

    public function destroy($id)
    {
        //
    }
    public function update_status(Request $request)
    {
        $home_category = HomeCategory::findOrFail($request->id);
        $home_category->status = $request->status;
        if($home_category->save()){
            return 1;
        }
        return 0;
    }
}
