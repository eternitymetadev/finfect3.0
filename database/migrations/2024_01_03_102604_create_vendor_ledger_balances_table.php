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
        Schema::create('vendor_ledger_balances', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_id')->nullable();
            $table->string('pfu')->nullable();
            $table->decimal('opening_balance',10,2)->nullable();
            $table->decimal('debit_amount',10,2)->nullable();
            $table->decimal('credit_amount',10,2)->nullable();
            $table->decimal('closing_balance',10,2)->nullable();
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
        Schema::dropIfExists('vendor_ledger_balances');
    }
};
