<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('idUsuario');
            $table->integer('idRol')->nullable();
            $table->char('nombre',128)->nullable();
            $table->char('apellidoPaterno',128)->nullable();
            $table->char('apellidoMaterno',128)->nullable();
            $table->char('titulo',32)->nullable();
            $table->char('telefono',128)->nullable();
            $table->integer('extension')->nullable();
            $table->char('celular',16)->nullable();
            $table->char('login',128)->nullable();
            $table->char('email',100)->nullable();
            $table->binary('clave',100)->nullable();
            $table->char('status',100)->nullable();
            $table->timestamp('fechaUltVisita')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('password',255)->nullable();
            $table->date('fechaUltimaVista')->nullable();
            $table->date('fechaCreacion')->nullable();
            $table->date('fechaCaducidad')->nullable();
            $table->text('comentario')->nullable();
            $table->char('foto',255)->nullable();
            $table->text('cargo')->nullable();
            $table->text('dependencia')->nullable();
            $table->text('direccion')->nullable();
            $table->integer('idStatus')->nullable();
            $table->integer('idNombramiento')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
