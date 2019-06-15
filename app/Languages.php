<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    protected $table = 'languages';
    protected $fillable = ['name','lang','icon'];

    public $timestamps = true;

    public static function languageName($lang){
        return self::where('lang',$lang)->first()->name;
    }
}
