<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaiementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paiement', function (Blueprint $table) {
            $table->bigIncrements('PaiementId');
            $table->string('Montant');
            $table->longtext('Motif');
            $table->longtext('FichierDocument');
            $table->biginteger('InscritId')->unsigned();
            $table->biginteger('TypeFraisId')->unsigned();

            $table->foreign('InscritId')
                    ->references('InscritId')
                    ->on('inscrit')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->foreign('TypeFraisId')
                    ->references('TypeFraisId')
                    ->on('typefrais')
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
        Schema::table('paiement', function(Blueprint $table) {
            $table->dropForeign('paiement_inscritid_foreign');
        });
        Schema::table('paiement', function(Blueprint $table) {
            $table->dropForeign('paiement_typefraisid_foreign');
        });

        Schema::dropIfExists('paiement');
    }
}
