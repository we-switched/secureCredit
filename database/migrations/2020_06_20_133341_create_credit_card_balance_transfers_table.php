<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardBalanceTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_card_balance_transfers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('moratorium');
            $table->string('agent')->nullable();
            $table->string('telecaller')->nullable();
            $table->string('status')->default('Not Called');
            $table->string('city');
            $table->string('employmenttype');
            $table->string('modeofsalary')->nullable();
            $table->double('netsalary')->nullable();
            $table->double('profit')->nullable();
            $table->double('turnover')->nullable();
            $table->integer('noofcards');
            $table->double('totalcreditlimit');
            $table->double('currentoutstanding');
            $table->double('loanamount');
            $table->string('delayinpayment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_card_balance_transfers');
    }
}
