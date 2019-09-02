<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typefrais', function (Blueprint $table) {
            $table->bigIncrements('TypeFraisId');
            $table->string('Designation');
            $table->boolean('EstSupprime');
            $table->string('CreatedBy');
            $table->string('UpdatedBy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typefrais');
    }
}
