<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToValidationAchatsTable extends Migration
{
    public function up()
    {
        Schema::table('validation_achats', function (Blueprint $table) {
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_4565699')->references('id')->on('users');
            $table->unsignedBigInteger('demande_achat_id');
            $table->foreign('demande_achat_id', 'demande_achat_fk_4553112')->references('id')->on('demande_achats');
        });
    }
}
