<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDemandeAchatsTable extends Migration
{
    public function up()
    {
        Schema::table('demande_achats', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id', 'users_fk_4557696')->references('id')->on('users');
        });
    }
}
