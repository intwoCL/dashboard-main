<?php

use App\Models\Usuario;
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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('password');
            $table->string('cargo');
            $table->boolean('admin')->default(false);
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });

        $u = new Usuario();
        $u->nombre = "Leonardo";
        $u->apellido = "Romero";
        $u->correo = "admin@edugestion.cl";
        $u->password =  hash('sha256', 'admin.edugestion');
        $u->cargo = "CTO EDUGESTION";
        $u->admin = true;
        $u->save();
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
