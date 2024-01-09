<?php

namespace App\Imports;

use App\Models\Vendor;
use App\Models\VendorInvoiceDue;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendorImport implements ToModel, WithHeadingRow
{
    protected $pfu;
    protected $failedRows = [];

    public function __construct($pfu)
    {
        $this->pfu = $pfu;
    }

    public function model(array $row)
    {

        echo '<pre>';
        print_r($row);die;
        $authUser = Auth::user();
        $pfu = $this->pfu;
        $check_vendor = Vendor::where('erp_code', $row['code'])->first();

        if (empty($check_vendor)) {

            return new Vendor([
                
                'vendor_id' => $check_vendor->id,
                'pfu' => $pfu,
                'invoice_no' => $row['invoice_no'],
                'invoice_date' => $invoiceFormattedDate,
                'ax_voucher_no' => $row['ax_voucher_no'],
                'ax_voucher_date' => $axFormattedDate,
                'amount' => $amount,
                'payment_due_date' => $paymentFormattedDate,
                'payment_due_amount' => $payment_due_amt,
                'company' => $row['company'],
                'user_id' => $authUser->id,
                'date_time' => $currentdate,
            ]);
        }

    }

    public function vendorLedgerNotUpload()
    {
        return $this->failedRows;
    }

}
