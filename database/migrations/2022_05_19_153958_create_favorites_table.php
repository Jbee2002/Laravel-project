<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->integer('customer_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::table('favorites',function(Blueprint $table){
            $table->dropForeign('favorites_customer_id_foreign');
            $table->dropForeign('favorites_product_id_foreign');
        });
        Schema::dropIfExists('favorites');
    }
}
