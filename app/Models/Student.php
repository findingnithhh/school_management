<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name', 'gender', 'class', 'category_id'];
    // funcation reference to primary key of students table
    public function student()
    {
        return $this->belongsTo(Student::class); // relationship 1 to many
        // retlurn object of current student
    }
}
