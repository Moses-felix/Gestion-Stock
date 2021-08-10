<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->foreign('categorie_id', 'categorie_fk_4557324')->references('id')->on('product_categories');
            $table->unsignedBigInteger('rangement_id')->nullable();
            $table->foreign('rangement_id', 'rangement_fk_4557325')->references('id')->on('rangements');
        });
    }
}
