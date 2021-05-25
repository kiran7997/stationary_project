<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id('order_item_id');
            $table->integer('product_id')->nullable(false);
            $table->integer('order_id');
            $table->string('product_name')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_type')->nullable();
            $table->float('price', 15, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->float('subtotal', 15, 2)->default(0);
            $table->boolean('taxable')->default(0);
            $table->float('tax_rate', 5, 2)->default(0);
            $table->float('tax_amount', 15, 2)->default(0);
            $table->float('total', 15, 2)->default(0);
            $table->float('amount', 5, 2)->default(0);
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
        Schema::dropIfExists('order_items');
    }
}
