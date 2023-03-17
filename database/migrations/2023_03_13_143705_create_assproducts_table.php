<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assproducts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 500)->nullable();
            $table->unsignedBigInteger('students_id');
            $table->foreign('students_id')
            ->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('projects_id');
            $table->foreign('projects_id')
            ->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('assproducts');
    }
};
