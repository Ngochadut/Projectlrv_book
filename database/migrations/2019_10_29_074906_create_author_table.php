<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->string('name');
            $table->string('img')->nullable();//hinh anh
            $table->longText('address')->nullable();//que quan
            $table->longText('describes');//mo ta
            $table->date('born')->nullable();//ngay sinh
            $table->date('died')->nullable();
            $table->timestamps();
            $table->string('create_by');
            $table->string('update_by');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->boolean('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('author');
    }
}
