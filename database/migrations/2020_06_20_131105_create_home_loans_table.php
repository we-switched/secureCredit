<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('topup');
            $table->string('moratorium');
            $table->string('agent')->nullable();
            $table->string('telecaller')->nullable();
            $table->string('status')->default('Not Called');
            $table->string('city');
            $table->string('employmenttype');
            $table->string('typeofhomeloan');
            $table->string('modeofsalary')->nullable();
            $table->double('netsalary')->nullable();
            $table->double('profit')->nullable();
            $table->double('turnover')->nullable();
            $table->double('loanamount');
            $table->double('marketvalue');
            $table->string('katha')->nullable();
            $table->double('governmentvalue');
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
        Schema::dropIfExists('home_loans');
    }
}
