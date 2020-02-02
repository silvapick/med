<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 20)->unique();
            $table->string('nombre',250);
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_tipo');
            $table->double('valor', 10, 2)->default(0);
            $table->integer('stop')->default(0);
            $table->integer('stop_min')->default(0);
            $table->integer('stop_max')->default(0);
            $table->string('estado',2)->default('1');
            $table->timestamps();
            $table->foreign('id_tipo')->references('id')->on('tipo_medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamentos');
    }
}
