<?php

namespace App\Models;

use App\Models\commends;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class payment extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'payment_status', 'stripe_payment_id', 'commend_id'];

    public function Commends()
    {
        return $this->belongsTo(commends::class , 'commend_id');
    }
}
