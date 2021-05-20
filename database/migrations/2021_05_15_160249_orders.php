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
            $table->integer('product_id')->nullable(false);
            $table->integer('customer_id')->nullable(false);
            $table->integer('variation_id')->nullable(false);
            $table->string('product_name')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_type')->nullable();
            $table->float('price', 15, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->float('subtotal', 15, 2)->default(0);
            $table->date('order_date')->nullable();
            $table->date('arrival_date')->nullable();
            $table->boolean('taxable')->default(0);
            $table->float('tax_rate', 5, 2)->default(0);
            $table->float('tax_amount', 15, 2)->default(0);
            $table->float('total', 15, 2)->default(0);
            $table->string('shipping_po')->nullable();
            $table->text('note')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_no', 50)->nullable();
            $table->string('address_type')->nullable();
            $table->text('house_no')->nullable();
            $table->text('landmark')->nullable();
            $table->integer('pincode')->nullable(false);
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zip', 20)->nullable();
            $table->integer('vendor')->nullable(false);
            $table->date('payment_date')->nullable();
            $table->float('amount', 5, 2)->default(0);
            $table->string('source')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('entered_by')->nullable();
            $table->text('payment_note')->nullable();
            $table->integer('order_status_id')->nullable(false);
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
