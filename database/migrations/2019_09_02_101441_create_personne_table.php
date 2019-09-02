<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personne', function (Blueprint $table) {
            $table->bigIncrements('PersonneId');
            $table->string('Matricule',70);
            $table->string('Nom',70);
            $table->string('Postnom',70);
            $table->string('Prenom',70);
            $table->string('Genre',10);
            $table->date('DateNaissance');
            $table->string('Tel');
            $table->integer('TypeUtilisateur');
            $table->string('Login',70);
            $table->string('Pwd',70);
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
        Schema::dropIfExists('personne');
    }
}
