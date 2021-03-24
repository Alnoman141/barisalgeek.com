<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique();

            $table->text('street_address')->nullable();
            $table->unsignedBigInteger('division_id')->comment('Division Table Id');
            $table->unsignedBigInteger('district_id')->comment('District Table Id ');
            $table->unsignedTinyInteger('status')->default(0)->comment('0=Inactive|1=active|2=banned');

            $table->string('ip_address')->nullable();
            $table->string('image')->nullable();
            $table->text('shipping_address')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
