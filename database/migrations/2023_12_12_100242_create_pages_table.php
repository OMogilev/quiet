<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            $table->string('title', 150);
            $table->string('slug', 150)->unique();
            $table->longText('text')->nullable();

            $table->string('thumbnail')->nullable();
            $table->boolean('active', 50)->default(0);
            $table->unsignedBigInteger('user_id')->nullable();

            $table->unsignedInteger('readings_number')->default(0);
            $table->dateTime('published_at');

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
