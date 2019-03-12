<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerProfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_prof', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_user');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('fotoktp');
            $table->integer('noktp');
            $table->text('alamat');
            $table->string('jeniskelamin');
            $table->string('fotopribadi');
            $table->string('email');
            $table->string('password');
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->string('role');
            $table->string('status');
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
        Schema::dropIfExists('customer_prof');
    }
}
