<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('prenom')->nullable();
            $table->integer('telephone')->nullable();
            $table->string('company_address')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('company_website')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
