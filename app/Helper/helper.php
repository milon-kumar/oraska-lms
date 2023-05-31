<?php

use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use App\Models\BusinessSetting;

function setting($key, $default = null){
    return Setting::getByKey($key,$default);
}

function uploadImage($request,$update_image = null){
    return $request->hasFile('image')?$request->file('image')->store('/images', ['disk' =>'my_files']): $update_image->image ?? 'images/default.jpg';
}

function courseId(){
    if (Session::has('course_id')){
        return Session::get('course_id');
    }else{
        return  null;
    }
}

function discournPrice($request){
    return ($request->input('regular_course_fee')) - ($request->input('discount_fee') ?? 0);
}



if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('auth_roles')) {
    function auth_roles(){
        $roles = ['admin','author'];

        return $roles;
    }
}
if (!function_exists('all_roles')) {
    function all_roles(){
        $roles = ['basic','admin','user','student','author','professional','subscriber'];

        return $roles;
    }
}
