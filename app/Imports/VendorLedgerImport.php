<?php

namespace App\Imports;

use App\Models\Vendor;
use App\Models\VendorLedgerBalance;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendorLedgerImport implements ToModel, WithHeadingRow
{
    protected $pfu;
    protected $failedRows = [];

    public function __construct($pfu)
    {
        $this->pfu = $pfu;
    }

    public function model(array $row)
    {

        $mytime = Carbon::now('Asia/Kolkata');
        $currentdate = $mytime->toDateTimeString();
        $currentDateOnly = $mytime->toDateString();
        $authUser = Auth::user();
        $pfu = $this->pfu;
        $check_vendor = Vendor::where('erp_code', $row['vendor_account'])->first();

        if (!empty($check_vendor)) {
            $checkDuplicate = VendorLedgerBalance::where('vendor_id', $check_vendor->id)->whereDate('date_time', $currentDateOnly)->first();
            if (empty($checkDuplicate)) {
                $opening_balance = (float) str_replace(",", "", $row['opening_balance']);
                $debit_amount = (float) str_replace(",", "", $row['debit_amount']);
                $credit_amount = (float) str_replace(",", "", $row['credit_amount']);
                $closing_balance = (float) str_replace(",", "", $row['closing_balance']);
                return new VendorLedgerBalance([
                    'vendor_id' => $check_vendor->id,
                    'pfu' => $pfu,
                    'opening_balance' => $opening_balance,
                    'debit_amount' => $debit_amount,
                    'credit_amount' => $credit_amount,
                    'closing_balance' => $closing_balance,
                    'user_id' => $authUser->id,
                    'date_time' => $currentdate,
                ]);
            }
        }else{
            $this->failedRows[] = $row;
        }

    }
    public function getFailedRows()
    {
        return $this->failedRows;
    }
}
