<?php

namespace App\Imports;

use App\Models\Vendor;
use App\Models\VendorInvoiceDue;
use App\Models\VendorLedgerBalance;
use Auth;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VendorInvoiceDueImport implements ToModel, WithHeadingRow
{
    protected $pfu;

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
        $check_vendor = Vendor::where('erp_code', $row['vendor_code'])->first();

        // ----- invoice date
        $invoice_date = strtotime($row['invoice_date']);
        $invoiceFormattedDate = date('Y-m-d', $invoice_date);
        // ----- ax_voucher_date
        $ax_voucher_date = strtotime($row['ax_voucher_date']);
        $axFormattedDate = date('Y-m-d', $ax_voucher_date);
        // ----- invoice date
        $payment_due_date = strtotime($row['payment_due_date']);
        $paymentFormattedDate = date('Y-m-d', $payment_due_date);
        if (!empty($check_vendor)) {
            $check_vendor_ledger = VendorLedgerBalance::where('vendor_id', $check_vendor->id)->first();
            if (!empty($check_vendor_ledger)) {
                $checkDuplicate = VendorInvoiceDue::where('vendor_id', $check_vendor->id)->where('invoice_no', $row['invoice_no'])->whereDate('date_time', $currentDateOnly)->first();
                if (empty($checkDuplicate)) {
                    $amount = (float) str_replace(",", "", $row['amount']);
                    $payment_due_amt = (float) str_replace(",", "", $row['payment_due_amount']);
                    return new VendorInvoiceDue([
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
            }else{
                echo'<pre>'; print_r($check_vendor->erp_code); 
            }
        }

    }

}
