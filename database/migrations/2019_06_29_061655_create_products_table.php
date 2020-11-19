<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('slug');
            $table->unsignedInteger('category');

            $table->text('product_images')->nullable();
            $table->text('product_best_sells')->nullable();
            $table->text('product_relateds')->nullable();
            $table->text('product_suggestions')->nullable();

            $table->text('cover')->nullable();
            $table->text('overview')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();

            $table->text('coupon')->nullable();
            $table->decimal('cost', 10, 2)->nullable()->default(0);
            $table->decimal('price', 10, 2)->nullable()->default(0);
            $table->integer('discount')->nullable()->default(0);
            $table->decimal('price_discount', 10, 2)->nullable()->default(0);

            $table->string('tag_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('rel_canonical')->nullable();
            $table->string('meta_author')->nullable();
            $table->text('tags')->nullable();

            $table->integer('display_order')->default(0);
            $table->unsignedBigInteger('views')->nullable()->default(0);
            $table->string('is_active', 3)->default('on');
            $table->string('is_new', 3)->default('on');
            $table->string('is_hot', 3)->default('');
            $table->string('is_top', 3)->default('');

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
        Schema::dropIfExists('products');
    }
}
