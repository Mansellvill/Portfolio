<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code_name');
            $table->text('description')->nullable();
            $table->string('author');
            $table->string('category');
            $table->string('publisher');
            $table->string('year');
            $table->string('isbn');
            $table->string('number_of_pages:');
            $table->string('binding');
            $table->string('format');
            $table->string('weight');
            $table->string('rating');
            $table->text('img')->nullable();
            $table->double('price')->default(0);
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
        Schema::dropIfExists('products');
    }
}
