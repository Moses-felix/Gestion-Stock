<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToValidationDemandesTable extends Migration
{
    public function up()
    {
        Schema::table('validation_demandes', function (Blueprint $table) {
            $table->unsignedBigInteger('demande_id');
            $table->foreign('demande_id', 'demande_fk_4559539')->references('id')->on('demandes');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_4559540')->references('id')->on('users');
        });
    }
}
