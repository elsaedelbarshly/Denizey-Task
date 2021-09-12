<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Skill extends Model
{
    use Notifiable;
    protected $table = 'skills';

    protected $fillable = [
        'skill_name','category_id',
    ];

   

    public function students()
    {
        return $this->belongsToMany('App\Model\Student','students_choise_skills','skill_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Model\Category','category_id','cat_id');
    }

    public function quizes()
    {
        return $this->hasMany('App\Model\Quize');
    }

}
