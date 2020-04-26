<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string('original_password')->comment('原始密码');
            $table->tinyInteger('status')->default(0)->comment('状态');
            $table->string('last_login_ip')->nullable()->comment('最后登录ip');
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
        Schema::dropIfExists('members');
    }
}
