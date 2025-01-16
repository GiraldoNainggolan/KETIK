<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VouchersDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'voucher_id',
        'users_id',
        'used_at',
    ];
}
