<?php

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
            $table->increments('id');

            $table->string('name');
            $table->string('middlename');
            $table->string('lastname');
            $table->text('address');
            $table->string('mobile');
            $table->string('citizenship');
            $table->string('campus');
            $table->string('program');
            $table->date('yeargraduated');
            $table->string('companyname');
            $table->text('companyadd');
            $table->string('designation');
            $table->text('note');

            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();

            $table->integer('xstatus')->default(0);
            $table->string('role')->default('alumni');

            $table->string('avatar')->default('default.png');
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
        Schema::dropIfExists('users');
    }
}
