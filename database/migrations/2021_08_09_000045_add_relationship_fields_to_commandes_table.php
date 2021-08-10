<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommandesTable extends Migration
{
    public function up()
    {
        Schema::table('commandes', function (Blueprint $table) {
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id', 'company_fk_4557719')->references('id')->on('contact_companies');
            $table->unsignedBigInteger('demande_achat_id')->nullable();
            $table->foreign('demande_achat_id', 'demande_achat_fk_4557720')->references('id')->on('demande_achats');
            $table->unsignedBigInteger('tva_id')->nullable();
            $table->foreign('tva_id', 'tva_fk_4544210')->references('id')->on('tvas');
        });
    }
}
