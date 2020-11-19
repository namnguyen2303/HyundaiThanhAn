<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type')->nullable();

            $table->string('name');
            $table->string('slug');

            $table->text('cover')->nullable();
            $table->text('overview')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();

            $table->string('tag_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('rel_canonical')->nullable();
            $table->string('meta_author')->nullable();
            $table->text('tags')->nullable();

            $table->integer('display_order')->default(0);
            $table->unsignedBigInteger('views')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
