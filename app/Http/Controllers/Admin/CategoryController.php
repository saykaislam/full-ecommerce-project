<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('backend.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required|unique:categories,name',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->featured = 0;
        $category->top = 0;
        $category->is_home = 0;
        $image = $request->file('icon');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(300, 300)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/categories/' . $imagename, $proImage);

        }else {
            $imagename = "default.png";
        }
        $category->icon = $imagename;
        $category->save();
        Toastr::success('Categories Created Successfully');
        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|unique:categories,name,'.$id,
        ]);

        $category =  Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->featured = 0;
        $category->top = 0;
        $category->is_home = 0;
        $image = $request->file('icon');
        if (isset($image)) {
            //make unique name for image
            if(Storage::disk('public')->exists('uploads/categories/'.$category->icon))
            {
                Storage::disk('public')->delete('uploads/categories/'.$category->icon);
            }
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(300, 300)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/categories/' . $imagename, $proImage);

        }else {
            $imagename = $category->icon;
        }
        $category->icon = $imagename;
        $category->save();
        Toastr::success('Categories Updated Successfully');
        return back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if(Storage::disk('public')->exists('uploads/categories/'.$category->icon))
        {
            Storage::disk('public')->delete('uploads/categories/'.$category->icon);
        }
        $category->delete();
        Toastr::success('Categories Deleted Successfully');
        return back();

    }
    public function updateIsHome(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->is_home = $request->status;
        if($category->save()){
            return 1;
        }
        return 0;
    }
}
