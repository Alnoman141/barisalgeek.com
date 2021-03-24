<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('admin_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedInteger('rating')->default(0);
            $table->string('website')->nullable();
            $table->string('project_type')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->string('slug');
            $table->string('tags')->nullable();
            $table->date('completed');
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
        Schema::dropIfExists('portfolios');
    }
}
