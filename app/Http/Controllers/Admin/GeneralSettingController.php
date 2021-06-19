<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GeneralSetting;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    public function index()
    {
        //
    }

    public function logo()
    {
        $generalsetting = GeneralSetting::first();
        return view("backend.admin.general_settings.logo", compact("generalsetting"));
    }

//updates the logo and favicons of the system
    public function storeLogo(Request $request)
    {
        $generalsetting = GeneralSetting::first();

        if($request->hasFile('logo')){
            $generalsetting->logo = $request->file('logo')->store('uploads/logo');
            //ImageOptimizer::optimize(base_path('public/').$generalsetting->logo);
        }

        if($request->hasFile('footer_logo')){
            $generalsetting->footer_logo = $request->file('footer_logo')->store('uploads/logo');
            //ImageOptimizer::optimize(base_path('public/').$generalsetting->logo);
        }

        if($request->hasFile('admin_logo')){
            $generalsetting->admin_logo = $request->file('admin_logo')->store('uploads/admin_logo');
            //ImageOptimizer::optimize(base_path('public/').$generalsetting->admin_logo);
        }

        if($request->hasFile('favicon')){
            $generalsetting->favicon = $request->file('favicon')->store('uploads/favicon');
            //ImageOptimizer::optimize(base_path('public/').$generalsetting->favicon);
        }

        if($request->hasFile('admin_login_background')){
            $generalsetting->admin_login_background = $request->file('admin_login_background')->store('uploads/admin_login_background');
            //ImageOptimizer::optimize(base_path('public/').$generalsetting->admin_login_background);
        }

        if($request->hasFile('admin_login_sidebar')){
            $generalsetting->admin_login_sidebar = $request->file('admin_login_sidebar')->store('uploads/admin_login_sidebar');
            //ImageOptimizer::optimize(base_path('public/').$generalsetting->admin_login_sidebar);
        }

        if($generalsetting->save()){
            Toastr::success('Logo settings has been updated successfully');
            return redirect()->route('admin.generalsettings.logo');
        }
        else{
            Toastr::error('Something went wrong');
            return back();
        }
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
