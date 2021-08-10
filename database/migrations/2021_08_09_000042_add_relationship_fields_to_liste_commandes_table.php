<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToListeCommandesTable extends Migration
{
    public function up()
    {
        Schema::table('liste_commandes', function (Blueprint $table) {
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id', 'commande_fk_4557742')->references('id')->on('commandes');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4565221')->references('id')->on('products');
        });
    }
}
