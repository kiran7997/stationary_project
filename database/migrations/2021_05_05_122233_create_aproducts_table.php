<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aproducts', function (Blueprint $table) {

            $table->id('product_id');
            $table->string('product_name')->nullable(false);
            $table->integer('cat_id')->nullable(false);
            $table->integer('unit_id')->nullable(false);
            $table->text('variation_id')->nullable(false);
            $table->text('image_url')->nullable();
            $table->string('description')->nullable();
            $table->float('base_price', 12, 2)->nullable();
            $table->string('code')->nullable();
            $table->string('brand')->nullable();
            $table->string('threshold_qty',50)->nullable();
            $table->float('inner_carton', 12, 2)->nullable();
            $table->float('actual_mrp', 12, 2)->nullable();
            $table->float('fps_mrp', 12, 2)->nullable();
            $table->boolean('taxable')->default(0);
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
        Schema::dropIfExists('aproducts');
    }
}
