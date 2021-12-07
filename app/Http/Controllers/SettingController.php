<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class SettingController extends Controller
{
    //
    public function index()
    {
        // code...
        if (Gate::forUser(Auth::user())->allows('setting-website')) {
            $setting = Setting::first();

            return view ('admin.setting.index' , compact('setting'));
        }else{
            return abort('403');
        }

     
    }
    public function update(Request $request , Setting $setting)
    {
        // code...
        if (Gate::forUser(Auth::user())->allows('setting-website')) {
           
            $setting->company = $request->input('company');
            $setting->phone = $request->input('phone');
            $setting->hotline = $request->input('hotline');
            $setting->address = $request->input('address');
            $setting->address2 = $request->input('address2');
            $setting->tax = $request->input('tax');
            $setting->facebook = $request->input('facebook');
            $setting->email = $request->input('email');
            $setting->introduce = $request->input('introduce');

            if ($request->hasFile('new_image')) {
                // xóa file cũ
                @unlink(public_path($setting->image)); // dấu @ bỏ qua bug và tiếp tục code
                // get file mới
                $file = $request->file('new_image');
                // get tên
                $filename = time().'_'.$file->getClientOriginalName();
                // duong dan upload
                $path_upload = 'uploads/setting/';
                // upload file
                $request->file('new_image')->move($path_upload,$filename);

                $setting->image = $path_upload.$filename;
            }

            $setting->save();

            // chuyen dieu huong trang
            return redirect()->route('setting.index');
        
        }else{
            return abort('403');
        }
    }
}
