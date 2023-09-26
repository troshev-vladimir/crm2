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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('potencial_id')->nullable();
            $table->foreign('potencial_id')->references('id')->on('client_potentials');

            $table->unsignedBigInteger('activity_id')->nullable();
            $table->foreign('activity_id')->references('id')->on('client_activities');

            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_add')->nullable();
            $table->string('address')->nullable();
            $table->string('address_add')->nullable();
            $table->string('site')->nullable();
            $table->string('vk')->nullable();
            $table->text('comment')->nullable();
            $table->date('birth_day')->nullable();

            $table->boolean('active')->default(true);
            $table->boolean('federal')->default(false);
            $table->boolean('top')->default(false);
            $table->boolean('prioritet')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
