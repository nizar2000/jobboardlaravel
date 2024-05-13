<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = [
        'title', 'description', 'requirements', 'location', 'salary', 'company_id', 'category_id',
    ];
    use HasFactory;
    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }
}
