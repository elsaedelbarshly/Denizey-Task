<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Quize extends Model
{
    use Notifiable;
    protected $table = 'quizes';

    protected $fillable = [
        'title','description','level','duration','question_num','price','timer','category_id','skill_id'
    ];

    
    public function skills()
    {
        return $this->belongsTo('App\Model\Quize','skill_id','ski_id');
    }
    public function categories()
    {
        return $this->belongsTo('App\Model\Quize','category_id','cat_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Model\student','students_do_quizes','student_id');
    }
}
