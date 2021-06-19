<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return view('backend.admin.blog.index',compact('blogs'));
    }

    public function create()
    {
        return view('backend.admin.blog.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',
            'image'=> 'required',
        ]);
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->user_id = Auth::id();
        $blog->author = Auth::User()->name;
        $blog->description = $request->	description;
        $blog->short_description = strip_tags($request->description);
        $blog->status = 1;
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
//            resize image for hospital and upload
            $proImage = Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/blogs/' . $imagename, $proImage);
        }else {
            $imagename = "default.png";
        }

        $blog->image = $imagename;
        $blog->save();
        Toastr::success('Blog Created Successfully', 'Success');
        return redirect()->route('admin.blogs.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('backend.admin.blog.edit',compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=> 'required',
            'description'=> 'required',

        ]);
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->	description;
        $blog->short_description = strip_tags($request->description);
        $image = $request->file('image');
        if (isset($image)) {
            //make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $image_name = $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            //delete old image.....
            if (Storage::disk('public')->exists('uploads/blogs/'. $blog->image)) {
                Storage::disk('public')->delete('uploads/blogs/'. $blog->image);
            }
            $proImage = Image::make($image)->resize(818, 461)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('uploads/blogs/' . $image_name, $proImage);
        }
        else {
            $image_name =$blog->image;
        }
        $blog->image = $image_name;
        $blog->save();
        Toastr::success('Blog Updated Successfully', 'Success');
        return redirect()->route('admin.blogs.index');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        Storage::disk('public')->delete('uploads/blogs/' . $blog->image);
        $blog->delete();
        Toastr::success('Blog Deleted Successfully!');
        return redirect()->route('admin.blogs.index');
    }
    public function updateStatus(Request $request){
        $blog = Blog::findOrFail($request->id);
        $blog->status = $request->status;
        if($blog->save()){
            return 1;
        }
        return 0;
    }
}
