<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTuteurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tuteur', function (Blueprint $table) {
            $table->bigIncrements('TuteurId');
            $table->biginteger('PersonneTuteurId')->unsigned();
            $table->biginteger('EleveId')->unsigned();

            $table->foreign('PersonneTuteurId')
                    ->references('PersonneId')
                    ->on('personne')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('EleveId')
                    ->references('PersonneId')
                    ->on('personne')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
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
        Schema::table('tuteur', function(Blueprint $table) {
            $table->dropForeign('tuteur_personnetuteurid_foreign');
        });
        Schema::table('tuteur', function(Blueprint $table) {
            $table->dropForeign('tuteur_eleveid_foreign');
        });

        Schema::dropIfExists('tuteur');
    }
}
