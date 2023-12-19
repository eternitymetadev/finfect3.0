<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankBalance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bank_detail_id',
        'bank_balance',
        'date',
        'status'
    ];
}
