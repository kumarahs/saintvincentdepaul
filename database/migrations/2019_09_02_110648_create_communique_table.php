<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommuniqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communique', function (Blueprint $table) {
            $table->bigIncrements('CommuniqueId');
            $table->longtext('Contenu');
            $table->biginteger('AnneeScolaireId')->unsigned();

            $table->foreign('AnneeScolaireId')
                    ->references('AnneeScolaireId')
                    ->on('anneescolaire')
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
        Schema::table('communique', function(Blueprint $table) {
            $table->dropForeign('communique_anneescolaireid_foreign');
        });
        Schema::dropIfExists('communique');
    }
}
