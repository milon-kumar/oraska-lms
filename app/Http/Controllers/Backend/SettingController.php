<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use function League\Flysystem\type;

class SettingController extends Controller
{
    public function headerAppearance()
    {
        return view('backend.admin.pages.setting.appearance');
    }
    public function update(Request $request)
    {

        foreach ($request->key as $key => $type) {

            if($type == 'site_name'){
                $this->overWriteEnvFile('APP_NAME', $request[$type]);
            }
            if($type == 'timezone'){
                $this->overWriteEnvFile('APP_TIMEZONE', $request[$type]);
            }else {
                $lang = null;
                if(gettype($type) == 'array'){
                    $lang = array_key_first($type);
                    $type = $type[$lang];
                    $business_settings = BusinessSetting::where('type', $type)->where('lang',$lang)->first();
                }else{
                    $business_settings = Setting::where('key', $type)->first();
                }

                if($business_settings!=null){
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {
                        $business_settings->value = $request[$type];
                    }
                    //$business_settings->lang = $lang;
                    $business_settings->save();
                }
                else{
                    $business_settings = new Setting();

                    $business_settings->key = $type;
                    if(gettype($request[$type]) == 'array'){
                        $business_settings->value = json_encode($request[$type]);
                    }
                    else {

                        if ($request->hasFile($request[$type])){
                            $business_settings->value = $request->$request[$type]->store('/images/form', ['disk' =>'my_files']);
                            return 'imageuploaded';
                        }

                        exit();
                        $business_settings->value = $request[$type];
                    }
                    $business_settings->save();
                    return $business_settings;
                }
            }
        }

        Artisan::call('cache:clear');

        flash(translate("Settings updated successfully"))->success();
        return back();
    }
}
