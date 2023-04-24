<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // php artisan db:seed --class=
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('placement_date');
            $table->date('payed_date');
            $table->boolean('paid');
            $table->date('start');
            $table->date('end');
            // $table->string();
            $table->integer('id_1c');
            $table->json('sale_items');

            // $table->foreignId('legal_id')->constrained('legals');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('sales_types');

            $table->unsignedBigInteger('smi_id');
            $table->foreign('smi_id')->references('id')->on('smis');

            // $table->foreignId('agent_id')->constrained('agents');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
