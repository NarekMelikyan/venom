<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    protected $table = 'subcategories';
    protected $fillable = ['category_id'];
    public $timestamps = true;


    public function translation(){
        return $this->belongsTo(SubcategoriesTranslations::class,'id','subcategory_id')->where('lang',app()->getLocale());
    }

    public function translations(){
        return $this->hasMany(SubcategoriesTranslations::class,'subcategory_id','id');
    }

    public function category(){
        return $this->belongsTo(CategoriesTranslations::class,'category_id','category_id')->where('lang',app()->getLocale());
    }

    public function venom(){
        return $this->hasMany(Venom::class,'subcategory_id','id')/*->with('translation')*/;
    }

}
