<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    //
    function index()
    {
        $setting = Setting::where('id',1)->first();
        return view('admin.setting.index',compact('setting'));
    }



    function store(Request $request)
    {

        $setting = Setting::where('id', 1)->first();

        if ($setting) {

            $request->validate([
                'website_name' => 'required',
                'meta_title' => 'required',
            ]);


            $setting->website_name = $request->website_name;
            $setting->description = $request->description;
            $setting->meta_title = $request->meta_title;
            $setting->meta_keyword = $request->meta_keyword;
            $setting->meta_description = $request->meta_description;


            if ($request->hasFile('logo')) {

                if (File::exists($setting->logo)) {
                    File::delete($setting->logo);
                }

                $file = $request->file('logo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                $file->move('uploads/setting/', $fileName);

                $setting->logo = 'uploads/setting/' . $fileName;
            }




            if ($request->hasFile('favicon')) {

                if (File::exists($setting->favicon)) {
                    File::delete($setting->favicon);
                }
                $file = $request->file('favicon');
                $fileName = time() . '12' . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/setting/', $fileName);
                $setting->favicon = 'uploads/setting/' . $fileName;
            }

            $setting->save();

            return redirect()->back()->with('message','Updated Successfully');


        } else {
            $request->validate([
                'website_name' => 'required',
                'logo' => 'required',
                'meta_title' => 'required',
            ]);


            $settingCreate = new Setting();
            $settingCreate->website_name = $request->website_name;
            $settingCreate->description = $request->description;
            $settingCreate->meta_title = $request->meta_title;
            $settingCreate->meta_keyword = $request->meta_keyword;
            $settingCreate->meta_description = $request->meta_description;


            if ($request->hasFile('logo')) {



                $file = $request->file('logo');
                $fileName = time() . '.' . $file->getClientOriginalExtension();

                $file->move('uploads/setting/', $fileName);

                $settingCreate->logo = 'uploads/setting/' . $fileName;
            }




            if ($request->hasFile('favicon')) {


                $file = $request->file('favicon');
                $fileName = time() . '12' . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/setting/', $fileName);
                $settingCreate->favicon = 'uploads/setting/' . $fileName;
            }

            $settingCreate->save();


            return redirect()->back()->with('message','Updated Successfully');

        }
    }
}
