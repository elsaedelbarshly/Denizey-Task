<?php

namespace App\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use Notifiable;
    protected $table = 'students';

    protected $fillable = [
        'std_name','email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
    {
        return $this->belongsToMany('App\Model\Skill','students_choise_skills','student_id');
    }
    public function quizes()
    {
        return $this->belongsToMany('App\Model\Quize','students_do_quizes','quize_id');
    }
}
