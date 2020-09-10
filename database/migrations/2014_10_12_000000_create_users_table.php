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
            $table->string('email')->unique();
            $table->string('chef_first_name');
            $table->string('chef_last_name');
            $table->string('branch_name');
            $table->string( 'branch_address');
            $table->string('branch_code')->nullable();
            $table->string('branch_phone_number');
            $table->string('chef_phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('brand_id')->unsigned()->index();
            $table->string('password');
            $table->string('status');
            $table->integer('role');
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
