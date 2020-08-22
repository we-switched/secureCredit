<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_loans', function (Blueprint $table) {
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
            $table->text('presentaddress');
            $table->text('permanentaddress');
            $table->text('officeaddress');
            $table->double('yearsinbusiness');
            $table->double('yearsinblr');
            $table->double('yearsinpresentaddress');
            $table->string('residence');
            $table->string('existingloans');
            $table->double('turnover');
            $table->double('profit');
            $table->string('maritalstatus');
            $table->string('company');
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
        Schema::dropIfExists('business_loans');
    }
}
