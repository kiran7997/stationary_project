<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->string('inventory_name')->nullable(false);
            $table->string('inventory_address')->nullable();
            $table->string('inventory_contact')->nullable();
            $table->string('inventory_email')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('invntory_status')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
