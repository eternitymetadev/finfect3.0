<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pfu extends Model
{
    use HasFactory;
    protected $fillable = [
        'pfu',
        'domain',
        'client_code',
        'status',
        'created_at',
        'updated_at'
    ];
}
