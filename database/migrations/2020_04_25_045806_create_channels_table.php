<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('type')->commit('支付通道类型');
            $table->string('name')->commit('支付名称');
            $table->string('data')->commit('支付数据');
            $table->decimal('min_quota')->commit('最小限额');
            $table->decimal('max_quota')->commit('最大限额');
            $table->tinyInteger('status')->commit('使用状态 0下线 1闲置 2支付使用中');
            $table->text('extend')->commit('扩展字段');
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
        Schema::dropIfExists('channels');
    }
}
