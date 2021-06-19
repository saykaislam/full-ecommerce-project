<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->session()->get('compare'));
        $categories = Category::all();
        return view('frontend.pages.view_compare', compact('categories'));
    }
    public function reset(Request $request)
    {
        $request->session()->forget('compare');
        return back();
    }

    public function addToCompare(Request $request)
    {
        if($request->session()->has('compare')){
            $compare = $request->session()->get('compare', collect([]));
            if(!$compare->contains($request->id)){
                if(count($compare) == 3){
                    $compare->forget(0);
                    $compare->push($request->id);
                }
                else{
                    $compare->push($request->id);
                }
            }
        }
        else{
            $compare = collect([$request->id]);
            $request->session()->put('compare', $compare);
        }

        return view('frontend.products_partials.compare');
    }
}
