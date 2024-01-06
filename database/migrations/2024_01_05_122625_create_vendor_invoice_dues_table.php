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
        Schema::create('vendor_invoice_dues', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id')->nullable();
            $table->string('pfu')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('invoice_date')->nullable();
            $table->string('ax_voucher_no')->nullable();
            $table->string('ax_voucher_date')->nullable();
            $table->decimal('amount',10,2)->nullable();
            $table->string('payment_due_date')->nullable();
            $table->decimal('payment_due_amount',10,2)->nullable();
            $table->string('company')->nullable();
            $table->string('user_id')->nullable();
            $table->string('date_time')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('vendor_invoice_dues');
    }
};
