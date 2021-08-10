<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeAchatsTable extends Migration
{
    public function up()
    {
        Schema::create('demande_achats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objet');
            $table->string('urgence');
            $table->integer('etat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
