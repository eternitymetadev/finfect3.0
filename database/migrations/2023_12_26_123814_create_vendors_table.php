<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('nature_of_assesse')->nullable();
            $table->string('erp_code')->nullable();
            $table->string('state')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('mobile')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('acc_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('acc_holder_name')->nullable();
            $table->string('cash_flow')->nullable();
            $table->string('vendor_group')->nullable();
            $table->string('terms_of_payment')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('nature_of_service')->nullable();
            $table->string('msme_number')->nullable();
            $table->string('gst')->nullable();
            $table->string('msme_certificate')->nullable();
            $table->string('gst_certificate')->nullable();
            $table->string('cancel_cheque')->nullable();
            $table->string('other_document')->nullable();
            $table->integer('is_bank_detail_verified')->nullable()->default(0);
            $table->integer('is_invdue_applicable')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
};
