<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venom extends Model
{
    protected $table = 'venom';
    protected $fillable = ['code','category_id','subcategory_id','purity','price','image'];
    public $timestamps = true;

    public function translation(){
        return $this->belongsTo(VenomTranslations::class,'id','venom_id')->where('lang',app()->getLocale());
    }

    public function translations(){
        return $this->hasMany(VenomTranslations::class,'venom_id','id');
    }

    public function category(){
        return $this->belongsTo(Categories::class,'category_id','id');
    }

    public function categoryWithTranslation(){
        return (new Categories)->belongsTo(CategoriesTranslations::class,'category_id','category_id')->where('lang',app()->getLocale());
    }

    public function subcategoryWithTranslation(){
        return (new Subcategories)->belongsTo(SubcategoriesTranslations::class,'subcategory_id','subcategory_id')->where('lang',app()->getLocale());
    }

    public function subcategory(){
        return $this->belongsTo(Subcategories::class,'subcategory_id','id');
    }
}
