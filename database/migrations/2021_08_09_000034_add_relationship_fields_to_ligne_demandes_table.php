<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToLigneDemandesTable extends Migration
{
    public function up()
    {
        Schema::table('ligne_demandes', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_fk_4572913')->references('id')->on('products');
            $table->unsignedBigInteger('demande_id')->nullable();
            $table->foreign('demande_id', 'demande_fk_4565032')->references('id')->on('demandes');
            $table->unsignedBigInteger('demande_achat_id')->nullable();
            $table->foreign('demande_achat_id', 'demande_achat_fk_4565033')->references('id')->on('demande_achats');
        });
    }
}
