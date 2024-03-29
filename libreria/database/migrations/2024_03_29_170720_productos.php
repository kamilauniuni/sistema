<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('productos', function (Blueprint $table) {
        $table->engine = "InnoDB";
        $table->bigIncrements('id');
        $table->string('nombre'); 
        $table->text('descripcion'); 
        $table->float('precio'); 
        $table->bigInteger('proveedor_id')->unsigned();
        $table->timestamps();

        $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
