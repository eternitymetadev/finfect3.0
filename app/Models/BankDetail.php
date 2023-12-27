<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BankDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'bank_acc_no',
        'acc_holder_name',
        'ifsc_code',
        'branch_name',
        'bank_name',
        'pfu_id',
        'bank_logo',
        'status',
    ];

      public function checkCurrentBalance()
      {
         return $this->hasOne('App\Models\BankBalance','bank_detail_id', 'id')->whereDate('date', now()->toDateString());
      }
    
}
