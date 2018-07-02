<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontEndPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('front_end_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->longText('title');
            $table->string('subtitle');
            $table->longText('content_raw');
            $table->longText('content_html');
            $table->string('page_image');
            $table->longText('meta_description');
            $table->boolean('is_draft')->default(1);
            $table->string('layout')->default('front-end.pages.page-dynamic');
            $table->timestamps();
            $table->timestamp('published_at')->nullable()->index();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('front_end_pages');
    }
}
