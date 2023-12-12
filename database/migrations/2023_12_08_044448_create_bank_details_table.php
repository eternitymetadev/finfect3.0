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
        Schema::create('bank_details', function (Blueprint $table) {
            $table->id();
            $table->string('bank_acc_no');
            $table->string('acc_holder_name');
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->string('bank_name');
            $table->string('pfu_id');
            $table->string('bank_logo')->nullable();
            $table->integer('status')->nullable()->default(1);
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
        Schema::dropIfExists('bank_details');
    }
};
