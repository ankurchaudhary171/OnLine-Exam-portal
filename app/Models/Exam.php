<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Exam extends Model
{
    protected $fillable = ['subject_id','subject_question'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'exam_question');
    }
    public function student() {
    return $this->belongsTo(Student::class);
}

}
