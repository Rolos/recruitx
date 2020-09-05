<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('estado');
            $table->timestamps();
        });
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('estado');
            $table->timestamps();
        });
        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('niveles_capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->unsignedBigInteger('nivel_id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->string('institucion');
            $table->timestamps();

            $table->foreign('nivel_id')->references('id')->on('niveles_capacitaciones');
        });
        Schema::create('niveles_riesgos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::create('puestos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('nivel_riesgo_id');
            $table->integer('salario_minimo');
            $table->integer('salario_maximo');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('nivel_riesgo_id')->references('id')->on('niveles_riesgos');
        });
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre');
            $table->unsignedBigInteger('puesto_al_que_aspira_id');
            $table->unsignedBigInteger('departamento_id');
            $table->integer('salario_al_que_aspira');
            $table->string('recomendado_por');
            $table->timestamps();

            $table->foreign('puesto_al_que_aspira_id')->references('id')->on('puestos');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
        Schema::create('experiencia_laboral', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidato_id');
            $table->string('empresa');
            $table->unsignedBigInteger('puesto_ocupado_id');
            $table->date('fecha_desde');
            $table->date('fecha_hasta');
            $table->integer('salario');
            $table->timestamps();

            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->foreign('puesto_ocupado_id')->references('id')->on('puestos');
        });
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->string('nombre');
            $table->date('fecha_ingreso');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('puesto_id');
            $table->unsignedBigInteger('candidato_id')->nullable();
            $table->integer('salario_mensual');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('puesto_id')->references('id')->on('puestos');
            $table->foreign('candidato_id')->references('id')->on('candidatos');
        });
        Schema::create('competencias_candidatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('competencia_id');
            $table->timestamps();

            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->foreign('competencia_id')->references('id')->on('competencias');
        });
        Schema::create('capacitaciones_candidatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidato_id');
            $table->unsignedBigInteger('capacitacion_id');
            $table->timestamps();

            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->foreign('capacitacion_id')->references('id')->on('capacitaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('competencias_candidatos');
        Schema::dropIfExists('capacitaciones_candidatos');
        Schema::dropIfExists('empleados');
        Schema::dropIfExists('capacitaciones');
        Schema::dropIfExists('niveles_capacitaciones');
        Schema::dropIfExists('experiencia_laboral');
        Schema::dropIfExists('candidatos');
        Schema::dropIfExists('puestos');
        Schema::dropIfExists('niveles_riesgos');
        Schema::dropIfExists('competencias');
        Schema::dropIfExists('idiomas');
        Schema::dropIfExists('departamentos');
    }
}
