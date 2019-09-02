<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotation', function (Blueprint $table) {
            $table->bigIncrements('CotationId');
            $table->longtext('FichierDocument');
            $table->biginteger('InscritId')->unsigned();

            $table->foreign('InscritId')
                    ->references('InscritId')
                    ->on('inscrit')
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
        Schema::table('cotation', function(Blueprint $table) {
            $table->dropForeign('cotation_inscritid_foreign');
        });
        Schema::dropIfExists('cotation');
    }
}
