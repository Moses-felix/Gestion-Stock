<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeCommandesTable extends Migration
{
    public function up()
    {
        Schema::create('liste_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->integer('prix_unitaire');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
