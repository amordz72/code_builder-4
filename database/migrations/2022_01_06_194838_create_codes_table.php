<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('migration')->nullable();
            $table->string('seeder')->nullable();
            $table->string('route')->nullable();
            $table->string('route_api')->nullable();
            $table->string('link')->nullable();
            $table->string('extend')->nullable();
            $table->string('crud')->nullable();
            $table->string('html')->nullable();
            $table->foreignId('tbl_id')->constrained("tbls", "id")
                ->onDelete('cascade');
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
        Schema::dropIfExists('codes');
    }
}
