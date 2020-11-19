<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('mass')->nullable();
            $table->string('size_width_long')->nullable();
            $table->string('size_height_wide')->nullable();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->string('shipping')->nullable();
            $table->enum('required_note', [1, 2, 3])->default(3);
        });

        Schema::table('config_generals', function (Blueprint $table) {
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
