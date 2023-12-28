<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory;

    use SoftDeletes;
    
    protected $fillable = [
        'fin_code',
        'pfu',
        'company_name',
        'nature_of_assesse',
        'erp_code',
        'state',
        'pin_code',
        'address',
        'name',
        'designation',
        'mobile',
        'primary_email',
        'secondary_email',
        'acc_no',
        'ifsc_code',
        'branch_name',
        'bank_name',
        'acc_holder_name',
        'cash_flow',
        'vendor_group',
        'terms_of_payment',
        'owner_name',
        'nature_of_service',
        'msme_number',
        'gst',
        'pan',
        'msme_certificate',
        'gst_certificate',
        'cancel_cheque',
        'upload_pan',
        'is_bank_detail_verified',
        'is_invdue_applicable',
        'status'
    ];

    protected $dates = ['deleted_at'];
}
