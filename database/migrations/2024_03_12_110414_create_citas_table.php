<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    * @ return void
    */
    public function up()
    {
        if (!Schema::hasTable('citas')) {
            Schema::create('citas', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->dateTime('fecha_hora');
                $table->foreignId('ginecologo_id')->constrained()->onDelete('cascade');
                $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            });
            }
    }
    /**
    * @ return void
    */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
