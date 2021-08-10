<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDemandePrixesTable extends Migration
{
    public function up()
    {
        Schema::table('demande_prixes', function (Blueprint $table) {
            $table->unsignedBigInteger('demande_achat_id')->nullable();
            $table->foreign('demande_achat_id', 'demande_achat_fk_4557710')->references('id')->on('demande_achats');
            $table->unsignedBigInteger('users_id')->nullable();
            $table->foreign('users_id', 'users_fk_4557711')->references('id')->on('users');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id', 'company_fk_4565744')->references('id')->on('contact_companies');
        });
    }
}
