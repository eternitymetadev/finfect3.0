<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorInvoiceDue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'vendor_id',
        'pfu',
        'invoice_no',
        'invoice_date',
        'ax_voucher_no',
        'ax_voucher_date',
        'amount',
        'payment_due_date',
        'payment_due_amount',
        'company',
        'user_id',
        'date_time',
        'status',
    ];

    public function VendorDetail()
    {
        return $this->hasOne('App\Models\Vendor','id','vendor_id');
    }
}
