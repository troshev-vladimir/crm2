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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->date('placement_date');
            $table->date('payed_date');
            $table->boolean('paid');
            $table->date('start');
            $table->date('end');
            $table->string();
            $table->integer('1c_id');
            $table->json('sale_items');
            // $table->foreignId('legal_id')->constrained('legals');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('agent_id')->constrained('agents');
            $table->foreignId('type_id')->constrained('sales_types');
            $table->foreignId('smi_id')->constrained('smis');

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
