<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->integer('customer_id')->nullable(false);
            $table->string('order_status', 100);
            $table->date('order_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone_no', 50)->nullable();
            $table->string('address_type')->nullable();
            $table->text('house_no')->nullable();
            $table->text('landmark')->nullable();
            $table->integer('pincode');
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zip', 20)->nullable();
            $table->date('payment_date')->nullable();
            $table->float('amount', 15, 2)->default(0);
            $table->text('payment_status')->nullable();
            $table->boolean('manufacturing_notification')->default(0);
            $table->date('return_date')->nullable();
            $table->boolean('invoice_status')->default(0);
            $table->boolean('deleted')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
