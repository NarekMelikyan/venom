<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['image'];

    public $timestamps = true;

    public function translation(){
        return $this->belongsTo(CategoriesTranslations::class,'id','category_id')->where('lang',app()->getLocale());
    }

    public function translations(){
        return $this->hasMany(CategoriesTranslations::class,'category_id','id');
    }
}
