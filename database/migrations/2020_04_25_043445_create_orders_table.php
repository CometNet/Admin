<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('app_id');
            $table->integer('channel_id')->nullable()->commit('支付通道');
            $table->string('name')->nullable()->commit('商品名称');
            $table->tinyInteger('type')->nullable()->commit('支付类型');
            $table->decimal('money')->nullable()->commit('支付金额:分');
            $table->string('out_trade_no')->nullable()->commit('商户订单号');
            $table->string('notify_url')->nullable()->commit('异步回调地址');
            $table->string('return_url')->nullable()->commit('支付成功');
            $table->tinyInteger('status')->nullable()->commit('支付状态 0待支付 1已支付 2订单超时');
            $table->string('remark')->nullable()->commit('备注');
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
        Schema::dropIfExists('orders');
    }
}
