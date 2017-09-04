<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_no',20)->comment('订单号');
            $table->integer('user_id')->comment('用户ID');
            $table->string('accept_name',20)->comment('收货人姓名');
            $table->string('pay_code',255)->comment('支付账号');
            $table->integer('pay_type')->comment('支付类型');
            $table->integer('distribution')->comment('配送类型');
            $table->tinyInteger('status')->comment('订单状态1:生成订单,2：确认订单,3取消订单,4作废订单,5完成订单');
            $table->tinyInteger('pay_status')->comment('支付状态0：未支付，1：已支付，2：退款，3：申请退款');
            $table->tinyInteger('distribution_status')->comment('配送状态0：未发送1：已发送2：换货3：申请换货');
            $table->string('postcode',6)->comment('邮编');
            $table->string('telphone',20)->comment('联系电话');
            $table->integer('country')->comment('国ID');
            $table->integer('province')->comment('省ID');
            $table->integer('city')->comment('市ID');
            $table->integer('area')->comment('区ID');
            $table->string('address',250)->comment('收货地址');
            $table->string('mobile',20)->comment('手机');
            $table->float('payable_amount')->comment('应付商品总金额');
            $table->float('real_amount')->comment('实付商品总金额');
            $table->float('payable_freight')->comment('总运费金额');
            $table->float('real_freight')->comment('实付运费');
            $table->dateTime('pay_time')->comment('付款时间');
            $table->dateTime('send_time')->comment('发货时间');
            $table->dateTime('create_time')->comment('下单时间');
            $table->dateTime('completion_time')->comment('订单完成时间');
            $table->tinyInteger('invoic')->comment('发票：0不索要1索要');
            $table->string('postscript',255)->comment('用户附言');
            $table->text('note')->comment('管理员备注');
            $table->tinyInteger('if_del')->comment('是否删除1为删除');
            $table->float('insure')->comment('保价');
            $table->tinyInteger('if_insured')->comment('是否保价0:不保价1保价');
            $table->float('pay_fee')->comment('支付手续费');
            $table->string('invoice_title',100)->comment('发票抬头');
            $table->float('taxes')->comment('税金');
            $table->float('promotions')->comment('促销优惠金额');
            $table->float('discoun')->comment('订单折扣或涨价');
            $table->float('order_amount')->comment('订单总金额');
            $table->string('if_print',255)->comment('是否打印');
            $table->string('accept_time',80)->comment('用户收货时间');
            $table->integer('exp')->comment('增加的经验');
            $table->integer('point')->comment('增加的积分');
            $table->tinyInteger('type')->comment('0普通订单,1团购订单,2限时抢购');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
