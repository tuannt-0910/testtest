<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->nullable();
            $table->integer('created_user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->longText('content_guide')->nullable();
            $table->integer('execute_time')->nullable();
            $table->integer('total_question')->nullable();
            $table->integer('free')->nullable();
            $table->string('publish')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('tests');
    }
}
