<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps(); //Date, created_at and updated_at
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('department_id')->unsigned();
            $table->foreign("department_id")->references("id")->on("department")
            ->onDelete("cascade")
            ->onUpdate("cascade");
            $table->string('name');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('department');
    }
}
