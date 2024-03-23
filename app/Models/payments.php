<?php

namespace App\Models;

use App\Models\commends;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payments extends Model
{
    use HasFactory;

    public function commend()
    {
        return $this->belongsTo(commends::class);
    }
}
