<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BusinessSettingController extends Controller
{

    public function index()
    {
        return view('backend.admin.pages.setting.all_setting');
    }

    public function basicSetting()
    {
        return view('backend.admin.pages.setting.basic_setting');
    }

    public function update(Request $request)
    {
        foreach ($request->types as $key => $type) {
            if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }
            if($type == 'timezone'){
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            }
            else {
                $business_settings = BusinessSetting::where('type', $type)->first();
                if($business_settings!=null){
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = $request[$type];
                    }
                    $business_settings->save();
                }
                else{
                    $business_settings = new BusinessSetting;
                    $business_settings->type = $type;
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = $request[$type];
                    }
                    $business_settings->save();
                }
            }
        }

        Artisan::call('cache:clear');
        toast('Data Updated ......... :)','success');
        return back();
    }

    public function settingHeorimage(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'hero_image')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('hero_image')?$request->file('hero_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'hero_image';
            $business_settings->value = $request->hasFile('hero_image')?$request->file('hero_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Hero Image Updated','success');
        return redirect()->back();
    }
    public function settingAboutimage(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'about_image')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('about_image')?$request->file('about_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'about_image';
            $business_settings->value = $request->hasFile('about_image')?$request->file('about_image')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Hero Image Updated','success');
        return redirect()->back();
    }

    public function homePageSetting()
    {
        return view('backend.admin.pages.setting.home-page');
    }

    public function footerSetting()
    {
        return view('backend.admin.pages.setting.footer');
    }

    public function instituteSetting()
    {
        return view('backend.admin.pages.setting.institute');
    }

    public function websiteIcon(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'website_icon')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('website_icon')?$request->file('website_icon')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'website_icon';
            $business_settings->value = $request->hasFile('website_icon')?$request->file('website_icon')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Website Icon Updated','success');
        return redirect()->back();
    }

    public function websiteLogo(Request $request)
    {
        $business_settings = BusinessSetting::where('type', 'website_logo')->first();
        if ($business_settings){
            $business_settings->value = $request->hasFile('website_logo')?$request->file('website_logo')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }else{
            $business_settings = new BusinessSetting();
            $business_settings->type = 'website_logo';
            $business_settings->value = $request->hasFile('website_logo')?$request->file('website_logo')->store('/images', ['disk' =>'my_files']): 'image/default.jpg';
            $business_settings->save();
        }

        toast('Website Logo Updated','success');
        return redirect()->back();
    }
}
