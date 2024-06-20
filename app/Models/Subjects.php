<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'subject_code',
        'subject_name',
        'credit_unit_lec',
        'credit_unit_lab',
        'contact_hrs_lec',
        'contact_hrs_lab',
        'pre_requisite',
        'semester_yr_taken',
        'grade',
        'instructor',
    ];
}
