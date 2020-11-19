<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimPhoneNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sim_phone_numbers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('phone_number');
            $table->decimal('cost', 10, 2);
            $table->string('cover')->nullable();
            $table->unsignedInteger('views')->default(0);
            $table->longText('content')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('telco');
            $table->integer('display_order')->default(0);
            $table->string('is_active', 3)->default('on');
            $table->string('is_new', 3)->default('on');
            $table->string('is_hot', 3)->default('');
            $table->string('is_top', 3)->default('');
            $table->enum('status', ['sold', 'selling']);
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
        Schema::dropIfExists('sim_phone_numbers');
    }
}
