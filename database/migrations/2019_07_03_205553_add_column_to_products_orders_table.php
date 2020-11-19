<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToProductsOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedInteger('number_of_sales_in_the_month')->default(0);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->enum('type', ['products', 'sim_phone_numbers'])->default('products');
            $table->string('status')->default('pending');
            $table->string('bank_transfer_name')->nullable();
            $table->string('bank_transfer_account_type')->nullable();
            $table->string('bank_transfer_account_name')->nullable();
            $table->string('bank_transfer_swift_code')->nullable();
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

        });

        Schema::table('orders', function (Blueprint $table) {

        });
    }
}
