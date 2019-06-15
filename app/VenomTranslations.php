<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenomTranslations extends Model
{
    protected $table = 'venom_translations';
    protected $fillable = ['venom_id','name','common_names','origin','form','class','order','suborder','subfamily','genus','lang','family'];
    public $timestamps = true;

}
