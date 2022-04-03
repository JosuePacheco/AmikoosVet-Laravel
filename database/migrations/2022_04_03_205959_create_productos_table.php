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
        Schema::create('productos', function (Blueprint $table) {
            $table->mediumIncrements('id')->comment('ID');
            $table->unsignedMediumInteger('proveedor_id');
            $table->string('producto', 100);
            $table->string('marca', 100);
            $table->decimal('precio', 10,2);
            $table->decimal('stock', 10,2);
            $table->foreign('proveedor_id')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
