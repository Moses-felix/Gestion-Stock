<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvasTable extends Migration
{
    public function up()
    {
        Schema::create('tvas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('tva', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
