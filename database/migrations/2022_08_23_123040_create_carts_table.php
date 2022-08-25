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
        Schema::create('carts', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name")->nullable();
            $table->string("Email")->nullable();
            $table->string("phone")->nullable();
            $table->string("addresse")->nullable();
            $table->string("product_title")->nullable();
            $table->double("price")->nullable();
            $table->integer("quantity")->nullable();
            $table->string("image")->nullable();
            $table->unsignedBigInteger("product_id")->nullable();
            $table->unsignedInteger("user_id")->nullable();
           
          
           
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
        Schema::dropIfExists('carts');
    }
};
