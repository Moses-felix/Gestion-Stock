<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->decimal('transport', 15, 2)->nullable();
            $table->decimal('divers', 15, 2)->nullable();
            $table->integer('prix');
            $table->date('delai_livraison');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
