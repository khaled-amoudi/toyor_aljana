<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $table = 'finances';
    protected $fillable = ['amount', 'student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

}
