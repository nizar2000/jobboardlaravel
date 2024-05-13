<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    public $timestamps = false;

    protected $fillable = ['job_id', 'applicant_id', 'resume', 'cover_letter', 'submitted_at', 'status'];

    use HasFactory;
    public function job()
    {
        return $this->belongsTo(Jobs::class);
    }

    public function applicant()
    {
        return $this->belongsTo(User::class);
    }
}
