<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Category extends Model
{
    use Notifiable;
    protected $table = 'categories';

    protected $fillable = [
        'cat_name'
    ];

    

    public function skills()
    {
        return $this->hasMany('App\Model\Skill');
    }

    public function subcategories()
    {
        return $this->hasMany('App\Model\SubCategory');
    }
    public function quizes()
    {
        return $this->hasMany('App\Model\Quize');
    }


}
