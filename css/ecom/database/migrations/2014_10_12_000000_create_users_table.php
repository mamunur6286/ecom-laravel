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
            $table->string('name');
            $table->string('mobile');
            $table->string('email')->nullable();
            $table->string('own_referal_id')->nullable();
            $table->string('uses_referal_id')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->text('address')->nullable();
            $table->string('bkash_no')->nullable();
            $table->string('wallet')->default(0);
            $table->string('roll')->nullable();
            $table->tinyInteger('verify')->default(0);
            $table->string('verify_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
