<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view("admin.setting.index",compact("setting"));
    }
    public function store(Request $request)
    {
        $setting = Setting::first();

        if($request->hasFile('logo'))
        {
            $path = 'uploads/logo/'.$setting->logo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);
            $setting->logo = $filename;
        }

        if ($setting)
        {
            $setting->update([
                'website_name'=> $request->website_name,
                'website_url'=> $request->website_url,
                'page_title'=> $request->page_title,
                'meta_keyword'=> $request->meta_keyword,
                'meta_description'=> $request->meta_description,
                'address'=> $request->address,
                'phone1'=> $request->phone1,
                'phone2'=> $request->phone2,
                'email1'=> $request->email1,
                'email2'=> $request->email2,
                'facebook'=> $request->facebook,
                'twitter'=> $request->twitter,
                'instagram'=> $request->instagram,
                'youtube'=> $request->youtube,
                'color_code'=> $request->color_code,
                'map'=> $request->map,
                // 'logo' => $request->logo,
            ]);
            return redirect()->back()->with('message','Settings Saved');
        }
        else
        {

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/logo/', $filename);

            Setting::create([
                'website_name'=> $request->website_name,
                'website_url'=> $request->website_url,
                'page_title'=> $request->page_title,
                'meta_keyword'=> $request->meta_keyword,
                'meta_description'=> $request->meta_description,
                'address'=> $request->address,
                'phone1'=> $request->phone1,
                'phone2'=> $request->phone2,
                'email1'=> $request->email1,
                'email2'=> $request->email2,
                'facebook'=> $request->facebook,
                'twitter'=> $request->twitter,
                'instagram'=> $request->instagram,
                'youtube'=> $request->youtube,
                'color_code'=> $request->color_code,
                'map'=> $request->map,
                'logo' => $filename,
                // 'logo' => $request->logo,
            ]);
            $file->move('uploads/user/', $filename);
            return redirect()->back()->with('message','Settings Created');
        }
    }
}
