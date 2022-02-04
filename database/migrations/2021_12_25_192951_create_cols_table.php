<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cols', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('length')->nullable();
            $table->boolean('sel')->default(0);
            $table->boolean('if')->default(0);
            $table->boolean('hidden')->default(0);
            $table->string('index')->nullable();
            $table->string('default')->nullable();
            $table->string('default_v')->nullable();
            $table->string('parent')->nullable();
            $table->string('rel_type')->nullable();

            $table->foreignId('tbl_id')->constrained("tbls", "id")
            ->onDelete('cascade')
            ->onUpdate('cascade');


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
        Schema::dropIfExists('cols');
    }
}
