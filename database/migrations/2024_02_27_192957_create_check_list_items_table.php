<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::create('check_list_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->text('descripcion');
            $table->date('fecha')->default(now());
            $table->boolean('state')->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('check_list_items');
    }
};
