<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\FlashDeal;
use App\Model\FlashDealProduct;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class FlashDealController extends Controller
{

    public function index()
    {
        $fashDeals = FlashDeal::where('user_id',Auth::id())->where('user_type','admin')->latest()->get();
        return view('backend.admin.flash_deals.index', compact('fashDeals'));
    }

    public function create()
    {
        return  view('backend.admin.flash_deals.create');
    }

    public function store(Request $request)
    {
        $flash_deal = new FlashDeal;
        $flash_deal->title = $request->title;
        $flash_deal->user_id = Auth::id();
        $flash_deal->user_type = 'admin';
        $flash_deal->start_date = strtotime($request->start_date);
        $flash_deal->end_date = strtotime($request->end_date);
        $flash_deal->slug =  Str::slug($request->title);
        if($flash_deal->save()){
            foreach ($request->products as $key => $product) {
                $flash_deal_product = new FlashDealProduct;
                $flash_deal_product->flash_deal_id = $flash_deal->id;
                $flash_deal_product->product_id = $product;
                $flash_deal_product->user_id = Auth::id();
                $flash_deal_product->user_type = 'admin';
                $flash_deal_product->discount = $request['discount_'.$product];
                $flash_deal_product->discount_type = $request['discount_type_'.$product];
                $flash_deal_product->save();
            }
            Toastr::success('Flash Deal has been inserted successfully');
            return redirect()->route('admin.flash_deals.index');
        }
        else{
            Toastr::error('Something went wrong');
            return back();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $flash_deal = FlashDeal::findOrFail(decrypt($id));
        return view('backend.admin.flash_deals.edit', compact('flash_deal'));
    }

    public function update(Request $request, $id)
    {
        $flash_deal =  FlashDeal::find($id);
        $flash_deal->title = $request->title;
        $flash_deal->user_id = Auth::id();
        $flash_deal->user_type = 'admin';
        $flash_deal->start_date = strtotime($request->start_date);
        $flash_deal->end_date = strtotime($request->end_date);
        $flash_deal->slug =  Str::slug($request->title);
        foreach ($flash_deal->flashDealProducts as $key => $flash_deal_product) {
            $flash_deal_product->delete();
        }
        if($flash_deal->save()){
            foreach ($request->products as $key => $product) {
                $flash_deal_product =   new FlashDealProduct;
                $flash_deal_product->flash_deal_id = $flash_deal->id;
                $flash_deal_product->product_id = $product;
                $flash_deal_product->user_id = Auth::id();
                $flash_deal_product->user_type = 'admin';
                $flash_deal_product->discount = $request['discount_'.$product];
                $flash_deal_product->discount_type = $request['discount_type_'.$product];
                $flash_deal_product->save();
            }
            Toastr::success('Flash Deal has been Updated successfully');
            return redirect()->route('admin.flash_deals.index');
        }
        else{
            Toastr::error('Something went wrong');
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        //
    }
    public function product_discount(Request $request){
        $product_ids = $request->product_ids;
        return view('backend.partials.flash_deal_discount', compact('product_ids'));
    }
    public function update_status(Request $request)
    {
        $flash_deal = FlashDeal::findOrFail($request->id);
        $flash_deal->status = $request->status;
        if($flash_deal->save()){
            Toastr::success('Flash deal status updated successfully');
            return 1;
        }
        return 0;
    }
    public function update_featured(Request $request)
    {
        foreach (FlashDeal::all() as $key => $flash_deal) {
            $flash_deal->featured = 0;
            $flash_deal->save();
        }
        $flash_deal = FlashDeal::findOrFail($request->id);
        $flash_deal->featured = $request->featured;
        if($flash_deal->save()){
            Toastr::success('Flash deal status updated successfully');
            return 1;
        }
        return 0;
    }
    public function product_discount_edit(Request $request){
        $product_ids = $request->product_ids;
        $flash_deal_id = $request->flash_deal_id;
        return view('backend.partials.flash_deal_discount_edit', compact('product_ids', 'flash_deal_id'));
    }
}
