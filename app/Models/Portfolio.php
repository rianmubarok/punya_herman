<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'skills',
        'image',
        'project_link',
    ];

    // Relasi: Portfolio milik satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}