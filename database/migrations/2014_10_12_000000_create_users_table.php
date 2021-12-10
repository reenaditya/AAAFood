<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('user_code');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('google_id')->nullable();
            $table->string('fb_id')->nullable();
            $table->tinyInteger('vip')->default(0)->comment('1=Yes,0=No')->nullable();
            $table->string('coupen',50)->nullable();
            $table->integer('role')->default(4)->comment("1=Vendor,2=Admin,3=Delivery,4=Customer");
            $table->string('mobile',20)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('two_factor_secret')->nullable();
            $table->text('two_factor_recovery_codes')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
