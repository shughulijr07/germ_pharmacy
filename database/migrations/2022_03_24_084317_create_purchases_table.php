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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_id')->nullable()->constrained('medicines')->onDelete('set null');
            $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onDelete('set null');
            $table->foreignId('medical_stores_id')->nullable()->constrained('medical_stores')->onDelete('set null');
            $table->integer('quantity')->default(0);
            $table->double('tb_price')->default(0);
            $table->double('bp_per_qty')->default(0);
            $table->double('sp_per_qty')->default(0);
            $table->string('expire_date')->nullable();
            $table->string('manufactured_date')->nullable();
            $table->string('date_purchased');
            $table->boolean('confirmed')->default(false);
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
        Schema::dropIfExists('purchases');
    }
};
