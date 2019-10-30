<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ParentCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('create_by');
            $table->string('update_by');
            $table->timestamps(); 
            $table->boolean('delete_at')->nullable();//hàm tạo cột create_at & update_at 
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
        Schema::dropIfExists('parent_category');
    }
}
