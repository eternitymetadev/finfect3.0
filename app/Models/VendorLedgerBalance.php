<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class VendorLedgerBalance extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'vendor_id',
        'pfu',
        'opening_balance',
        'debit_amount',
        'credit_amount',
        'closing_balance',
        'user_id',
        'date_time',
        'status'
    ];

    public function VendorDetail()
    {
        return $this->hasOne('App\Models\Vendor','id','vendor_id');
    }
}
