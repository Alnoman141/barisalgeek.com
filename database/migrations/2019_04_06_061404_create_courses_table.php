<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('course_topic');
            $table->text('outline')->nullable();
            $table->string('class_number')->nullable();
            $table->string('duration');
            $table->string('image');
            $table->string('price');
            $table->string('offer_price')->nullable();
            $table->string('class_day')->nullable();
            $table->string('class_time')->nullable();
            $table->string('class_duration')->nullable();
            $table->text('description')->nullable();
            $table->string('seats')->nullable();
            $table->string('class_starts')->nullable();
            $table->string('class_ends')->nullable();
            $table->string('slug');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
