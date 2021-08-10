<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRangementsTable extends Migration
{
    public function up()
    {
        Schema::create('rangements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_rangement')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
