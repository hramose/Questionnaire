<?php

namespace App;

use App\Questionnaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Question extends Model
{
    use Notifiable;

    public function questionnaire()
    {
        return $this->belongsTo(Questionnaire::class);
    }

    protected $fillable = ['questionnaire_id' ,'question_name', 'asnwer_name'];
}
