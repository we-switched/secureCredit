<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_loans', function (Blueprint $table) {
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
            $table->string('aadhar');
            $table->string('pan');
            $table->string('residence');
            $table->text('presentaddress');
            $table->text('permanentaddress');
            $table->text('officeaddress');
            $table->double('yearsincity');
            $table->double('yearsinpresentaddress');
            $table->double('rent')->default('0');
            $table->string('qualification');
            $table->string('uniname');
            $table->double('yearofpassing');
            $table->string('maritalstatus');
            $table->string('existingloans');
            $table->double('emi')->default('0');
            $table->string('reference1');
            $table->string('reference2');
            $table->string('employmenttype');
            $table->string('modeofsalary')->nullable();
            $table->double('netsalary')->nullable();
            $table->double('profit')->nullable();
            $table->double('turnover')->nullable();
            $table->string('company')->nullable();
            $table->string('officeemail')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->double('yearsincompany')->nullable();
            $table->double('workexperience')->nullable();
            $table->string('mothersname');
            $table->double('loanamount');
            $table->double('tenure');
            $table->date('dob');
            $table->string('photo')->nullable();
            $table->string('photoaadharfront')->nullable();
            $table->string('photoaadharback')->nullable();
            $table->string('photopan')->nullable();
            $table->string('pdfpayslip_1')->nullable();
            $table->string('pdfpayslip_2')->nullable();
            $table->string('pdfpayslip_3')->nullable();
            $table->string('pdfbank')->nullable();
            $table->string('rentalagreement')->nullable();
            $table->string('electricitybill')->nullable();
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
        Schema::dropIfExists('personal_loans');
    }
}
