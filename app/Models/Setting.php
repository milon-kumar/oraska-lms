<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table ="settings";
    protected $guarded =['id'];

    public static function getByKey($key,$default = null)
    {
        $setting = self::where('key',$key)->first();
        if (isset($setting)){
            return $setting->value;
        }else{
            return $default;
        }
    }
}
