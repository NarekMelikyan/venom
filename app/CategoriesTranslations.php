<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesTranslations extends Model
{
    protected $table = 'categories_translations';
    protected $fillable = ['category_id','name','description','lang'];
    public $timestamps = true;


}
