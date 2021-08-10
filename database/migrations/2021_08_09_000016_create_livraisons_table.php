<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('etat')->default(0)->nullable();
            $table->integer('statut')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
