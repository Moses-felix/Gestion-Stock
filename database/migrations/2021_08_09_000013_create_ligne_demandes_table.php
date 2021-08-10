<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneDemandesTable extends Migration
{
    public function up()
    {
        Schema::create('ligne_demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantite');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
