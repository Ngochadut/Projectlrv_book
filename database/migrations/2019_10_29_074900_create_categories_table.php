<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->unsigned();;
            $table->string('name');
            $table->longText('describes');
            $table->string('create_by');
            $table->string('update_by');
            $table->foreign('parent_id')->references('id')->on('parent_category')->onDelete('cascade');
            $table->timestamps(); 
            $table->softDeletes();
            // edit the first, add column (describes, create_by...)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
