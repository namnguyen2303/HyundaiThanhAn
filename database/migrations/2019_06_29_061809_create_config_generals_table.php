<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigGeneralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_web')->nullable();
            $table->string('logo_web')->nullable();
            $table->string('favicon')->nullable();

            $table->string('email_support')->nullable();
            $table->string('hotline')->nullable();

            $table->string('social_facebook')->nullable();
            $table->string('social_skype')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_pinterest')->nullable();
            $table->string('social_linkdin')->nullable();
            $table->string('social_instagram')->nullable();
            $table->string('social_youtube')->nullable();

            $table->text('google_analytic')->nullable();
            $table->text('google_map')->nullable();
            $table->text('google_webmaster')->nullable();
            $table->text('google_adsense')->nullable();
            $table->text('google_ads')->nullable();

            $table->text('facebook_pixel')->nullable();
            $table->text('facebook_auth')->nullable();
            $table->text('facebook_script')->nullable();

            $table->longText('web_style')->nullable();
            $table->longText('web_script')->nullable();
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
        Schema::dropIfExists('config_generals');
    }
}
