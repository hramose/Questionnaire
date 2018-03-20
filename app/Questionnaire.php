<?php

namespace App;

use App\User;
use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Questionnaire extends Model
{
    use Notifiable;


    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    protected $fillable = ['user_id' ,'name', 'numberofquestions','duration', 'resumeable','published'];



}
