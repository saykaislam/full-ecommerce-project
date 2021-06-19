<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::where('status',1)->get();
        return view('frontend.pages.blog_list',compact('blogs'));
    }
    public function details($slug) {
        $blog = Blog::where('slug',$slug)->first();
        $latestBlogs = Blog::where('status',1)->latest()->take(3)->get();
        return view('frontend.pages.blog_details',compact('blog','latestBlogs'));
    }
}
