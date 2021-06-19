<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::latest()->get();
        return view('backend.admin.review.index',compact('reviews'));
    }
    public function show($id){
        $review = Review::find($id);
        if($review->viewed == 0){
            $review->viewed = 1;
            $review->save();
        }
        return view('backend.admin.review.show',compact('review'));
    }
    public function reviewUpdate(Request $request, $id) {
        $review = Review::find($id);
        $review->comment = $request->comment;
        $review->save();
        Toastr::success('Review Updated Successfully');
        return redirect()->route('admin.reviews.index');
    }
    public function updateStatus(Request $request){
        $review = Review::findOrFail($request->id);
        $review->status = $request->status;
        if($review->save()){
            return 1;
        }
        return 0;
    }

}
