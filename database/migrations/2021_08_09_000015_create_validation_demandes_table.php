<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValidationDemandesTable extends Migration
{
    public function up()
    {
        Schema::create('validation_demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->nullable();
            $table->boolean('etat')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
