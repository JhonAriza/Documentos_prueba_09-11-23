<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_documentos', function (Blueprint $table) {
            $table->id();
           $table->string('doc_nombre');
            $table->string('doc_codigo');
            $table->string('doc_contenido');
            $table->bigInteger('proceso_id')->unsigned();
            $table->bigInteger('tip_tipo_doc_id')->unsigned();
            $table->foreign('proceso_id')->references('id')->on('procesos')->onDelete('cascade');
            $table->foreign('tip_tipo_doc_id')->references('id')->on('tip_tipo_docs')->onDelete('cascade');
           
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
        Schema::dropIfExists('doc_documentos');
    }
};
