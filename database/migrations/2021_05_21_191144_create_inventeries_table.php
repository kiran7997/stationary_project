<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventeries', function (Blueprint $table) {
            $table->id('inventory_id');
            $table->string('inventory_name')->nullable(false);
            
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
        Schema::dropIfExists('inventeries');
    }
}
