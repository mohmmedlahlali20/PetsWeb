<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accessoir extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'price', 
        'image', 
        'quantity', 
    ];
    public function commends()
    {
        return $this->hasMany(Commend::class, 'accessoir_id');
    }

    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
