<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
     protected $table='answers';
    protected $fillable = ['question_id','answer','correct'];


    public function question()
{
    return $this->belongsTo(Question::class, 'question_id');
}

}
