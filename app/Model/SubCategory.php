<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class SubCategory extends Model
{
    use Notifiable;
    protected $table = 'subcategories';

    protected $fillable = [
        'subcat_name','category_id',
    ];

   
    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id','cat_id');
    }
}
