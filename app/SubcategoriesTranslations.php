<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubcategoriesTranslations extends Model
{
    protected $table = 'subcategories_translations';
    protected $fillable = ['subcategory_id','name','lang'];
    public $timestamps = true;

}
