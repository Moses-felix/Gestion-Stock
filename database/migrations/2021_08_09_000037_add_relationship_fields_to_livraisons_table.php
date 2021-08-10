<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLivraisonsTable extends Migration
{
    public function up()
    {
        Schema::table('livraisons', function (Blueprint $table) {
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id', 'commande_fk_4565765')->references('id')->on('commandes');
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id', 'product_category_fk_4572967')->references('id')->on('product_categories');
            $table->unsignedBigInteger('rangement_id');
            $table->foreign('rangement_id', 'rangement_fk_4572968')->references('id')->on('rangements');
        });
    }
}
