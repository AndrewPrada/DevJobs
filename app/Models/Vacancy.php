<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $casts = ['last_day' => 'date'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function applicants()
    {
        return $this->hasMany(Applicant::class)->orderBy('created_at', 'DESC');
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
