<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationAchatsTable extends Migration
{
    public function up()
    {
        Schema::create('validation_achats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commentaire')->nullable();
            $table->string('etat')->nullable();
            $table->integer('statut')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
