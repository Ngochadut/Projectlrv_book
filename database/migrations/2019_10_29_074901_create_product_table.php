<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->longText('describes');//mô tar
            $table->string('publisher');//nhà xuất bản
            $table->bigInteger('author_id')->unsigned();
            $table->integer('price');//giá
            $table->integer('maket_price');//giá thị trường
            $table->string('cover_type')->nullable();//loại bìa
            $table->integer('num_page')->nullable();// số trang
            $table->string('SKU');//ma xuất bản
            $table->string('size');//size sách
            $table->integer('number');//số lượng
            $table->string('create_by');
            $table->string('update_by');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('product');
    }
}
