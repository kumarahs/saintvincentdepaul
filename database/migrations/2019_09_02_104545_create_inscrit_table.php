<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscritTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscrit', function (Blueprint $table) {
            $table->bigIncrements('InscritId');
            $table->biginteger('PersonneId')->unsigned();
            $table->biginteger('AnneeScolaireId')->unsigned();
            $table->biginteger('ClasseId')->unsigned();

            $table->foreign('PersonneId')
                    ->references('PersonneId')
                    ->on('personne')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('AnneeScolaireId')
                    ->references('AnneeScolaireId')
                    ->on('anneescolaire')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('ClasseId')
                    ->references('ClasseId')
                    ->on('classe')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
            
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
        Schema::table('inscrit', function(Blueprint $table) {
            $table->dropForeign('inscrit_personneid_foreign');
        });
        Schema::table('inscrit', function(Blueprint $table) {
            $table->dropForeign('inscrit_anneescolaireid_foreign');
        });
        Schema::table('inscrit', function(Blueprint $table) {
            $table->dropForeign('inscrit_classeid_foreign');
        });
        Schema::dropIfExists('inscrit');
    }
}
